@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h3 class="Oswald">{{ $lesson->program->name }}</h3>
            </div>
            <div class="col-md-3 mb-3">
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
            <div class="col-md-9">
                <h4 class="Oswald mb-3">{{ $lesson->name }}</h4>
                <div>{!! $lesson->content_html !!}</div>
            </div>
        </div>
    </div>

@endsection
