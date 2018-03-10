<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->    
    @yield('head-content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="http://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <style>
    img[alt*="www.000webhost.com"] {
        display: none;}
    </style>
</head>
<body>
    <div id="app">
        @guest
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            @else
            @if(Auth::user()->status==1)
            <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
                @else
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #e3f2fd;">
                    @endif
                    @endguest
                    <div class="container">
                        @guest
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @else
                            @if(Auth::user()->status==1)
                            <a class="navbar-brand" href="{{ url('admin') }}">
                                @else
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    @endif
                                    @endguest
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">

                                    </ul>

                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                        @else
                                        @if(Auth::user()->status==1)
                                        <li class="{{Request::segment(2) == 'peminjaman' ? 'active' : null}}"><a class="nav-link" href="{{ url('admin/peminjaman') }}">{{ __('Peminjaman') }}</a></li>
                                        <li class="{{Request::segment(2) == 'pengembalian' ? 'active' : null}}"><a class="nav-link" href="{{ url('admin/pengembalian') }}">{{ __('Pengembalian') }}</a></li>
                                        <li class="{{Request::segment(2) == 'stok' ? 'active' : null}}"><a class="nav-link" href="{{ url('admin/stok') }}">{{ __('Stok') }}</a></li>
                                        <li class="{{Request::segment(2) == 'buku' ? 'active' : null}}"><a class="nav-link" href="{{ url('admin/buku') }}">{{ __('Buku') }}</a></li>
                                        <li class="{{Request::segment(2) == 'user' ? 'active' : null}}"><a class="nav-link" href="{{ url('admin/user') }}">{{ __('User') }}</a></li>
                                        @endif
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->username }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                    <footer class="footer">
                      <div class="container">
                        <span class="text-muted">SMK Negeri 10 Jakarta - InterSoft - Abdullah Hafizh</span>
                    </div>
                </footer>
            </div>

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>        
            @yield('foot-content')
        </body>
        </html>
