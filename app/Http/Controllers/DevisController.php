<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Order_Service;
use Illuminate\Support\Facades\Auth;

class DevisController extends Controller
{
    public function generate_PDF($id)
    {
        $order = DB::table('order__services')->where('id', '=', $id)->get();
        $service = unserialize($order->all()[0]->services);
        $data = [

            'amount' => getPrice($order->all()[0]->amount),
            'id' => $order->all()[0]->id,
            'date' => $order->all()[0]->created_at,
            'titre' => $service["service_0"][0],
            'price_service'=> getPrice($service["service_0"][1]),
            'jours' => $service["service_0"][2],
            'mail' => Auth::user()->email,
            'name' => Auth::user()->name,
            'calcul_jours' =>  $service["service_0"][2] *100,00,
            'calcul_jours_tva' =>  $service["service_0"][2] *120,00,
        ];
        
        $pdf = PDF::loadView('devis.pdf', $data );
        return $pdf->download('devis.pdf');
    }
    public function index()
    {
        $orders_service = Order_Service::take(10)->get();

        return view('orders.index_devis')->with('orders_service', $orders_service);
    }
}
