@extends('layouts.app')

@section('content')
    <div class="container home">

        @include('blog.includes.result_message')

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
            @php /** var @var \Illuminate\Pagination\LengthAwarePaginator $paginator */ @endphp
            @php /** var @var \App\Models\BlogPost $item */ @endphp

            <div class="col-md-9">
                @foreach($paginator as $item)
                    <div style="font-family: 'Oswald', sans-serif;">
                        <div>
                            <a style="font-size: 1.2rem"
                               href="{{ route('user.show', ['id' => $item->user->id]) }}">{{ $item->user->name }}</a>
                            <div>
                                {{ $item->created_at }}
                            </div>
                        </div>
                        <a href="{{ route('posts.show', ['id' => $item->id]) }}" style="font-size:2em;"
                           class="pt-2">{{ $item->title }}</a>
                    </div>
                    <div>
                        <img class="d-flex justify-content-center h-25 w-50" src="{{ asset($item->image) }}" alt="">
                        <div style="font-family: 'Oswald', sans-serif; font-size:1.5em">
                            {{ $item->excerpt }}
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-dark text-white" href="{{ route('posts.show', ['id' => $item->id]) }}">Читать
                                полностью</a>
                            @can('update', $item)
                                <a class="btn btn-primary" href="{{ route('posts.edit', ['id' => $item->id]) }}">Редактировать</a>
                            @endcan
                        </div>
                    </div>
                    <hr class="w-100">
                @endforeach

                @if($paginator->isEmpty())
                    <div class="text-center h3">Статей по вашему запросу не найдено :(</div>
                @endif
            </div>

            <div class="col-md-3">
                <form method="GET" action="{{ route('posts.search') }}">
                    <div class="card">
                        <h5 class="card-header">Сортировка</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="author-name" class="form-check-label">По автору: </label>
                                <input class="form-control" type="text" name="name" id="author-name">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark">Применить фильтр</button>
                        </div>
                    </div>
                </form>
            </div>

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
