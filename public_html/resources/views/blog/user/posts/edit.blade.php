@extends('layouts.app')

@section('content')
    @php /** var @var \App\Models\BlogPost $item */ @endphp

    @if($item->exists)
        <form enctype="multipart/form-data" method="POST" action="{{ route('posts.update', $item->id) }}">
            @method('PATCH')
            @else
                <form enctype="multipart/form-data" method="POST" action="{{ route('posts.store') }}">
                    @endif
                    @csrf
                    <div class="container">
                        @include('blog.user.posts.includes.result_message')

                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                @include('blog.user.posts.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.user.posts.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>
@endsection
