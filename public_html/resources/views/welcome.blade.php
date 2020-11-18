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
                        Следует отметить, что постоянный количественный рост и сфера нашей активности способствует подготовке и реализации соответствующих условий активизации.
                    </p>
                    <p class="about_team">
                        В рамках спецификации современных стандартов, многие известные личности, превозмогая сложившуюся непростую экономическую ситуацию, рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок. В частности, курс на социально-ориентированный национальный проект предоставляет широкие возможности для анализа существующих паттернов поведения. И нет сомнений, что предприниматели в сети интернет, превозмогая сложившуюся непростую экономическую ситуацию, объединены в целые кластеры себе подобных.
                    </p>
                </div>
            </div>
        </div>
@endsection
