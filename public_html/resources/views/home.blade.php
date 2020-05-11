@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" method="POST" action="{{ route('user.update', ['id' => $data->id]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Загрузить фото</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="avatar" class="input form-control-file" type="file">
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
            <div class="col-md-3 pb-4 pb-md-0">
                <div class="card">
                    {{--                <div class="card-header">Личная информация</div>--}}

                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset($data->avatar) }}" alt="">
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Поменять картинку
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <span style="line-height: 37px;" class="h4">Профиль</span>
                        <span class="float-right"><button class="btn btn-primary">Изменить</button></span>
                    </div>

                    <div class="card-body">
                        <div class="h2">{{ $data->name }}</div>
                        <div class="h5">Тут доп. информация</div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Мои работы</div>

                    <div class="card-body">
                        <div class="h2">Тут будет список работ</div>
                    </div>
                </div>

                @foreach($data->lastPosts() as $post)
                    <div class="card mb-4">
                        <div class="card-header">{{ $post->title }}</div>

                        <div class="card-body">
                            <div>
                                <div>{{$post->excerpt}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
