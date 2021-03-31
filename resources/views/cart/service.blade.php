@extends('layouts.app')
@section('title')
    Panier
@endsection
@section('content')


@if (Cart::count() > 0)
<div class="px-4 px-lg-0">
    <div class="pb-5">
        <div class="container mt-32">
            <h1 class="text-center ">Fait ta demande !</h1>
            <br><br>
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-lg mb-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Service</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Temps de location (en jours) -> Environ 100€ la journée</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $key => $service)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="d-flex">
                                            <img src="{{ $service->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3">
                                                <h5 class="mt-3">{{ $service->model->title }}</h5>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle">
                                        <select name="qty" id="{{$key}}qty" data-id="{{ $service->rowId }}" class="custom-select w-20 ml-5" onchange="qty('{{ $service->rowId }}','{{$key}}')">
                                            @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" {{ $i == $service->qty ? 'selected' : ''}}>
                                                {{ $i }}
                                                </option>
                                                @endfor
                                        </select>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row  p-4 bg-white rounded shadow-lg">
                        <div class="col-lg-12">
                            <div class="p-2 col-lg-4 offset-lg-4">
                                <a href="{{route('checkout.index_service')}}" class="btn bg-vert rounded-pill py-2 btn-block hover:text-white hover:bg-dark">Passez à la caisse pour générer votre devis</a>
                            </div>
                            <div class="text-center p-4">
                                <form action="{{ route('cart.destroy_service', $service->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Annuler</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-md-12">
    <p>Votre panier est vide.</p>
</div>
@endif
@endsection


@section('extra-js')
<script>
    function qty(rowId, key) {
        console.log(rowId)
        var select = document.getElementById(key + 'qty')
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`/panier/service/${rowId}`, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'PATCH',
            body: JSON.stringify({
                qty: select.value,
                size: 'test',
                emplacement: 'test'
            })
        }).then((data) => {
            console.log(data);
            // location.reload();
        }).catch((error) => {
            console.log(error);
        });
    }
</script>

@endsection
