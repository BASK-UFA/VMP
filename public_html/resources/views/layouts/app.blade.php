<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'vmp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .pagination {
            margin-bottom: 0;
        }

        .navbar-main {
            /*background-color: rgba(52, 58, 64, 0.8);*/
            opacity: 0.8;
        }

        .bg-dark-opacity {
            background-color: rgba(52, 58, 64, 0.8);
        }

        .navbar-add {
            z-index: 100;
        }

        .navbar-main .main-menu a {
            color: #f7992b !important;
        }

        .collapsing {
            -webkit-transition: none;
            transition: none;
            display: none;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="navbar-add navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-collapse">
            <ul class="navbar-nav text-sm-center">
                <li class="nav-item active">
                    <a class="nav-link p-0" href="#">
                        <div class="mobile">
                            <i class="ml-md-0 fa fa-mobile"></i>
                            +7-927-33-83-10
                        </div>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link p-0" href="#">
                        <div class="mail">
                            <i class="fa fa-envelope"></i>
                            bask.po_31@mail.ru
                        </div>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link p-0" href="#">
                        <div class="address">
                            <i class="fa fa-map-marker"></i>
                            ул. Проспект Октября, 174/2
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <nav class="p-0 navbar-main navbar navbar-expand-lg navbar-dark bg-dark sticky-top h_layouts">
        <a class="navbar-brand pl-3" href="{{ route('/') }}">ВМП</a>
        <button class="navbar-toggler"
                type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
            <div class="w-100 p-0 position-absolute bg-dark navbar-collapse pr-3">
                <ul class="navbar-nav m-auto main-menu h6">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('/') }}">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Наши работы</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                   href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.index') }}">Мой профиль</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
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
        @yield('content')
    </main>
</div>
</body>
</html>
