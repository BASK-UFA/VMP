<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>

        #app {
            position: relative;
            min-height: 100%;
            height: fit-content;
            padding-bottom: 29px;
        }

        .products .card {
            width: 100%;
            background-color: white;
            border-radius: 10px;
            -webkit-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.14);
            -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.14);
            box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.14);
            margin: auto;
            text-align: left;
            cursor: pointer;
            position: relative;
            height: 360px;
            display: inline-block;
            transform: scale(.9);
            transition: all .3s;
        }

        .products .card:hover {
            transform: scale(.95);
        }

        .products .card-top {
            width: 100%;
            height: 270px;
            background-color: #f1f1f1;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .products .card-top > img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            width: 100%;
            height: 100%;
        }

        .cont{
            z-index:0;
        }

        .products .card-mid {
            padding: 20px;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 100px;
            /*max-height: 30px;*/
            background-color: white;
            border-bottom-left-radius: 10px;
            overflow: hidden;
            border-bottom-right-radius: 10px;
            transition: all .3s;
        }

        .products .card:hover .card-mid {
            height: auto;
        }

        .products .card-mid h4 {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .products .card-mid label {
            margin: 0;
            display: block;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            color: grey;
        }

        .products .card-image {
            transition: all .3s;
        }

        .products .card:hover .card-image {
            /*-webkit-filter: grayscale(60%); !* Safari 6.0 - 9.0 *!*/
            /*filter: grayscale(60%);*/
        }

        .products .card-desc {
            transition: all .3s .2s;
            border-left: 0px solid #b4deac;
        }

        .products .card:hover .card-desc {
            border-left: 2px solid #b4deac;
            padding-left: 8px;
        }

        .products .card-blur-zone {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            height: 15px;
            background-color: rgba(255, 255, 255, .8);

        }

        .pagination {
            margin-bottom: 0;
        }

        .navbar-main {
            background-color: rgba(52, 58, 64,0.8);
            padding-top: 0.8rem!important;
            color:#fff;
            z-index: 41;

        }
        .navbar-drop {
            border:0;
            background-color: rgba(52, 58, 64,0.8);
            color:#fff;
            z-index: 41;
        }

        .bg-dark-opacity {
            background-color: rgba(52, 58, 64, 0.8);
        }

        .navbar-add {
            z-index: 100;
        }
        .collapsing {
            -webkit-transition: none;
            transition: none;
            display: none;
        }

        .posts__item__content {
            border: 0 solid rgba(0, 0, 0, 0.1);;
            border-bottom-width: 1px;
        }

        .posts__item__content:last-child {
            border: 0;
        }

        .skill_block:hover {
            box-shadow: none !important;
        }

        .product_bg::after {
            /*content: none;*/
            z-index: 0 !important;
        }

        .product_img {
            z-index: 1000000 !important;
            padding-bottom: 20px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body class="h-100">

<div id="app">
    <div class="navbar-add navbar navbar-expand-lg navbar-dark  bg-dark">
        <div class="navbar-collapse container">
            <ul class="navbar-nav text-sm-center">
                <li class="nav-item text-left active">
                    <a class="nav-link p-0" href="tel:+79177416045">
                        <div class="mobile pr-md-2">
                            <i class="mr-md-1 mr-0 pl-0 pl-md-2 ml-0 fa fa-mobile"></i>
                            +7 (917) 741-60-45
                        </div>
                    </a>
                </li>
                <li class="nav-item text-left active">
                    <a class="nav-link p-0" href="#">
                        <div class="mail pr-md-2">
                            <i class="mr-md-1 mr-0 pl-0 pl-md-2 ml-0 fa fa-envelope"></i>
                            basirovaufa@mail.ru
                        </div>
                    </a>
                </li>
                {{--                <li class="nav-item text-left active">--}}
                {{--                    <a class="nav-link p-0" href="#">--}}
                {{--                        <div class="address pr-md-2">--}}
                {{--                            <i class="mr-md-1 mr-0 pl-0 pl-md-2 ml-0 fa fa-map-marker"></i>--}}
                {{--                            адрес--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark Oswald navbar-main pb-0 position-absolute w-100">
        <div class="container text-center">
            <a class="navbar-brand h4" href="{{ route('/') }}">ВМП</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link h4 text-center" href="{{ route('/') }}">Главная<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                       <a class="nav-link h4" href="{{ route('posts.index') }}">Блог</a>
                   </li>
                   <li class="nav-item active">
                       <a class="nav-link h4" href="{{ route('products.index') }}">Наши работы</a>
                   </li>
                   <li class="nav-item active position-relative">
                       <a class="nav-link h4" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">Платформа обучения</a>
                       <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           <a class="dropdown-item" href="{{ route('education.web') }}">Динамическое WEB
                               программирование</a>
                           <a class="dropdown-item" href="{{ route('education.system') }}">Сетевое и системное
                               администрирование</a>
                           <a class="dropdown-item" href="{{ route('education.school') }}">Школа юного программиста</a>
                       </div>
                   </li>
               </ul>
               <ul class="navbar-nav">
                   <!-- Authentication Links -->
                   @guest
                       <li class="nav-item">
                           <a class="nav-link text-white h5 Oswald" href="{{ route('login') }}">{{ __('Войти') }}</a>
                       </li>
                       @if (Route::has('register'))
                           <li class="nav-item">
                               <a class="nav-link text-white h5 Oswald"
                                  href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                           </li>
                       @endif
                   @else
                       <li class="nav-item dropdown ">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle text-white h5 Oswald " href="#"
                              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                              v-pre>
                               {{ Auth::user()->name }} <span class="caret"></span>
                           </a>

                           <div class="dropdown-menu mb-1 bg-dark  " aria-labelledby="navbarDropdown">
                             <p>
                                 <a class="nav-item h5 Oswald text-white text-decoration-none pl-4"
                                   href="{{ route('user.show', ['id' => Auth::user()->id]) }}">Мой профиль</a>
                             </p>
                               <a class="nav-item h5 Oswald text-white text-decoration-none ml-4" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
    <main class="cont my-4" style="padding-top: 4.4rem">
        @yield('content')
    </main>
    <footer class="navbar-dark text-white text-center bg-dark position-absolute" style="bottom: 0; left: 0; right: 0">
        <div>Сайт преподавателя ГАПОУ БАСК Басырова Г.Р.</div>
    </footer>
</div>
</body>
</html>
