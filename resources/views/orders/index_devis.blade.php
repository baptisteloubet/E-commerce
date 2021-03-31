@extends('layouts.app')
@section('title')
    Les Devis
@endsection
@section('content')

<div class="space"></div>

<div class="container h-screen">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Les devis</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($orders_service as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Commande passé par {{$order->user->name}}

                            </div>
                            <div class="card-body text-center">
                                <a href="{{route('devis.pdf', $order)}}" class="btn bg-blue hover:text-white">Télécharger le devis !</a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
