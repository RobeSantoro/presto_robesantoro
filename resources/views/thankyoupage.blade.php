@extends('layouts.app')
@section('content')

<div class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center">

            <div class="col-12 text-center">

                <h1>Grazie per averci contattato</h1>

                <form action="{{ route('home_route') }}">
                    <button type="submit" class="btn btn-primary btn-lg mt-4 px-5">Torna alla home</button>
                </form>

            </div>

        </div>

    </div>
</div>


@endsection
