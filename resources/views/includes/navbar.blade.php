{{-- Gli Include non necessitano di @ --}}

<!--NAVBAR-->
<nav class="navbar transparent navbar-expand-md shadow-lg ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home_route') }}">
            {{ config('app.name', '123') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar-->
            <ul class="navbar-nav mr-auto">
                <li> <button type="button" class="btn">
                        <a href="{{ route('home_route') }}" class="lead mb-2 mx-2 gray">Home</a>
                    </button></li>
                <li> <button type="button" class="btn">
                        <a href="{{ route('products_route') }}"
                            class="lead mb-2 mx-2 gray">Prodotti</a>
                    </button></li>
                <li> <button type="button" class="btn mr-0">
                        <a href="{{ route('categories_route') }}"
                            class="lead mb-2 mr-0 ml-2 gray">Categorie</a>
                    </button></li>
                <li> <button type="button" class="btn">
                        <a href="{{ route('contact_route') }}"
                            class="lead mb-2 mx-2 gray">Contattaci</a>
                    </button></li>
                <li><button type="button" class="btn">
                        <a href="{{ route('cards_route') }}" class="lead mb-2 mx-2 gray">Cards</a>
                    </button></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            {{-- <span class="caret"></span> --}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item"
                                href="{{ route('add_product_route') }}">Pubblica</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();
                        ">{{ __('Logout') }}</a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
