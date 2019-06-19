<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/init.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('patient')}}">Mes patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('patient/create')}}">Admission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prescrire</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Fichier
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <a class="dropdown-item" href="/service">service</a>
                                    <a class="dropdown-item" href="/medicament/create">Ajouter Médicaments</a>
                                    @if( \Illuminate\Support\Facades\Auth::user()->type === \App\User::ADMIN_TYPE )
                                        <a class="dropdown-item" href="{{ url('medecin/create')}}">Ajouter Médecins</a>
                                    @endif
                                    @if( \Illuminate\Support\Facades\Auth::user()->type === \App\User::ADMIN_TYPE )
                                        <a class="dropdown-item" href="/infermiere">Ajouter Infirmières</a>
                                    @endif
                                    @if( \Illuminate\Support\Facades\Auth::user()->type === \App\User::ADMIN_TYPE )
                                        <a class="dropdown-item" href="/secretaire">Ajouter Secrétaire</a>
                                    @endif
                                    @if( \Illuminate\Support\Facades\Auth::user()->type === \App\User::SECRETAIRE_TYPE )
                                        <a class="dropdown-item" href="/gardem">Ajouter Garde Malade</a>
                                    @endif
                                @endif
                            </div>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <?php
                                        $user = \Illuminate\Support\Facades\Auth::user();
                                        $auth = false;
                                        if( !empty($user) )
                                            if( $user->type === \App\User::ADMIN_TYPE )
                                                $auth = true;
                                    ?>
                                    @if( $auth )
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
