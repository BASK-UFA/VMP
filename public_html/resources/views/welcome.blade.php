@extends('layouts.app')
@section('content')

    <div id="welc" class="row mb-5" style="margin-top: -6.1rem; margin-right: 0;">
        <div class="w-100 d-block mb-1 text-center" style="min-height: 400px; max-height: 400px;">
            <h1 class="w-100 text-white Oswald" style="margin-left: 0 !important; right: 0;">Виртуальная мастерская
                программистов</h1>
            <img class="col-md-12" src="{{asset('images/norm.jpg')}}" alt=""
                 style="width: 100% !important; padding-right: 0; height: 100% !important;">
        </div>
    </div>

    <div class="container d-block">
        <div class="row">
            <div class="offset-lg-1 col-lg-4 welc_cont">
                <h3 class="about_title text-left">О нас</h3>
                <h2 class="about_text text-left">Мы создаем будущее</h2>
                <div class="about_line bg-warning">
                </div>
            </div>
            <div class="col-lg-6 welc_cont">
                <p class="about_us">
                    Виртуальная мастерская программистов - сайт, который позволяет загружать работы студентов и удобно
                    просматривать их.
                </p>
                <div class="about_team">
                    Разделы сайта:
                </div>
                <ul class="about_team">
                    <li>Блог - страница с нашими новостями</li>
                    <li>Наши работы - страница с нашими работами студентов</li>
                    <li>Платформа обучения - информация по обучению</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
