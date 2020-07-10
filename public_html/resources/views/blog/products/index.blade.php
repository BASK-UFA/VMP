@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    <div class="container pt-4">
        <div class="row">
            {{-- Описание страницы "наши работы" если маршрут - products.index --}}
            @if (Request::path() == 'products')
                <div class="col-md-9 m-auto pt-5 pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="pt-5 col-md-12">
                                <h5>ПОРТФОЛИО</h5>
                                <h1 class="Oswald work-text">
                                    <div>НАШИ ПОСЛЕДНИЕ</div>
                                    <div>ПРОЕКТЫ</div>
                                </h1>
                            </div>
                            {{--                                <div class="col-md-7 pt-5 pl-4">--}}
                            {{--                                    <p>--}}
                            {{--                                       тут что-то будет--}}
                            {{--                                    </p>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                </div>
            @endif

            <div class="card-deck">
                @foreach($data as $product)
                    <div class="col-md-4 position-relative">
                        @can('update', $product)
                            <div id="change"
                                 style="top: 0; z-index: 2;"
                                 class="text-right pen position-absolute bg-primary m-1 shadow p-2 br-50">
                                <a class="text-white"
                                   href="{{ route('products.edit', ['id' => $product->id]) }}">
                                    <svg class="bi bi-pencil-square " width="2em"
                                         height="2em" viewBox="0 0 16 16" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </div>
                        @endcan
                        <a href="{{route('products.show', ['id' =>$product->id])}}"
                           class="p-2 text-decoration-none text-dark">
                            <div class="skill_block h-90 mb-5">
                                <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
                                <div class="card-body m-3">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->excerpt }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $product->publihed_at }}</small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($data->total() > $data->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card-body d-flex justify-content-center">{{ $data->links() }}</div>
            </div>
        </div>
    @endif
@endsection
