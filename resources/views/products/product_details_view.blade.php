@extends('layouts.app')

@section('content')

<div class="container pt-5">

    <div class="row justify-content-center">

        <div class="col-12 text-center mb-4">
            <h1>{{ $product->product_name }}</h1>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            @if($product->img != 'NULL')
                <img class="card-img-top" src="{{ Storage::url($product->img) }}" alt="Card image cap">
            @else
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
            @endif
            <p class="card-text">{{ $product->product_description }}</p>

            <p class="card-text">Inserito da {{ $product->user->name }}</p>

            <a href="#" class="btn btn-primary">Compra</a>

        </div>

    </div>


</div>


@endsection
