@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div class="col-12 text-center mb-4">
            <h1>I nostri Revisori</h1>
        </div>

        @foreach($Revisors as $Revisor)

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            <div class="card h-100">

                @if($Revisor->photo)
                    <img class="card-img-top" src="{{ Storage::url($Revisor->photo) }}" alt="Card image cap">
                @else
                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                @endif

                <div class="card-body">

                    <h5 class="card-title">{{ $Revisor->name }} {{ $Revisor->surname }}</h5>

                    <p class="card-text">{{ $Revisor->email }}</p>
                    <p class="card-text">
                        Some quick example text to build on the card title
                        and make up the bulk of the card's content.</p>
                    <a href="mailto:{{$Revisor->email}}" class="btn btn-primary w-100">Contatta</a>
                </div>
            </div>

        </div>

        @endforeach


        {{-- Paginator Links --}}
{{--
        <div class="col-12 d-flex justify-content-center mb-4">
            {{ $Revisors ?? ''->links() }}
        </div>
  --}}
    </div>
</div>
@endsection
