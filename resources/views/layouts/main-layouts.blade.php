<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/styles/massege.css">
    @yield('custom_css')
    
</head>
<body>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">SR</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-2 ms-md-4">
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('create')}}">Заполнение данных</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('index')}}">Посмотреть Доходы/Расходы</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('create.type')}}">Добавить тип</a>
                </nav>
                <script src="{{ asset('js/app.js') }}" defer></script>

                    <!-- Fonts -->
                    <link rel="dns-prefetch" href="//fonts.gstatic.com">
                    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

                    <!-- Styles -->
                    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                    </head>
                    <body>
                        <div id="app">
                            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                                <div class="container">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                                @if (Route::has('register'))
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    </li>
                                                @endif
                                            @else
                                                <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }}
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            </header>
                @include('inc.massege')
                @yield('content')
        </div>
    </div>

</body>
</html>