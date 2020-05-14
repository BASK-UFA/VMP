@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\BlogPost $item */ @endphp

    {{--  Верстайте тут, в $item будет модель BlogPost                              --}}
    {{--  Для обращения к полю используйте конструкцию {{ $item->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод всех полей модели через дебагер                                --}}



    <div class="carousel intro_read" data-ride="carousel">
        <ol class="carousel-indicators">

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset($item->image)}}" class="d-block w-100  intro_read bg-secondary">
                <div class="carousel-caption  d-md-block">
                    <h5> {{ $item->title }}</h5>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-12">

                <div>
                    <span>{{$item->user->name}}</span>
                    <span class="float-md-right">Создано: {{$item->created_at}}</span>
                </div>

                <div class="mt-4">
                    <div class="article_txt">
                        {!! $item->content_html !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
