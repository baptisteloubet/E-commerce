@extends('layouts.app')
@section('title')
    Nos Produits
@endsection
@section('content')

<main class="my-8">
    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-4 mb-4 font-weight-bold text-4xl">
            <h1 class="text-center productstitle">Nos produits </h1>
        </div>
    </div>
    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-1 mb-4 mr-24 productsborder"></div>
    </div>
    <section>
        <div class="row pt-16 pb-8 justify-content-center align-items-center">
            <div class="col-lg-3">
                <img src="{{asset('/img/titrepres.png')}}" />
            </div>
            <div class="col-lg-5 text-justify">
                <p class="paveservices">Éco-Services est une société créée en 2021 qui souhaite aller dans le sens de la transition écologique
                    en vous proposant des produits de tout type avec pour principal atout leur éco-responsabilité.<br/> Nous proposont
                    également des produits réutilisables, recyclés qui permettent de réduire au maximum votre empreinte carbone,
                    tout en profitant de leur qualité et de leur durabilité.<br/>  Un large panel d'articles vous est mit à disposition,
                    pour les besoins de tout un chacun :) <br />
                </p>
            </div>
        </div>
    </section>
    
    <div class="container mx-auto px-6 pt-8" id="recherche-retour">
        <div class="row col-lg-12 justify-content-center">
            <div class="col-lg-4 mb-4 font-italic text-lg">
                <h2 class="text-center productstitle">Recherchez votre produit</h2>
            </div>
        </div>
        <div class="row col-lg-12 justify-content-center">
            <div class="col-lg-1 mb-4 mr-24 productsborder"></div>
        </div>
        <div class="d-flex justify-content-center">
            <form action="{{ route('products.search') }}" class="d-flex mr-3 ">
                <div class="form-group mb-0 mr-1">
                    <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
                </div>

                <button type="submit" class="btn bgcolorblue transition duration-500 ease"><i class="fa fa-search text-white" aria-hidden="true"></i></button>

            </form>
        </div>
        <div class="nav-scroller mb-2 pt-8">
            <nav class="nav d-flex justify-content-center">
                @foreach (App\Models\Category::all() as $category)
                <a class="p-2 px-4 productstitle text-base nounderline hovergreen duration-500 ease" href="{{ route('products.index', ['categorie' => $category->name]) }}">{{ $category->name }}</a>
                @endforeach
            </nav>
        </div>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md shadowbox overflow-hidden">
                <form action="{{ route('cart.store_product') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{ $product->image }}')">
                        <button class="transition duration-500 ease p-2 rounded-full bg-green-500 text-white mx-5 -mb-4 hover:bg-green-300 focus:outline-none focus:bg-green-300" type="submit">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="px-5 py-3">
                    <a class="text-gray-700 uppercase " href="{{route('products.show', $product)}}">{{$product->title}}</a>
                    <span class="text-gray-500 mt-2">{{$product->getPrice()}}</span>
                    @foreach($product->categories as $category)
                    <span class="text-gray-500 mt-2">{{$category->name}}</span>
                    @endforeach
                </div>
            </div>
            @endforeach

        </div>

    </div>

</main>


<div class="d-flex justify-content-center colorblue mb-32">
    {{ $products->links('pagination::bootstrap-4') }}
</div>
@endsection
