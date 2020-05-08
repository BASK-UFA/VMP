@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 pb-4 pb-md-0">
            <div class="card">
{{--                <div class="card-header">Личная информация</div>--}}

                <div class="card-body">
                    <img class="img-fluid" src="{{ asset('images/avatar.png') }}" alt="">
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button class="btn btn-primary">Поменять картинку</button>
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
                    <div class="h2">{{ Auth::user()->name }}</div>
                    <div class="h5">Тут доп. информация</div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Мои работы</div>

                <div class="card-body">
                    <div class="h2">Тут будет список работ</div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Мои статьи</div>

                <div class="card-body">
                    <div class="h2">Тут будет краткий список статей</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
