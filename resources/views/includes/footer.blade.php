{{-- Gli Include non necessitano di @ --}}

<!--FOOTER-->
<footer id="" class="d-flex flex-column mt-5">
    <div class="container text-center">
        <a href="{{ route('home_route') }}" class="lead d-inline-block mb-2 mx-2 gray">Home</a>
        <a href="{{ route('products') }}" class="lead d-inline-block mb-2 mx-2 gray">Prodotti</a>


        <span class="">
            <a href="{{ route('categories') }}" type="button" class="lead d-inline-block mb-2 ml-2 gray">Categorie</a>
            <a class="d-inline-block dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                <span class="sr-only">Toggle Dropdown</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                <a class="dropdown-item" href="#">Motori</a>
                <a class="dropdown-item" href="#">Market</a>
                <a class="dropdown-item" href="#">Immobili</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Lavoro</a>
            </div>
        </span>

        <a href="{{ route('contacts') }}" class="lead d-inline-block mb-2 mx-2 gray">Contattaci</a>
        <a href="{{ route('cards_route') }}" class="lead d-inline-block mb-2 mx-2 gray">Cards</a>

    </div>
</footer>

