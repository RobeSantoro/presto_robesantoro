{{-- Gli Include non necessitano di @ --}}

<!--NAVBAR-->
<nav class="navbar transparent navbar-expand-md shadow-lg ">
    <div class="container">

        <a class="navbar-brand"
            href="{{ route('home_route') }}">{{ config('app.name', 'Presto') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">

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

                    @if(Auth::user() && Auth::user()->is_revisor == true)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revisor.home') }}">Revisor Home
                                <span class="badge badge-pill badge-warning">{{ \App\Product::ToBeRevisionedCount() }}</span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user px-2"></i>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('product_create_route') }}">Pubblica</a>

                            {{-- TEMP FEATURE TO BE REVISOR  --}}
                            <form action="/become/revisor" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item btn-link" name="is_revisor">Revisore</button>
                            </form>
                            {{-- TEMP FEATURE TO BE REVISOR  --}}

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                ">
                                {{ __('Logout') }}
                            </a>

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
