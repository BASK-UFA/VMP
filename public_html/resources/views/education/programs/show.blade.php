@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    <div class="container">
        @if ($program->lessons->count() === 0)
            <div class="alert alert-danger">В программе "{{ $program->name }}" нет уроков</div>

        @else
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3 class="Oswald">{{ $program->name }}</h3>
                </div>
                <div class="col-md-3 mb-3">
                    <h4 class="Oswald">Программа</h4>
                    <ul class="list-group list-group-flush">
                        @foreach($program->lessons as $lesson)
                            <li class="list-group-item ">
                                <a class="" style="color: black"
                                   href="{{ route('education.lessons.show', $lesson->id) }}">{{ $lesson->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    <h4 class="Oswald mb-3">{{ $program->lessons->first()->name }}</h4>
                    <div>{!! $program->lessons->first()->content_html !!}</div>
                </div>
            </div>
        @endif
    </div>

@endsection
