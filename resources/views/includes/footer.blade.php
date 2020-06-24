{{-- Gli Include non necessitano di @ --}}

<!--FOOTER-->
<footer id="" class="">
    <div class="container-fluid text-center py-5">

        <button type="button" class="btn">
            <a href="{{ route('home_route') }}"
                class="lead mb-2 mx-2 gray">Home</a>
        </button>

        <button type="button" class="btn">
            <a href="{{ route('products_route') }}"
                class="lead mb-2 mx-2 gray">Prodotti</a>
        </button>

        <div class="btn-group">
            <button type="button" class="btn mr-0">
                <a href="{{ route('categories_route') }}"
                class="lead mb-2 mr-0 ml-2 gray">Categorie</a>
            </button>
            <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Motori</a>
                <a class="dropdown-item" href="#">Market</a>
                <a class="dropdown-item" href="#">Immobili</a>
                <a class="dropdown-item" href="#">Lavoro</a>
            </div>
        </div>

        <button type="button" class="btn">
            <a href="{{ route('contact_route') }}"
                class="lead mb-2 mx-2 gray">Contattaci</a>
        </button>


        <button type="button" class="btn">
            <a href="{{ route('cards_route') }}"
                class="lead mb-2 mx-2 gray">Cards</a>
        </button>

    </div>
</footer>
