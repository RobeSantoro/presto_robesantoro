@extends('layouts.app')

@section('content')

<div class="container pt-5">

    <div class="row justify-content-center">

        <div class="col-12 text-center mb-4">
            <h1>{{ $product->product_name }}</h1>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            @if(false)
                <img class="card-img-top" src="{{ Storage::url($product->img) }}" alt="Card image cap">
            @else
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
            @endif
            <p class="card-text">{{ $product->product_description }}</p>

            <p class="card-text">Inserito da {{ $product->user->name }}</p>
            @if(Auth::user() && Auth::user()->is_revisor == true)

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('revisor.reject' , $product->id) }}" method ="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger float-left">Rifiuta</button>
                    </form>
                    <form action="{{ route('revisor.accept' , $product->id) }}" method ="POST">
                        @csrf
                        <button type="submit" class="btn btn-success float-right">Approva</button>
                    </form>

                </div>
            </div>

            @else
            <a href="#" class="btn btn-primary">Compra</a>
            @endif

        </div>

    </div>


</div>


@endsection
