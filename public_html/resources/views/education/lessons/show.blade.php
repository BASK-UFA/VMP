@extends('layouts.app')

@section('content')
    <style>
        .lesson-container {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 25px;
            height: 0;
        }

        .lesson-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h3 class="Oswald">{{ $lesson->program->name }}</h3>
            </div>
            <div class="col-md-4 mb-3">
                <h4 class="Oswald">Программа</h4>
                <ul class="list-group list-group-flush">
                    @foreach($lesson->program->lessons as $less)
                        <li class="list-group-item ">
                            <a class="" style="color: black"
                               href="{{ route('education.lessons.show', $less->id) }}">{{ $less->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <h4 class="Oswald mb-3">{{ $lesson->name }}</h4>
                <div class="lesson-container">{!! $lesson->content_html !!}</div>
            </div>
        </div>
    </div>

@endsection
