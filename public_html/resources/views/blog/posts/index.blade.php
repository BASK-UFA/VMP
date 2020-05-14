@extends('layouts.app')

@section('content')
    <div class="container">
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row">
                <div class="col-md-12">
                        <div class=" pagination justify-content-center ">
                            {{ $paginator->links() }}
                        </div>
                </div>
            </div>
        @endif

        <div class="row">
            @php /** var @var \App\Models\BlogPost $item */ @endphp

            @foreach($paginator as $item)
                <div class="col-md-12 pt-2 pb-2">
                    <div style="font-family: 'Oswald', sans-serif;">
                        <div>
                            <a style="font-size: 1.2rem"
                               href="{{ route('user.show', ['id' => $item->user->id]) }}">{{ $item->user->name }}</a>
                            <div>
                                {{ $item->created_at }}
                            </div>
                        </div>
                        <a href="{{ route('posts.show', ['id' => $item->id]) }}" style="font-size:2em;"
                           class=" pt-2">{{ $item->title }}</a>
                    </div>

                    <div>
                        <img class="d-flex justify-content-center h-25 w-50" src="{{ asset($item->image) }}" alt="">
                        <div style="font-family: 'Oswald', sans-serif; font-size:1.5em">
                            {{ $item->excerpt }}
                        </div>
                        <div>
                            <a class="btn btn-dark text-white" href="{{ route('posts.show', ['id' => $item->id]) }}">Читать
                                полностью</a>
                        </div>
                    </div>
                </div>
                <hr class="w-100">
            @endforeach
        </div>

        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
