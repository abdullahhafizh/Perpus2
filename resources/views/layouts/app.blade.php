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
    <link href="{{ asset('css/octicons/lib/octicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <style>    
    .footer2 {
      position: absolute;      
      bottom: 0 auto;      
      width: 100%;
      height: auto;
      line-height: 60px;
      background-color: #f5f5f5;
  } 
  img[alt*="www.000webhost.com"] {
    display: none;}
    .icon:hover {
        -webkit-animation: pulse 0.75s;
        animation: pulse 0.75s;
    }
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
            <footer class="footer2">
              <div class="container">                        
                <div class="float-left text-center">
                    <a class="text-muted" href="http://smkn10jakarta.sch.id" target="_blank">SMK Negeri 10 Jakarta</a> -
                    <a class="text-muted">InterSoft</a> -
                    <a class="text-muted" href="https://facebook.com/100006797383542/" target="_blank">Abdullah Hafizh</a>
                </div>                     
                <div class="float-right text-center">
                    <a href="https://github.com/abdullahhafizh" target="_blank">
                        <button class="icon btn btn-default" aria-label="Follow @abdullahhafizh on GitHub" title="Follow @abdullahhafizh on GitHub">
                            <img class="img-responsive" src="{{ asset('css/octicons/lib/svg/mark-github.svg') }}"></img> <b>Follow @abdullahhafizh</b>
                        </button>
                    </a>
                    <a href="https://github.com/abdullahhafizh/Perpus2/subscription" target="_blank">
                        <button class="icon btn btn-default" aria-label="Watch abdullahhafizh/Perpus2 on GitHub" title="Watch abdullahhafizh/Perpus2 on GitHub">
                            <img class="img-responsive" src="{{ asset('css/octicons/lib/svg/eye.svg') }}"></img> <b>Watch</b>
                        </button>
                    </a>
                    <a href="https://github.com/abdullahhafizh/Perpus2" target="_blank">
                        <button class="icon btn btn-default" aria-label="Star abdullahhafizh/Perpus2 on GitHub" title="Star abdullahhafizh/Perpus2 on GitHub">
                            <img class="img-responsive" src="{{ asset('css/octicons/lib/svg/star.svg') }}"></img> <b>Star</b>
                        </button>
                    </a>
                    <a href="https://github.com/abdullahhafizh/Perpus2/archive/master.zip" target="_blank">
                        <button class="icon btn btn-default" aria-label="Download abdullahhafizh/Perpus2 on GitHub" title="Download abdullahhafizh/Perpus2 on GitHub"><img class="img-responsive" src="{{ asset('css/octicons/lib/svg/cloud-download.svg') }}"></img> <b>Download</b>
                        </button>
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->            
    @yield('foot-content')
</body>
</html>
