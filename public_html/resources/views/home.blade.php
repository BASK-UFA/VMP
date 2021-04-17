@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

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
    <!-- Модальное окно с черновиками -->
    <div class="modal fade" id="DraftModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ваши черновики</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($data->draftPosts as $post)
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
                            <div class="mb-3 mt-3">
                                @can('update', $post)
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }} ">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-primary">Удалить</button>


                                        <a class="btn btn-primary "
                                           href="{{ route('posts.edit', ['id' => $post->id]) }}">Редактировать</a>
                                        <hr class="bg-dark">
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="container home">
        @include('blog.includes.result_message')

        <div class="row">

            {{-- Личная информация пользователя --}}
            <div class="col-md-3">
                <div class="pb-4 pb-md-0" style="position: sticky; top: 20px">
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
                               href="{{ route('user.products', ['id' => $data->id]) }}">Показать все
                                работы</a>
                        </div>
                    </div>

                    <div class="card-footer pb-3 pl-md-0 pr-md-0">
                        @if ($data->lastProducts->isEmpty())
                            <div>
                                <p class="Oswald h3 text-center">Работ пока нет</p>
                            </div>
                        @endif
                        <div class="card-deck products">
                            @foreach($data->lastProducts as $product)
                                @php /** PHPDOC @var \App\Models\Product $product */ @endphp
                                <div class="col-md-4 p-0">
                                    <div>
                                        <div class="card m-3 work_lk position-relative">
                                            @can('update', $product)
                                                <div id="change"
                                                     style="top: 0; z-index: 100;"
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
                                            <a href="{{route('products.show', ['id' =>$product->id])}}">
                                                <div class="card-top position-relative">
                                                    <img class="card-image" alt="" src="{{ asset($product->image) }}"/>
                                                </div>
                                                <div class="card-mid">
                                                    <h4 class="card-title text-dark">{{ $product->name }}</h4>
                                                    <label class="card-desc">{{ $product->excerpt }}</label>
                                                    <div class="card-blur-zone"></div>
                                                </div>
                                            </a>

                                        </div>
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
                                   href="#" data-toggle="modal" data-target="#DraftModal">
                                    Ваши черновики
                                </a>
                                <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                                   href="{{ route('posts.create') }}">Добавить новую статю</a>
                            @endcan
                            {{--                            <a class="mt-2 mt-md-0 btn btn-secondary text-white"--}}
                            {{--                               href="{{ route('blog.user.posts.show', ['id' => $data->id]) }}">Показать все статьи</a>--}}
                            <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                               href="{{ route('user.posts', ['user' => $data->id]) }}">Показать все статьи</a>
                        </div>
                    </div>
                    <div>
                        <div class="card-footer pb-3 posts">
                            @if ($data->lastPosts->isEmpty())
                                <p class="Oswald h3 text-center">Статей пока нет</p>
                            @endif
                            @foreach($data->lastPosts as $post)

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
                                    <div class="mb-3 mt-3">
                                        <a class="btn btn-dark text-white mt-2"
                                           href="{{ route('posts.show', ['id' => $post->id]) }}">Читать
                                            полностью</a>
                                        @can('update', $post)
                                            <a class="btn btn-primary mt-2"
                                               href="{{ route('posts.edit', ['id' => $post->id]) }}">Редактировать</a>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($data->lastPosts->count()>=5)
                            <div class="card-footer border-top-0 d-flex justify-content-center">
                                <a href="{{ route('user.posts', ['user' => $data->id]) }}" class="btn btn-dark">Показать
                                    все
                                    статьи</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
