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

                <h1 class="mb-5">Кабинет учителя</h1>

                <div class="mb-5">
                    <div class="text-center">
                        <img style="width: 175px" class="img-fluid mb-3" src="{{ asset($item->image) }}" alt="">
                        <div class="h2 text-center mb-3 p-0 m-0">{{ $item->name }}</div>
                        <div>
                            <a href="{{ route('teacher.programs.edit', $item->id) }}" class="btn btn-primary">Изменить
                                программу</a>
                            <form method="POST" class="d-inline"
                                  action="{{ route('teacher.programs.destroy', $item->id) }}">
                                <button type="submit" class="btn btn-danger">Удалить программу</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <span>Уроки</span>
                        <div class="float-md-right">
                            <a class="mt-2 mt-md-0 btn btn-secondary text-white"
                               href="{{ route('teacher.lessons.create', ['program' => $item->id]) }}">
                                Добавить новый урок
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($item->lessons as $lesson)
                            <div class="posts__item__header" style="font-family: 'Oswald', sans-serif;">
                                <div>
                                    <a style="font-size: 1.2rem"
                                       href="{{ route('teacher.lessons.show', $lesson->id) }}">{{ $lesson->name }}</a>
                                    <div>
                                        {{ $lesson->created_at }}
                                    </div>
                                </div>
                                <a href="{{ route('teacher.lessons.show', $lesson->id) }}" style="font-size:2em;"
                                   class="pt-2">{{ $lesson->name }}</a>
                            </div>
                            <div class="posts__item__content">
                                <img class="d-flex justify-content-center h-25 w-50" src="{{ asset($lesson->image) }}"
                                     alt="">
                                <div style="font-family: 'Oswald', sans-serif; font-size:1.5em">
                                    {{ $lesson->excerpt }}
                                </div>
                                <div class="mb-3 mt-3">
                                    <a class="btn btn-dark text-white mt-2"
                                       href="{{ route('teacher.lessons.show', $lesson->id) }}">Читать
                                        полностью</a>
                                    <a class="btn btn-primary mt-2"
                                       href="{{ route('teacher.lessons.edit', $lesson->id) }}">Редактировать</a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
