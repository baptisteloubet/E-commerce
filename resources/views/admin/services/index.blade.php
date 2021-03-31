@extends('layouts.panel')
@section('title')
    Gestion
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestion des services</div>

                <div class="card-body">

                    <table class="table">
                    <thread>
                        <tr>
                        <th scope ="col">Nom</th>
                        <th scope ="col">Actions</th>
                        </tr>
                    </thread>
                    <tbody>
                   @foreach ($services as $service)
                        <tr>
                        <td>{{$service->title}}</td>
                        <td>
                            <a href="{{route('services.show', $service)}}" class=" btn btn-primary">Voir</a>
                            <a href="{{route('service.edit', $service)}}" class=" btn btn-warning">Modifier</a>
                            <form action="{{route('service.destroy', $service)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
