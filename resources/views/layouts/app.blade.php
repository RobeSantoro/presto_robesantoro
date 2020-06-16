{{-- Questa è la cornice --}}

<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - il peggior clone di Subito.it</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body>
    <div id="app">
        
        @include('includes.navbar')
        
        <main>
            <div class="masthead">                
                <div class="container h-100">                    
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8 text-center">    
                            <div class="row justify-content-center">
                        
                                @yield('content')
                                
                            </div>
                            @include('includes.footer')
                        </div>    
                    </div>
                </div>
            </div>            
        </main>
        
        
        
    </div>
</body>

</html>
