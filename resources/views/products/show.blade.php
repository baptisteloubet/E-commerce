@extends('layouts.app')
@section('title')
    Nos Produits
@endsection
@section('content')
<a href="/produit#recherche-retour" style="font-size: 25px; " class="btn "><i class="fas fa-arrow-left pr-2"></i><span style="'font-family: Sanchez;">Retour</span></a>
<div class="container mx-auto px-3 pt-10">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="row no-gutters rounded30 shadow-lg overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h1 class="mb-0 text-4xl">{{$product->title}}</h1>
                    <p class="mb-8 text-xl">{{$product->getPrice()}}</p>
                    <p class="col-lg-9 pl-0 text-xl text-justify">{{$product->description}}</p>
                    <form action="{{ route('cart.store_product') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn bgcolorblue text-white ">Ajouter au panier</button>
                    </form>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{$product->image}}">
                </div>
            </div>
        </div>
    </div>
    <h5>Commentaires</h5><br/>

    @forelse ($product->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                {{$comment->content }}
                <div class="d-flex justify-content-between align-items-center">
                    <small>Posté le {{ $comment ->created_at->format('d/m/y ')}} par {{$comment->user->name}}</small>
                    @can('delete', $comment)
                    <form action="{{route('comments.destroy', $comment)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info bg-green-400 text-white">Aucun commentaire pour ce produit </div>
    @endforelse

    <form action="{{route('comments.store', $product)}}" method="POST" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="content">Votre commentaire :</label>
            <textarea class="form-control" @error('content') is-invalid @enderror name="content" id="content" rows="5"></textarea>
            @error('content')
                <div class="invalid-feedback">{{$errors->first('content')}}</div>
            @enderror
        </div>


        <button type="submit" class="btn bgcolorblue text-white mb-16">Soumettre mon commentaire</button>
    </form>
</div>




@endsection
