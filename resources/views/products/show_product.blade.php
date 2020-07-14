@extends('layouts.app')

@section('content')

<div class="container pt-5">

    <div class="row justify-content-center">

        <div class="col-12 text-center mb-4">
            <h1>{{ $product->product_name }}</h1>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            @if(count($product->productImages) > 0)

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->productImages as $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ $image->getUrl(300,300) }}" class="card-img-top" alt="{{ $product->product_description }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                {{-- @foreach($product->productImages as $image)
                    <img class="card-img-top" src="{{ $image->getUrl(300,300) }}" alt="{{ $product->product_description }}">
                @endforeach --}}

            @else
                <img class="card-img-top" src="https://via.placeholder.com/300" alt="Image Missing">
            @endif
            <p class="card-text">{{ $product->product_description }}</p>

            <p class="card-text">Inserito da {{ $product->user->name }}</p>
            @if(Auth::user() && Auth::user()->is_revisor == true)

                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('revisor.reject' , $product->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger float-left">Rifiuta</button>
                        </form>
                        <form action="{{ route('revisor.accept' , $product->id) }}"
                            method="POST">
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
