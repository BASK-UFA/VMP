@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\Product $item */ @endphp

    {{--  Верстайте тут, в $item будет модель Product                               --}}
    {{--  Для обращения к полю используйте конструкцию {{ $item->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод всех полей модели через дебагер                                --}}

    <div class="product_bg col-md-12">
        <div class="col-md-9 m-auto pb-5">
            <div class="container">
                <div class="row">
                    <div class="pt-4 col-md-3">
                        <h1 class="Oswald product_excerpt text-center">
                            {{ $item->name }}
                        </h1>
                    </div>
                    <div class="col-md-9">
                        <img class="product_img d-block mx-auto rounded" src="{{asset('images/1-product-sm.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-md-3 ">
                <h4 class="Oswald">Автор:</h4>
                <h4>
                    <img class="article_avatar product_avatar shadow-lg" src="{{ asset($item->user->avatar) }}" alt="">
                    <a class="text-decoration-none"
                       href="{{ route('user.show', ['id' => $item->user->id]) }}">{{ $item->user->name}}</a>
                </h4>
            </div>
            <div class="col-md-9">
                <div class="">{!! $item->content_html !!}</div>
            </div>
        </div>
    </div>



    {{--    @dd($item->getAttributes())--}}

@endsection
