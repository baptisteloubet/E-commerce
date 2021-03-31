@extends('layouts.app')
@section('title')
    Merci
@endsection
@section('content')

    <div class="col-md-12">
        <div class="jumbotron text-center">
            <h1 class="display-3">Merci !</h1>
            <p class="lead"><strong>Votre commande a été traitée avec succès</strong></p>
            <hr>
            <p>
                Vous rencontrez un problème ? <a href="{{route('contact.index')}}">Nous contactez</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{route('acceuil.index')}}" role="button"> Retour à l'accueil</a>
            </p>
        </div>
    </div>

@endsection
