@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div id="AddProdductForm" class="col-12 text-center align-self-end">

            <h1 class="pb-5">Pubblica Annuncio</h1>

            <div class="card">
                <div class="card-body">
                    <h3>{{ $uniqueSecret }}</h3>
                    {{-- FORM --}}
                    <form method="POST" action="{{ route('store_product_route') }}"
                        {{-- enctype="multipart/form-data" --}}>
                        @csrf

                        <input type="hidden" name="uniqueSecret" value="{{ $uniqueSecret }}">

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Nome Prodotto</label>
                        <input class="form-control" type="text" placeholder="Inserisci Nome Prodotto"
                            name="product_name" value="{{ old('product_name') }}">

                        @error('product_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Descrizione
                            Prodotto</label>
                        <input class="form-control" type="text" placeholder="Inserisci Descrizione Prodotto"
                            name="product_description" value="{{ old('product_description') }}">

                        @error('product_description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <div class="form-group">
                            <label class="gray float-left mt-3 mb-0 ml-2" for="CategorySelector">Seleziona
                                Categoria</label>
                            <select name="category_id" class="form-control" id="CategorySelector">
                                @foreach ( $categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' :'' }}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        @error('product_description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <div class="form-group text-left">
                            <label class="gray text-left mt-0 mb-0 ml-2" for="images">Inserisci immagini</label>

                            <div class="dropzone" id="drophere"></div>
                        </div>

                        @error('images')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        {{--<label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Immagine</label>

                         <input class="form-control" type="file" placeholder="Inserisci Nome Prodotto" name="img"
                            value="{{ old('img') }}"> --}}

                        <button type="submit" class="btn btn-primary my-3 px-5">Pubblica</button>

                    </form>
                    {{-- FORM --}}
                </div>
            </div>

        </div>
    </div>

</div>





@endsection
