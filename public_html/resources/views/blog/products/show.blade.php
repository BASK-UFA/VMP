@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\Product $item */ @endphp

    <div class="product_bg col-md-12" style="margin-top: -1.6rem; padding-top: 4rem">
        <div class="col-md-9 m-auto pb-5">
            <div class="container pt-md-5">
                <div class="row">
                    <div class="pt-5 col-md-6">
                        <h1 class="Oswald product_excerpt text-center">
                            {{ $item->name }}
                        </h1>
                    </div>
                    <div class="col-md-6">
                        <img style="max-height: 300px; border-radius: 1.5rem;" class="img-fluid d-block mx-auto"
                             src="{{ asset($item->image) }}" alt="">
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
@endsection
