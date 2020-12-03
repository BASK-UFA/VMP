@extends('layouts.app')

@section('content')
    <style>
        .web__header {
            margin-top: -6rem;
            padding: 8.3rem 0 6rem;
            margin-bottom: 2rem;
        }

        .web__header {
            font-family: 'Montserrat', sans-serif;
        }

        .web__header {
            background-color: #0e779f;
            color: #fff;
            background-image: url("../images/web__wrapper-background.svg");
        }

        .web__content {
            line-height: 1.3;
            font-size: 0.9rem;
            color: #000000;
        }
    </style>

    <div class="web__header">
        <h1 class="text-center">Динамическое WEB программирование</h1>
    </div>

    <div class="web__content">
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="border-right: 1px solid #d3d2d2;">
                    <p style="font-size: 2rem; font-weight: bold">
                        Веб-разработчик - динамическая, постоянно меняющаяся профессия, сферой деятельности которой
                        является создание и функционирование веб-сайтов.
                    </p>
                    <p>
                        Веб-разработчики используют для создания веб-сайтов специальные программы, языки
                        программирования и разметки, которые связывают ссылки на различные веб-страницы, другие
                        веб-сайты, графические элементы, текст и фото в единый функциональный и удобный информационный
                        продукт. Компьютерные программы, заготовки и открытые электронные библиотеки используются в
                        качестве технической базы. В своей работе разработчики сайтов обязаны обращать внимание на закон
                        об авторском праве и этические вопросы.
                    </p>
                    <p>

                    </p>
                </div>
                <div class="col-md-4 d-none d-md-block">
                    <img class="img-fluid" src="{{ asset('images/3-product-sm.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
