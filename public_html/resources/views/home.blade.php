@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

    {{--  TODO: сверстать success и errors ответы  --}}

    <!-- Модальное окно с изменениями страницы пользователя -->
    @can('update', $data)
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form enctype="multipart/form-data" method="POST"
                          action="{{ route('user.update', ['id' => $data->id]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Изменение личной информации</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-2">
                                <h5 class="card-header">Загрузка фото</h5>
                                <div class="card-body">
                                    <input name="avatar" class="input form-control-file" type="file">
                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-header">Личные данные</h5>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="validationCustom01">Имя</label>
                                                <input type="text" class="form-control" id="validationCustom01"
                                                       placeholder="Имя" name="name"
                                                       value="{{ old('name', $data->name) }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom02">Дополнительная информация</label>
                                                <textarea class="form-control" name="description"
                                                          id="validationCustom02" cols="30"
                                                          rows="10">{{ old('description', $data->description)  }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    {{-- TODO: Вынести стили в scss --}}

    <div class="container">
        @include('blog.includes.result_message')

        <div class="row">

            {{-- Личная информация пользователя --}}
            <div class="col-md-3">
                <div class="pb-4 pb-md-0">
                    <img class="img-fluid home_avatar" src="{{ asset($data->avatar) }}" alt="">
                    <div class="mt-4 Oswald">
                        <div>
                            <span class="h4 h_profile">Профиль</span>
                            <span class="float-right"></span>
                        </div>

                        <div>
                            <div class="h2">{{ $data->name }}</div>
                            <div class="h5">{!! $data->description !!}</div>
                        </div>
                    </div>

                    {{-- Если пользователь может обновить профиль --}}
                    @can('update', $data)
                        <div class="">
                            <button type="button" class="btn btn-dark text-center btn-lg" data-toggle="modal"
                                    data-target=".bd-example-modal-xl">Редактировать
                            </button>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="col-md-9 w-100">

                {{-- Работы пользователя --}}
                <div class="mb-5">
                    <div class="card-header h4 text-white bg-dark Oswald pb-4">
                        <span class="mb-1">Мои работы</span>
                        <div class="float-md-right">
                            @can('update', $data)
                                <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                                   href="{{ route('products.create') }}">Добавить новую работу</a>
                            @endcan
                            <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                               href="{{ route('products.show', ['id' => $data->id]) }}">Показать все
                                работы</a>
                        </div>
                    </div>

                    <div class="card-body pb-3 pl-md-0 pr-md-0">
                        <div class="card-deck products">

                            @foreach($data->lastProducts() as $product)
                                @php /** PHPDOC @var \App\Models\Product $product */ @endphp
                                <div class="card">
                                    <div class="card-top"><img class="card-image" alt=""
                                                               src="{{ asset($product->image) }}"/></div>
                                    <div class="card-mid">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                        <label class="card-desc">{{ $product->excerpt }}</label>
                                        <div class="card-blur-zone"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Статьи пользователя --}}
                <div class="mb-5">
                    <div class="card-header h4 text-white pb-4 Oswald bg-dark">
                        <span class="mb-1">Мои статьи</span>
                        <div class="float-md-right">
                            @can('update', $data)
                                <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                                   href="{{ route('posts.create') }}">Добавить новую статю</a>
                            @endcan
                            {{--                            <a class="mt-2 mt-md-0 btn btn-secondary text-white"--}}
                            {{--                               href="{{ route('blog.user.posts.show', ['id' => $data->id]) }}">Показать все статьи</a>--}}
                            <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                               href="{{ route('posts.search', ['name' => $data->name]) }}">Показать все статьи</a>
                        </div>
                    </div>
                    <div>
                        <div class="card-footer pb-3 posts">
                            @foreach($data->lastPosts() as $post)
                                <div class="posts__item__header" style="font-family: 'Oswald', sans-serif;">
                                    <div>
                                        <a style="font-size: 1.2rem"
                                           href="{{ route('user.show', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
                                        <div>
                                            {{ $post->created_at }}
                                        </div>
                                    </div>
                                    <a href="{{ route('posts.show', ['id' => $post->id]) }}" style="font-size:2em;"
                                       class="pt-2">{{ $post->title }}</a>
                                </div>
                                <div class="posts__item__content">
                                    <img class="d-flex justify-content-center h-25 w-50" src="{{ asset($post->image) }}"
                                         alt="">
                                    <div style="font-family: 'Oswald', sans-serif; font-size:1.5em">
                                        {{ $post->excerpt }}
                                    </div>
                                    <div class="mb-3">
                                        <a class="btn btn-dark text-white"
                                           href="{{ route('posts.show', ['id' => $post->id]) }}">Читать
                                            полностью</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer border-top-0 d-flex justify-content-center">
                            <a href="#" class="btn btn-dark">Показать все статьи</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
