@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div class="col-12 text-center mb-4">
            <h1>I nostri Revisori</h1>
        </div>

        @foreach($revisors as $revisor)

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            <div class="card h-100">

                @if($revisor->photo)
                    <img class="card-img-top" src="{{ Storage::url($revisor->photo) }}" alt="Card image cap">
                @else
                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                @endif

                <div class="card-body">

                    <h5 class="card-title">{{ $revisor->name }} {{ $revisor->surname }}</h5>

                    <p class="card-text">{{ $revisor->email }}</p>
                    <p class="card-text">
                        Some quick example text to build on the card title
                        and make up the bulk of the card's content.</p>
                    <a href="mailto:{{$revisor->email}}" class="btn btn-primary w-100">Contatta</a>
                </div>
            </div>

        </div>

        @endforeach


        {{-- Paginator Links --}}
{{--
        <div class="col-12 d-flex justify-content-center mb-4">
            {{ $revisors ?? ''->links() }}
        </div>
  --}}
    </div>
</div>
@endsection
