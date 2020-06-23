@extends('layouts.app')

@section('content')

<div class="container pt-5">

    <div class="row justify-content-center pt-5">

        <div class="col-12 text-center mb-4">
            <h1>{{ $product->product_name }}</h1>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">

            <p class="card-text">{{ $product->product_description }}</p>

            <p class="card-text">Inserito da {{-- {{ Auth::user()->name }} --}}</p>

            <a href="#" class="btn btn-primary">Compra</a>

        </div>

    </div>


</div>


@endsection
