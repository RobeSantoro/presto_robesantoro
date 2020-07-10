@extends('layouts.app')
@section('content')

<!--MAIN-->
<main class="container pt-custom">
    <div id="logo" class="row justify-content-center">

        <div id="SearchModule" class="col-12 col-sm-10 col-md-8 col-lg-6 text-center align-self-end mt-5">

            <h1 class="font-weight-light display-logo gray mb-0">Pres<span class="blue">to</span></h1>
            <p class="lead pb-4">... il peggior clone di subito.it</p>

            {{-- Search INPUT --}}
            <div class="form-group">
                <label for="SearchInput" id="SearchLabel" class="gray float-left mt-3 mb-0 ml-2 d-none" ">Inserisci parole chiave</label>
                <input id=" SearchInput" class="form-control form-control-lg" type="text"
                    placeholder="Cerca su Presto.it">
            </div>

            {{-- Advanced Search --}}
            <div id="AdvancedFormGroup" class="collapse">
                <div class="form-group">
                    <label class="gray float-left mt-3 mb-0 ml-2" for="CategorySelector">Seleziona
                        Categoria</label>
                    <select name="category_id" class="form-control" id="CategorySelector">
                        @foreach( $categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category') == $category->id ? 'selected' :'' }}>
                                {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="gray float-left mt-3 mb-0 ml-2" for="country">Seleziona Comune</label>
                    <select sid="country" name="country" class="form-control">
                        <option value="it">Tutti i comuni</option>
                        <option value="ag">Agrigento</option>
                        <option value="al">Alessandria</option>
                        <option value="an">Ancona</option>
                        <option value="ao">Aosta</option>
                        <option value="ar">Arezzo</option>
                        <option value="ap">Ascoli Piceno</option>
                        <option value="at">Asti</option>
                        <option value="av">Avellino</option>
                        <option value="ba">Bari</option>
                        <option value="bt">Barletta-Andria-Trani</option>
                        <option value="bl">Belluno</option>
                        <option value="bn">Benevento</option>
                        <option value="bg">Bergamo</option>
                        <option value="bi">Biella</option>
                        <option value="bo">Bologna</option>
                        <option value="bz">Bolzano</option>
                        <option value="bs">Brescia</option>
                        <option value="br">Brindisi</option>
                        <option value="ca">Cagliari</option>
                        <option value="cl">Caltanissetta</option>
                        <option value="cb">Campobasso</option>
                        <option value="ci">Carbonia-iglesias</option>
                        <option value="ce">Caserta</option>
                        <option value="ct">Catania</option>
                        <option value="cz">Catanzaro</option>
                        <option value="ch">Chieti</option>
                        <option value="co">Como</option>
                        <option value="cs">Cosenza</option>
                        <option value="cr">Cremona</option>
                        <option value="kr">Crotone</option>
                        <option value="cn">Cuneo</option>
                        <option value="en">Enna</option>
                        <option value="fm">Fermo</option>
                        <option value="fe">Ferrara</option>
                        <option value="fi">Firenze</option>
                        <option value="fg">Foggia</option>
                        <option value="fc">Forl&igrave;-Cesena</option>
                        <option value="fr">Frosinone</option>
                        <option value="ge">Genova</option>
                        <option value="go">Gorizia</option>
                        <option value="gr">Grosseto</option>
                        <option value="im">Imperia</option>
                        <option value="is">Isernia</option>
                        <option value="sp">La spezia</option>
                        <option value="aq">L'aquila</option>
                        <option value="lt">Latina</option>
                        <option value="le">Lecce</option>
                        <option value="lc">Lecco</option>
                        <option value="li">Livorno</option>
                        <option value="lo">Lodi</option>
                        <option value="lu">Lucca</option>
                        <option value="mc">Macerata</option>
                        <option value="mn">Mantova</option>
                        <option value="ms">Massa-Carrara</option>
                        <option value="mt">Matera</option>
                        <option value="vs">Medio Campidano</option>
                        <option value="me">Messina</option>
                        <option value="mi">Milano</option>
                        <option value="mo">Modena</option>
                        <option value="mb">Monza e della Brianza</option>
                        <option value="na">Napoli</option>
                        <option value="no">Novara</option>
                        <option value="nu">Nuoro</option>
                        <option value="og">Ogliastra</option>
                        <option value="ot">Olbia-Tempio</option>
                        <option value="or">Oristano</option>
                        <option value="pd">Padova</option>
                        <option value="pa">Palermo</option>
                        <option value="pr">Parma</option>
                        <option value="pv">Pavia</option>
                        <option value="pg">Perugia</option>
                        <option value="pu">Pesaro e Urbino</option>
                        <option value="pe">Pescara</option>
                        <option value="pc">Piacenza</option>
                        <option value="pi">Pisa</option>
                        <option value="pt">Pistoia</option>
                        <option value="pn">Pordenone</option>
                        <option value="pz">Potenza</option>
                        <option value="po">Prato</option>
                        <option value="rg">Ragusa</option>
                        <option value="ra">Ravenna</option>
                        <option value="rc">Reggio di Calabria</option>
                        <option value="re">Reggio nell'Emilia</option>
                        <option value="ri">Rieti</option>
                        <option value="rn">Rimini</option>
                        <option value="rm">Roma</option>
                        <option value="ro">Rovigo</option>
                        <option value="sa">Salerno</option>
                        <option value="ss">Sassari</option>
                        <option value="sv">Savona</option>
                        <option value="si">Siena</option>
                        <option value="sr">Siracusa</option>
                        <option value="so">Sondrio</option>
                        <option value="ta">Taranto</option>
                        <option value="te">Teramo</option>
                        <option value="tr">Terni</option>
                        <option value="to">Torino</option>
                        <option value="tp">Trapani</option>
                        <option value="tn">Trento</option>
                        <option value="tv">Treviso</option>
                        <option value="ts">Trieste</option>
                        <option value="ud">Udine</option>
                        <option value="va">Varese</option>
                        <option value="ve">Venezia</option>
                        <option value="vb">Verbano-Cusio-Ossola</option>
                        <option value="vc">Vercelli</option>
                        <option value="vr">Verona</option>
                        <option value="vv">Vibo valentia</option>
                        <option value="vi">Vicenza</option>
                        <option value="vt">Viterbo</option>
                    </select>
                </div>
            </div>

        </div>

    </div>

    <div class="row justify-content-center">
        {{-- Advanced Search Buttons --}}
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center align-self-start mt-3">
            <button type="button" id="SearchBtn" class="btn btn-primary btn-lg m-2 px-5">Cerca</button>
            <button type="button" id="AdvancedBtn" class="btn btn-secondary btn-lg m-2 px-3" data-toggle="collapse"
                data-target="#AdvancedFormGroup"><a href="#logo"
                    class="text-white text-decoration-none">Avanzata</a></button>
        </div>
    </div>

</main>

@endsection
