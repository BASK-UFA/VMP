@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\BlogPost $item */ @endphp

    {{--  Верстайте тут, в $item будет модель BlogPost                              --}}
    {{--  Для обращения к полю используйте конструкцию {{ $item->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод всех полей модели через дебагер                                --}}
    {{-- TODO: Исправить этот гениальный слайдер в одну картинку в что-то другое   --}}
    {{-- TODO: Сделать 'это' адаптивным для разных устройств  --}}



    <div class="carousel intro_read" data-ride="carousel">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset($item->image) }}" alt="Превью" class="d-block w-100 intro_read bg-secondary">
                <div class="carousel-caption d-md-block post_name">
                    <h2> {{ $item->title }}</h2>
                    <a href="#article_user">
                        <div class="arrow arrow-bottom" id="article_user"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="article_user">
        <div class="row">
            <div class="col-12">
                <div>
                    <span>
                        <img class="img-fluid article_avatar" src="{{ asset($item->user->avatar) }}" alt="Аватарка">
                    </span>
                    <span class="h3 post_name">
                            {{ $item->user->name }}
                        </span>
                    <div class="float-md-right text-dark h4 mt-5">
                        Создано: {{ $item->created_at }}
                    </div>
                </div>
                <div class="mt-4 "><p class="article_txt">{!! $item->content_html !!}</p></div>
            </div>
        </div>
    </div>
@endsection
