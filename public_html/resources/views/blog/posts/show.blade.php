@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\BlogPost $item */ @endphp

    {{-- TODO: Исправить этот гениальный слайдер в одну картинку в что-то другое   --}}
    {{-- TODO: Сделать 'это' адаптивным для разных устройств                       --}}
    <div class="carousel intro_read" data-ride="carousel">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="Превью" src="{{ asset($item->image) }}" class="d-block w-100  intro_read bg-secondary">
                <div class="carousel-caption  d-md-block arrow-7">
                    <h1 class="post_name"> {{ $item->title }}</h1>
                    <a id="link" href="#link">
                        <div class="arrow arrow-bottom"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <span id="article_user">
                        <img class="img-fluid article_avatar" src="{{ asset($item->user->avatar) }}" alt="">
                    </span>
                    <span class="h3 post_name">{{ $item->user->name }}</span>
                    <span class="float-md-right">Создано: {{ $item->created_at }}</span>
                </div>
                <div class="mt-4 "><p class="article_txt">{!! $item->content_html !!}</p></div>
            </div>
        </div>
    </div>
@endsection
