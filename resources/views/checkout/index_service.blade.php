<!DOCTYPE html>
<html lang="en">

@section('extra-meta')
<meta id="token" name="csrf-token" content="{{ csrf_token() }}">
@endsection


<head>
    <title>Éco Services - Paiement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    @php
    $stripe_key = 'pk_test_51I0wFvAEUallKK3aIL2RXuwQcFBTKeWcBL1VWgsRoMGkhEOf7toFXOzBlD9pr6usRP3Y8GjVZtc09o5kh2UnUNZo00NHokebu8';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <h1 class="text-center bgblue">Saisissez-vos informations </h1><br><br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('checkout.store_service')}}" method="post" id="payment-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="nom" placeholder="Prénom Nom">
                            </div>
                            <div class="form-group col-md-4">
                                <input type ="text" maxlength="10" class="form-control" id="phone" placeholder="Numéro de téléphone">
                            </div>
                            <div class="form-group col-md-4">
                                <input type ="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" id="adresse" placeholder="Adresse Postale">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="city" placeholder="Ville">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                Saisissez les informations relatives à votre carte de crédit
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->


                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="card-button" class="btn btn-dark" type="submit" data-secret="{{ $intent }}"> Procéder au paiement (20, 00 €)</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        const stripe = Stripe('{{ $stripe_key }}', {
            locale: 'fr'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                        billing_details: { name: nom.value, phone : phone.value , email: email.value, address:{ line1 : adresse.value, city : city.value
                            }}
                    }
                })
                .then(function(result) {
                    // console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        var token = '{{ csrf_token() }}';
                        fetch('/paiement', {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, /",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'POST',
                            body: JSON.stringify({
                                paymentIntent: result
                            })

                        }).then((data) => {
                            if (!data.ok) {
                                console.log('Mauvaise réponse du réseau');
                            }

                            document.location.href = "/merci";
                        }).catch((error) => {
                            console.error(error)
                        })
                        console.log(result);
                        console.log("coucou");
                    }
                });
        });
    </script>
</body>


</html>
