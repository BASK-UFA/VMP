@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\BlogPost $item */ @endphp

    <div class="carousel intro_read" data-ride="carousel">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset($item->image) }}" alt="Превью" class="d-block w-100 intro_read bg-secondary">
                <div class="carousel-caption text-center d-md-block Oswald">
                    <div class="" style="width: max-content; margin: 0 auto">
                        <h2 class="Oswald"> {{ $item->title }}</h2>
                        <a href="#article_user">
                            <div class="arrow arrow-bottom" id="article_user"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="article_user">
        <div class="row">
            <div class="col-12">
                @can('update', $item)
                    <a class="text-white"
                       href="{{ route('posts.edit', ['id' => $item->id]) }}">
                        <button id="change_post" type="button" class="btn btn-dark text-right  position-absolute  m-3 ">
                            Редактировать
                        </button>
                    </a>
                @endcan
                <div class="">
                    <span class="">
                        <img class="img-fluid post_avatar" src="{{ asset($item->user->avatar) }}" alt="Аватарка"
                             style="width: auto !important; max-height: 65px">
                    </span>
                    <span class="h5 Oswald post_name ml-4" style="display: inline !important;">
                            <a href="{{ route('user.show', ['id' => $item->user->id]) }}">{{ $item->user->name }}</a>
                    </span>
                </div>
                <div class="mt-4"><p class="article_txt">{!! $item->content_html !!}</p></div>
            </div>
        </div>
    </div>
@endsection
