@extends('layouts.app')

@section('content')
    <style>
        .web__header {
            margin-top: -6rem;
            padding: 8.3rem 0 6rem;
            margin-bottom: 2rem;
        }

        .web__header {
            font-family: 'Montserrat', sans-serif;
        }

        .web__header {
            background-color: #0e779f;
            color: #fff;
            background-image: url("../images/web__wrapper-background.svg");
        }

        .web__content {
            line-height: 1.3;
            font-size: 0.9rem;
            color: #000000;
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="SingUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Записаться на курс</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('user-course.store') }}">
                    @csrf
                    <input type="hidden" name="course_id" value="3">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="" for="user_name">Имя</label>
                            @auth
                                <input id="user_name" class="form-control" type="text" name="user_name"
                                       value="{{ old('user_name') ? old('user_name') : Auth::user()->name }}" required>
                            @else
                                <input id="user_name" class="form-control" type="text" name="user_name"
                                       value="{{ old('user_name') }}" required>
                            @endauth
                        </div>
                        <div class="form-group">
                            <label class="" for="user_phone">Телефон</label>
                            @auth
                                <input id="user_phone" class="form-control" type="text" name="user_phone"
                                       value="{{ old('user_phone') ? old('user_phone') : Auth::user()->phone }}"
                                       required>
                            @else
                                <input id="user_phone" class="form-control" type="text" name="user_phone"
                                       value="{{ old('user_phone') }}" required>
                            @endauth
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Оставить заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="web__header">
        <h1 class="text-center">Школа юного программиста</h1>
    </div>

    <div class="web__content">
        <div class="container">
            @include('blog.includes.result_message')
            <div class="row">
                <div class="col-md-8" style="border-right: 1px solid #d3d2d2;">
                    <p style="font-size: 2rem; font-weight: bold">
                        Юный программист – это очень интересный персонаж, который должен владеть не только языком
                        программирования, но и создавать алгоритмы для решения задач.
                    </p>
                    <p>
                        Основной целью является формирование базовых понятий структурного программирования,
                        объектно-ориентированного программирования, выработка навыков программирования и решения
                        практических задач на языке программирования Python.
                    </p>
                    <p>
                        <button class="btn btn-success" data-toggle="modal" data-target="#SingUpModal">Записаться на
                            курс
                        </button>
                    </p>
                </div>
                <div class="col-md-4 d-none d-md-block">
                    <img class="img-fluid" src="{{ asset('images/school.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
