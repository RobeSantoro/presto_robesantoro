{{-- Lavorare qui dentro. --}}
@extends('layouts.app')
@section('content')

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            
            <div class="col-12 col-md-8 text-center">
                <h1 class="font-weight-light heroText gray">Pres<span class="blue">to</span></h1>
                <p class="lead">... il peggior clone di subito.it</p>

                {{-- Ricerca Avanzata --}}
                <div id="Advanced" class="d-none">
                    <div class="form-group mt-2">
                        <label>Categorie</label>
                        <select class="form-control" id="CategorySelector">
                            <option>Tutte le categorie</option>
                            <option>Motori</option>
                            <option>Market</option>
                            <option>Immobili</option>
                            <option>Lavoro</option>
                        </select>
                    </div>
                    
                    <div class="form-group mt-2">
                        <label>Luogo</label>
                        <input class="form-control" type="text" placeholder="Inserisci città o CAP es: Bari | 70100 ">
                    </div>
                </div>
                {{-- Ricerca Avanzata --}}
                
                
                <label id="keywords" class="d-none">Inserisci parole chiave</label>
                <input class="form-control form-control-lg" type="text" placeholder="Cerca su Presto.it">
                            
                <button type="button" class="btn btn-primary btn-lg mt-4 px-5">Cerca</button>



                <button type="button" class="btn btn-secondary btn-lg mt-4" id="btnAdvanced">Avanzata</button>



                               
                <a href="{{ route('contacts') }}" class="d-block mt-3">Contattaci</a>
            </div>

                    

            
        </div>
    </div>
</header>


<section>



</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
