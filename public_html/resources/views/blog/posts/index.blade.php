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

                    <div class="" style="font-family: 'Oswald', sans-serif;">
                        <div>
                            <a class="" style="font-size:2em;"
                               href="{{ route('posts.show', ['id' => $item->id]) }}">{{ $item->user->name }}</a>
                            <span class="float-md-right d-md-inline d-block"
                                  style=";color: #000">{{ $item->created_at }}</span>
                        </div>
                        <a href="#" style="font-size:2em;" class=" pt-2">{{ $item->title }}</a>
                    </div>

                    <div>
                        <img class="d-flex justify-content-center h-25 w-50" src="{{ asset($item->image) }}" alt="">
                        <div style="font-family: 'Oswald', sans-serif; font-size:1.5em">{{ $item->excerpt }}</div>
                        <div>
                            <button class="btn text-white"
                                    style="font-size:1.2em;background-color:chocolate; ; font-family: 'Oswald', sans-serif;"
                                    href="#">Читать далее...
                            </button>
                        </div>

                    </div>
                </div>
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
