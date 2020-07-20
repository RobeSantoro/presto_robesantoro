@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">

        <div id="AddProdductForm" class="col-12 text-center align-self-end">

            <h1 class="pb-5">Pubblica Annuncio</h1>

            <div class="card">
                <div class="card-body">

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('store_product_route') }}">
                        @csrf

                        <input type="hidden" name="uniqueSecret" value="{{ $uniqueSecret }}">

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Nome Prodotto</label>
                        <input class="form-control" type="text" placeholder="Inserisci Nome Prodotto"
                            name="product_name" value="{{ old('product_name') }}">

                        @if($errors->has('product_name'))
                            <p class="m-0" style="color:red;" >{{ $errors->first('product_name') }}</p>
                        @endif

                        <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Descrizione
                            Prodotto</label>
                        <input class="form-control" type="text" placeholder="Inserisci Descrizione Prodotto"
                            name="product_description" value="{{ old('product_description') }}">

                        @if($errors->has('product_description'))
                            <p class="m-0" style="color:red;" >{{ $errors->first('product_description') }}</p>
                        @endif

                        <div class="form-group">
                            <label class="gray float-left mt-3 mb-0 ml-2" for="CategorySelector">Seleziona Categoria</label>
                            <select name="category_id" class="form-control" id="CategorySelector">
                                @foreach ( $categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' :'' }}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        @if($errors->has('category_id'))
                            <p class="m-0" style="color:red;" >{{ $errors->first('category_id') }}</p>
                        @endif

                        <div class="form-group text-left">
                            <label class="gray text-left mt-0 mb-0 ml-2" for="images">Inserisci immagini</label>
                            <div class="dropzone" id="drophere"></div>
                        </div>

                        <button type="submit" class="btn btn-primary my-3 px-5">Pubblica</button>

                    </form>
                    {{-- FORM --}}

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
