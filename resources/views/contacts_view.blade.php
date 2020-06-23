@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center pt-5">

        <div class="col-12 text-center mb-4">


            <h1>Contattaci</h1>

        </div>
    </div>


    <div class="row justify-content-center">


        <div id="ContactForm" class="col-12 text-center align-self-end">


            <div class="card">


                <div class="card-header">
                    Inviaci i tuoi dati per essere ricontattato
                </div>

                <div class="card-body">

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('submit_route') }}">

                        @csrf

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Nome</label>
                        <input class="form-control" type="text" placeholder="Inserisci Nome" name="name"
                            value="{{ old('name') }}">

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Cognome</label>
                        <input class="form-control" type="text" placeholder="Inserisci Cognome" name="surname"
                            value="{{ old('surname') }}">

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Email</label>
                        <input class="form-control" type="email" placeholder="Inserisci e-mail" name="email"
                            value="{{ old('email') }}">

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Mobile</label>
                        <input class="form-control" type="tel" placeholder="Inserisci Tel" name="mobile"
                            value="{{ old('mobile') }}">

                        @if($errors->any())

                            <div class="my-4">

                                <ul class=" list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        <button type="reset" class="btn btn-secondary mt-5 px-5">Reset</button>
                        <button type="submit" class="btn btn-primary mt-5 px-5">Invia</button>

                    </form>
                    {{-- FORM --}}
                </div>
            </div>

        </div>
    </div>

</div>





@endsection
