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

                <div class="row">
                    <div class="col-12 col-md-12 mb-5">
                        <div class="card">
                            <div class="card-header bg-dark text-white">Заявки на курсы</div>
                            <div class="card-body">
                                <div class="table table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th class="border-top-0">Курс</th>
                                            <th class="border-top-0">Имя</th>
                                            <th class="border-top-0">Телефон</th>
                                        </tr>
                                        @foreach($data->userCourseRequests as $request)
                                            <tr>
                                                <td>{{ $request->course_name }}</td>
                                                <td>{{ $request->user_name }}</td>
                                                <td>{{ $request->user_phone }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 mb-5">
                        <div class="card">
                            <div class="card-header bg-dark text-white">Мои курсы</div>
                            <div class="card-body">test</div>
                        </div>
                    </div>
                </div>

                {{-- Заявки на курсы --}}
            </div>
        </div>
    </div>
@endsection
