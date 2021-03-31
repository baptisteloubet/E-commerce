@extends('layouts.app')
@section('title')
    Mes commandes
@endsection
@section('content')


<div class="space"></div>


<div class="container h-screen">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes commandes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach (Auth()->user()->orders_service as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Commande passé le {{Carbon\Carbon::parse
                                ($order->payment_created_at)->format('d/m/Y ')}}
                                                                                                        
                                <a href="{{route('devis.pdf', $order)}}" class="btn btn-success">Télécharger mon devis !</a>
                            </div>
                            <div class="card-body">
                                <h6>Détails de la commande</h6>
                                @foreach (unserialize($order->services) as $service)
                                    <div>Nom du service: {{ $service[0] }}</div>
                                    <div>Temps de location en jours : {{ $service[2] }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
