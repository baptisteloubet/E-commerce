<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Order_Service;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index_product()
    {
        if (Cart::count() <= 0) {
            return redirect()->route('products.index');
        }
        // Enter Your Stripe Secret
        Stripe::setApiKey('sk_test_51I0wFvAEUallKK3arCyv7FvOzNMo8BoZZzymOYUsi8Kea3j2rEhtaQS6E2pwCe5uLQZLGLu5LIqdAFPNXkRGfFcG00B3TfP21G');


        $payment_intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'eur',
            'description' => 'Nouveau paiement de client ',
            'payment_method_types' => ['card'],
            'receipt_email' => Auth::user()->email

        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.index_product', compact('intent'));;
    }

    public function index_service(Request $request)
    {
        if (Cart::count() <= 0) {
            return redirect()->route('services.index');
        }
        // Enter Your Stripe Secret
        Stripe::setApiKey('sk_test_51I0wFvAEUallKK3arCyv7FvOzNMo8BoZZzymOYUsi8Kea3j2rEhtaQS6E2pwCe5uLQZLGLu5LIqdAFPNXkRGfFcG00B3TfP21G');


        $payment_intent = PaymentIntent::create([
            'amount' => '2000',
            'currency' => 'eur',
            'description' => 'Nouveau paiement de client ',
            'payment_method_types' => ['card'],
            'receipt_email' => Auth::user()->email
        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.index_service', compact('intent'));;
    }

    public function store_product(Request $request)
    {
        $data = $request->json()->all();

        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['paymentIntent']['created'])
            ->format('Y-m-d');

        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth()->user()->id;
        $order->save();

        if ($data['paymentIntent']['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }

    public function store_service(Request $request)
    {
        $data = $request->json()->all();
        $order = new Order_Service();

        $order->payment_intent_id = $data['paymentIntent']['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $services = [];
        $i = 0;

        foreach (Cart::content() as $service) {
            $services['service_' . $i][] = $service->model->title;
            $services['service_' . $i][] = $service->model->price;
            $services['service_' . $i][] = $service->qty;
            $services['service_' . $i][] = $service->options;
            $i++;
        }

        $order->services = serialize($services);
        $order->user_id = Auth()->user()->id;
        $order->save();


        if ($data['paymentIntent']['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }

    public function thankyou_product()
    {
        return Session::has('success') ? view('checkout.thankyou_product') : redirect()->route('products.index');
    }

    public function thankyou_service()
    {
        return Session::has('success') ? view('checkout.thankyou_service') : redirect()->route('services.index');
    }
}