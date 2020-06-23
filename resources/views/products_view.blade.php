{{-- Lavorare qui dentro. --}}
@extends('layouts.app')
@section('content')

<div class="container pt-5">

    <div class="row justify-content-center pt-5">

        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Tutti i Prodotti</h1>
            </div>
        </div>

        <div class="row">

            @foreach($products as $product)
                <div class="col-12 col-md-6 col-lg-4 mb-4 justify-content-center">

                    <div class="card h-100" style="width: 18rem;">

                        @if($product->img != 'NULL')
                            <img class="card-img-top" src="{{ Storage::url($product->img) }}"
                                alt="Card image cap">
                        @else
                            <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                        @endif

                        <div class="card-body">

                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">{{ $product->product_description }}</p>
                            <p class="card-text">Inserito da {{ $product->user->name }}</p>
                            <a href="{{ route('product_details',['id'=>$product->id]) }}"
                                class="btn btn-primary">Dettagli</a>

                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>


</div>
@endsection
