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

                        <div class="card-header"style="background-color: chocolate;font-family: 'Oswald', sans-serif;">
                            <div>
                                <a class="text-white" href="#">{{ $item->user->name }}</a>
                                <span class="float-md-right d-md-inline d-block" style="color: #000">{{ $item->created_at }}</span>
                            </div>
                            <h3 class="pt-2">{{ $item->title }}</h3>
                        </div>

                        <div class="card-footer text-white" style="background-color: chocolate;">
                            <img style="width: 1000px;height: 550px;" class="d-flex justify-content-center" src="{{asset('images/books.jpg')}}" alt="">
                            <div>{{ $item->excerpt }}</div>
                            <div>
                                <a class="text-white" href="#">Читать далее...</a>
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
