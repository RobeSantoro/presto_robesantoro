{{-- Lavorare qui dentro. --}}
@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div class="col-12 text-center mb-4">
            <h1>La famiglia Yates</h1>
        </div>

        @foreach($contacts as $contact)

        <div class="col-12 col-md-6 col-lg-4 mb-4">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $contact->name }} {{ $contact->surname }}</h5>

                    <p class="card-text">{{ $contact->email }}</p>
                        <p class="card-text">
                        Some quick example text to build on the card title
                        and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>

        @endforeach

        <div class="col-12 justify-content-center mb-4">
            {{ $contacts->links() }}
        </div>

@endsection
