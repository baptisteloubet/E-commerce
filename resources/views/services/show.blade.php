@extends('layouts.app')
@section('title')
    Nos Services
@endsection
@section('content')
<div class="container mx-auto px-6 mt-16 mb-24">
    <h1 class="text-center mb-16 mr-5 font-weight-bold text-4xl"> Le service {{$service->title}} </h1>
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="row bg-white no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-lg h-md-250 position-relative">
                <div class=" col p-4 d-flex flex-column position-static">{{$service->description}}
                    <form action="{{ route('cart.store_service') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <button type="submit" class="mt-5 btn btn-success">Saisir votre demande et générer votre devis</button>
                    </form>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{$service->image}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
