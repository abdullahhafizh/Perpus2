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
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <style>
    img[alt*="www.000webhost.com"] {
        display: none;}
        .icon:hover {
            -webkit-animation: pulse 1s;
            animation: pulse 1s;
        }
    </style>
    @if(Request::segment(1) == 'login' || Request::segment(1) == 'register')
    <style type="text/css">
        .footer {
            position: absolute;
        }
    </style>
    @endif
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
                        <a class="navbar-brand " href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                @guest
                                @else
                                @if(Auth::user()->status==1)
                                <li><a class="{{Request::segment(1) == 'admin' && Request::segment(2) == null ? 'active' : null}} nav-link" href="{{ url('admin') }}">{{ __('Home Admin') }}</a></li>
                                @endif
                                @endguest
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest                                
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
            <footer class="footer footer-distributed">                
                <div class="footer-right">
                    <a class="icon" href="https://github.com/abdullahhafizh" target="_blank" aria-label="Follow @abdullahhafizh on GitHub" title="Follow @abdullahhafizh on GitHub"><i class="fa fa-github"></i></a>                    
                    <a class="icon" href="https://github.com/abdullahhafizh/Perpus2/subscription" target="_blank" aria-label="Watch abdullahhafizh/Perpus2 on GitHub" title="Watch abdullahhafizh/Perpus2 on GitHub"><i class="fa fa-eye"></i></a>
                    <a class="icon" href="https://github.com/abdullahhafizh/Perpus2" target="_blank" aria-label="Star abdullahhafizh/Perpus2 on GitHub" title="Star abdullahhafizh/Perpus2 on GitHub"><i class="fa fa-star"></i></a>
                    <a class="icon" href="https://github.com/abdullahhafizh/Perpus2/archive/master.zip" target="_blank" aria-label="Download abdullahhafizh/Perpus2 on GitHub" title="Download abdullahhafizh/Perpus2 on GitHub"><i class="fa fa-cloud-download"></i></a>
                </div>
                <div class="footer-left">
                    <p class="footer-links text-muted">
                        <a href="http://smkn10jakarta.sch.id/" target="_blank">SMK Negeri 10 Jakarta</a>
                        ·
                        <a>InterSoft</a>                        
                    </p>
                    <p>Abdullah Hafizh &copy; {{ date('Y') }}</p>
                </div>
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Place this tag in your head or just before your close body tag. -->            
        @yield('foot-content')
    </body>
    </html>
