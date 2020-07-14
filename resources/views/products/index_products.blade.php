@extends('layouts.app')
@section('content')

{{-- {{ dd($products) }} --}}

@if(count($products) > 0)

    <div class="container pt-5">
        <div class="row justify-content-center">

            <div class="row w-100">
                <div class="col-12 text-center mb-4">
                    <h1>Tutti i Prodotti</h1>
                </div>
            </div>

            <div class="row w-100">

                @foreach($products as $product)
                    @include('includes._product')
                @endforeach

            </div>
        </div>
    </div>

    <div class="row w-100">
        <div class="col-12 justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

{{-- @elseif(Auth::user() && Auth::user()->is_revisor == true) --}}

@else

    <div class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <div class="col-12 text-center">

                    <h2>Non ci sono annunci da revisionare</h2>

                    <form action="{{ route('home_route') }}">
                        <button type="submit" class="btn btn-primary btn-lg mt-4 px-5">Torna alla home</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endif
@endsection
