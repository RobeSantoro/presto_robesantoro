{{-- Lavorare qui dentro. --}}
@extends('layouts.app')
@section('content')

<div class="container pt-5">

    <div class="row justify-content-center pt-5">

        <div class="col-12 text-center mb-4">
            <h1>Tutti i Prodotti</h1>
        </div>

        @foreach($products as $product)

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                <div class="card-body">

                    <h5 class="card-title">{{ $product->product_name }}</h5>

                    <p class="card-text">{{ $product->product_description }}</p>

                    <p class="card-text">Inserito da  {{ $product->user->name }}</p>

                    <a href="{{ route('product_details',['id'=>$product->id]) }}" class="btn btn-primary">Dettagli</a>

                </div>
            </div>

        </div>

        @endforeach

    </div>


</div>
@endsection
