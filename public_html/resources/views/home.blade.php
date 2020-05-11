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
{{--                                                                    <div class="form-row">--}}
{{--                                                                        <div class="col-md-6 mb-3">--}}
{{--                                                                            <label for="validationCustom03">Город</label>--}}
{{--                                                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Город" required>--}}
{{--                                                                            <div class="invalid-feedback">--}}
{{--                                                                                Пожалуйста введите свой город.--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col-md-6 mb-3">--}}
{{--                                                                            <label for="validationCustom05">Адрес</label>--}}
{{--                                                                            <input type="text" class="form-control" id="validationCustom05" placeholder="Адрес" required>--}}
{{--                                                                            <div class="invalid-feedback">--}}
{{--                                                                                Пожалуйста введите свой адрес.--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}


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
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

            </div>
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
                    <div class="d-flex justify-content-center " >
                        <button type="button" class="btn btn-dark text-center btn-lg" data-toggle="modal"
                                              data-target=".bd-example-modal-xl"> Изменить
                        </button>
                    </div>

                </div>
                </div>

            <div class="col-md-9 w-100 mt-4">

                <div class=" mb-4">
                    <div class="card-header h4 text-white bg-dark " style="font-family: 'Oswald', sans-serif">
                        <span>Мои работы</span>
                        <span>| <a class="link" href="{{ route('blog.user.products.create') }}">Добавить новую работу</a></span>
                        <span>| <a class="link" href="{{ route('blog.user.products.show', ['id' => $data->id]) }}">Показать все работы</a></span>
                    </div>

                    <div>
                        <div class="card-footer pb-3" style="background-color: chocolate;">
                            <div class="card-deck">
                                <div class="card bg-dark text-white">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Oswald', sans-serif">Название карточки</h5>
                                        <hr style="background-color: #fff;">
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                                <div class="card  bg-dark text-white">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Oswald', sans-serif">Название карточки</h5>
                                        <hr style="background-color: #fff;">
                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                </div>
                                <div class="card  bg-dark text-white">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: 'Oswald', sans-serif">Название карточки</h5>
                                        <hr style="background-color: #fff;">
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mb-4">
                    <div class="card-header h4 text-white"
                         style="font-family: 'Oswald', sans-serif;background-color: chocolate;">
                        <span>Последние опубликованные статьи </span>
                        <span>| <a class="link" href="{{ route('blog.user.posts.create') }}">Создать новую статью</a></span>
                        <span>| <a class="link" href="{{ route('blog.user.posts.show', ['id' => $data->id]) }}">Показать все статьи</a></span>
                    </div>

                    <div>
                        <div class="card-footer text-white pb-3 bg-dark" style="">

                            @foreach($data->lastPosts() as $post)
                                <div class=" mb-4">
                                    <h4 class="pl-3"
                                        style="font-family: 'Oswald',sans-serif;;">{{ $post->title }}</h4>
                                    <span class="pl-3">Автор: {{$data->name}}</span>
                                   <span class=" pl-3 float-md-right d-md-inline d-block">Создано: {{$post->created_at}}</span>
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
