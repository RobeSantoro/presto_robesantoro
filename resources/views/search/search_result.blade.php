@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div class="row w-100">
            <div class="col-12 text-center mb-4">

            @if($products == '')
                <h2> Risultati per la ricerca: {{ $query }} </h2>
            @endif
                <h2> Non ci sono risultati per la ricerca: {{ $query }} </h2>
            </div>
        </div>

        <div class="row w-100">

            @foreach($products as $product)
                @include('includes._product')
            @endforeach

        </div>

{{--         <div class="row w-100">
            <div class="col-12">
                {{ $products->links() }}
            </div>
        </div> --}}

    </div>
</div>
@endsection
