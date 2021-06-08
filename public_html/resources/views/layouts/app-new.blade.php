<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Basic - SaaS Landing Page</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/my.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800;900&display=swap"
          rel="stylesheet">

</head>

<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->


<!--====== HEADER PART START ======-->

<header class="header-area d-block bg-white">
    <div class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('assets/images/logo-2.svg') }}" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" style="color: #000000" href="{{ route('/') }}">Главная</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" style="color: #000000"
                                       href="{{ route('posts.index') }}">Блог</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #000000" href="#" role="button"
                                       id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Курсы</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item"
                                           style="font-size:14px !important; color: black !important; padding: 5px 20px"
                                           href="http://vmp.local/education/web-programming">Динамическое WEB
                                            программирование</a>
                                        <a class="dropdown-item"
                                           style="font-size:14px !important; color: black !important; padding: 5px 20px"
                                           href="http://vmp.local/education/network-systems-administration">Сетевое и
                                            системное
                                            администрирование</a>
                                        <a class="dropdown-item"
                                           style="font-size:14px !important; color: black !important; padding: 5px 20px"
                                           href="http://vmp.local/education/school-of-young-programmer">Школа юного
                                            программиста</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" style="color: #000000" href="{{ route('products.index') }}">Наши
                                        работы</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" style="color: #000000"
                                       href="{{ route('education.programs.index') }}">Обучение</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <a class="main-btn" data-scroll-nav="0" href="{{ route('login') }}">Войти</a>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navbar area -->
</header>

<main class="cont" style="">
    @yield('content')
</main>

<footer id="footer" class="footer-area pt-120">
    <div class="container">
        <div class="subscribe-area" style="visibility: hidden !important;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="subscribe-content mt-45">
                        <h2 class="subscribe-title">Subscribe Our Newsletter <span>get reguler updates</span></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-form mt-50">
                        <form action="#">
                            <input type="text" placeholder="Enter eamil">
                            <button class="main-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- subscribe area -->
        <div class="footer-widget pb-100">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-8">
                    <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <a class="logo" href="#">
                            <img src="assets/images/logo.svg" alt="logo">
                        </a>
                        <p class="text">Виртуальная мастерская программистов - это сервис с комплексным подходом к
                            обучению, который позволяет стать программистом (и не только). Простая регистрация — и вы
                            участник сообщества, в котором
                            изучают и преподают программирование.</p>
                        <ul class="social">
                            {{--                            <li><a href="#"><i class="lni-facebook-filled"></i></a></li>--}}
                            {{--                            <li><a href="#"><i class="lni-twitter-filled"></i></a></li>--}}
                            {{--                            <li><a href="#"><i class="lni-instagram-filled"></i></a></li>--}}
                            {{--                            <li><a href="#"><i class="lni-linkedin-original"></i></a></li>--}}
                        </ul>
                    </div> <!-- footer about -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-7">
                    <div class="footer-link d-flex mt-50 justify-content-md-between">
                        <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="footer-title">
                                <h4 class="title">Ресурсы</h4>
                            </div>
                            <ul class="link">
                                <li><a href="#">Главная</a></li>
                                <li><a href="#">Блог</a></li>
                                <li><a href="#">Наши работы</a></li>
                                <li><a href="#">Обучение</a></li>
                                <li><a href="#">Курсы</a></li>
                            </ul>
                        </div> <!-- footer wrapper -->
                    </div> <!-- footer link -->
                </div>
                <div class="col-lg-3 col-md-5 col-sm-5">
                    <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="footer-title">
                            <h4 class="title">Контакты</h4>
                        </div>
                        <ul class="contact">
                            <li>+7 (917) 741-60-45</li>
                            <li>basirovaufa@mail.ru</li>
                            {{--                            <li>www.yourweb.com</li>--}}
                            {{--                            <li>123 Stree New York City , United <br> States Of America 750.</li>--}}
                        </ul>
                    </div> <!-- footer contact -->
                </div>
            </div> <!-- row -->
        </div> <!-- footer widget -->
        <div class="footer-copyright">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright d-sm-flex justify-content-between">
                        <div class="copyright-content">
                            <p class="text">Сайт преподавателя Басыровы Г.Р.</p>
                        </div> <!-- copyright content -->
                    </div> <!-- copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- footer copyright -->
    </div> <!-- container -->
    <div id="particles-2"></div>
</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->

<!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

<!--====== PART ENDS ======-->


<!--====== Jquery js ======-->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

<!--====== Bootstrap js ======-->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--====== Plugins js ======-->
<script src="assets/js/plugins.js"></script>

<!--====== Slick js ======-->
<script src="assets/js/slick.min.js"></script>

<!--====== Ajax Contact js ======-->
<script src="assets/js/ajax-contact.js"></script>

<!--====== Counter Up js ======-->
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>

<!--====== Magnific Popup js ======-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!--====== Scrolling Nav js ======-->
{{--<script src="assets/js/jquery.easing.min.js"></script>--}}
{{--<script src="assets/js/scrolling-nav.js"></script>--}}

<!--====== wow js ======-->
<script src="assets/js/wow.min.js"></script>

<!--====== Particles js ======-->
{{--<script src="assets/js/particles.min.js"></script>--}}

<!--====== Main js ======-->
{{--<script src="assets/js/main.js"></script>--}}

</body>

</html>
