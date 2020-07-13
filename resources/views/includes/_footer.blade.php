{{-- Gli Include non necessitano di @ --}}

<!--FOOTER-->
<footer id="footer">
    <div class="container-fluid text-center py-5">

        <button type="button" class="btn">
            <a href="{{ route('home_route') }}" class="lead mb-2 mx-2 gray">Home</a>
        </button>

        <button type="button" class="btn"> <a href="{{ route('index_products_route') }}"
                class="lead mb-2 mx-2 gray">Prodotti</a>
        </button>

        <div class="btn-group">
            <button type="button" class="btn mr-0" data-toggle="dropdown">
                <a href="" class="lead mb-2 mr-0 ml-2 gray">Categorie</a>
            </button>
            <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach($categories as $category)

                    <a class="dropdown-item" href="
                    {{ route('productByCategory_route',
                                [
                                $category->name,
                                $category->id
                                ]) }}
                    "> {{ $category->name }}</a>

                @endforeach
            </div>
        </div>

        <button type="button" class="btn">
            <a href="{{ route('revisors_create_route') }}"
                class="lead mb-2 mx-2 gray">Diventa Revisore</a>
        </button>

        <button type="button" class="btn">
            <a href="{{ route('revisors_index_route') }}"
                class="lead mb-2 mx-2 gray">Revisori</a>
        </button>

    </div>
</footer>
