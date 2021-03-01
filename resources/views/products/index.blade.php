@extends('layouts.app')

@section('content')

<main class="my-8">
    <h1 class="text-center mb-4 mr-5 font-weight-bold text-4xl">Nos produits </h1>
    <div class="container mx-auto px-6">
        <div class="d-flex justify-content-center">
            <form action="{{ route('products.search') }}" class="d-flex mr-3 ">
                <div class="form-group mb-0 mr-1">
                    <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <h1 class="text-center mt-2 mr-5  font-italic">Recherche ton produit !</h1>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach (App\Models\Category::all() as $category)
                <a class="p-2 text-muted" href="{{ route('products.index', ['categorie' => $category->name]) }}">{{ $category->name }}</a>
                @endforeach
            </nav>
        </div>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <form action="{{ route('cart.store_product') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$product->image}}')">
                        <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" type="submit">
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

<div class="d-flex justify-content-center">
    {{ $products->links('pagination::bootstrap-4') }}
</div>
@endsection
