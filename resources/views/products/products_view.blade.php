@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Tutti i Prodotti</h1>
            </div>
        </div>

        <div class="row">

            @foreach($products as $product)
                @include('includes.product')
            @endforeach

        </div>

    </div>
</div>
@endsection
