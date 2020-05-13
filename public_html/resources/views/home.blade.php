@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

    {{--  TODO: сверстать success и errors ответы  --}}

    <!-- Modal -->
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
                            <div class="card-header"><h3>Загрузка фото</h3></div>

                            <div class="card-body">
                                <input name="avatar" class="input form-control-file" type="file">

                            </div>

                        </div>
                        <div class="card">
                            <h5 class="card-header">Личные данные</h5>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Имя </label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                               placeholder="Имя" name="name" value="{{ $data->name }}">
                                        <div class="valid-feedback">
                                            Looks good!
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

    <div class="container">

        @include('blog.includes.result_message')

        <div class="row">
            <div class="col-md-3  ">
                <div class="pb-4 pb-md-0  ">

                    <img class="img-fluid" style="border-radius:50%;" src="{{ asset($data->avatar) }}" alt="">

                    <div class=" mt-4" style="font-family: 'Oswald', sans-serif;">
                        <div>
                            <span style="line-height: 37px;" class="h4">Профиль</span>
                            <span class="float-right"></span>
                        </div>

                        <div>
                            <div class="h2">{{ $data->name }}</div>
                            <div class="h5">Тут доп. информация</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <button type="button" class="btn btn-dark text-center btn-lg" data-toggle="modal"
                                data-target=".bd-example-modal-xl"> Изменить
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-md-9 w-100 mt-4">

                <div class="mb-5">
                    <div class="card-header h4 text-white bg-dark  "
                         style="font-family: 'Oswald', sans-serif; padding-bottom:1.75rem;">
                        <span class="mb-1">Мои работы</span>
                        <div class="float-md-right">
                            <a class="mt-2 mt-md-0 btn btn-primary text-white"
                               href="{{ route('blog.user.products.create') }}">Добавить новую работу</a>
                            <a class="mt-2 mt-md-0 btn btn-primary text-white"
                               href="{{ route('blog.user.products.show', ['id' => $data->id]) }}">Показать все работы</a>
                        </div>
                    </div>
                    <div>
                            <div class="card-footer pb-3" style="background-color: chocolate;">
                            <div class="card-deck">
                                @foreach($data->lastProducts() as $product)
                                <div class="card bg-dark text-white">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Oswald', sans-serif">{{ $product->name }}</h5>
                                        <hr style="background-color: #fff;">
                                        <p class="card-text">{{ $product->excerpt }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" mb-4">
                    <div class="card-header h4 text-white pb-4"
                         style="font-family: 'Oswald', sans-serif;background-color: chocolate;">
                        <span>Последние опубликованные статьи </span>
                        <span><button class="btn float-md-right d-block mt-1 mb-1 bg-dark"><a class="link"
                                                                                              href="{{ route('blog.user.posts.create') }}">Создать новую статью</a></button></span>
                        <span class="bg-dark float-md-right mb-1" style="width: 15px; opacity: 0">b</span>
                        <span><button class="btn float-md-right d-block mb-1 mt-1 bg-dark"><a class="link"
                                                                                              href="{{ route('blog.user.posts.show', ['id' => $data->id]) }}">Показать все статьи</a></button></span>
                    </div>

                    <div>
                        <div class="card-footer text-white pb-3 bg-dark" style="">

                            @foreach($data->lastPosts() as $post)
                                <div class=" mb-4">
                                    <h4 class="pl-3"
                                        style="font-family: 'Oswald',sans-serif;">
                                        <a class="link" href="{{ route('posts.show', $id = $post->id) }}">
                                            {{ $post->title }}
                                        </a>

                                    </h4>
                                    <div>
                                        <span class="pl-3">Автор: {{$data->name}}</span>
                                        <span
                                            class=" pl-3 float-md-right d-md-inline d-block">Создано: {{$post->created_at}}</span>
                                    </div>
                                    <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                                    <p class="pl-3">{{$post->excerpt}}</p>
                                    <hr style="background-color:#fff;">

                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
