@extends('layouts.app')

@section('content')
    @php /** var @var \App\Models\BlogCategory $item */ @endphp

    @if($item->exists)
        <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('blog.admin.categories.store') }}">
    @endif
        @csrf
        <div class="container">

                {{--            {{dd(session()->get('success'))}}--}}

                @if($errors->any())
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{ $errors->first() }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{ session()->get('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-md-9">
                        @include('blog.admin.categories.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('blog.admin.categories.includes.item_edit_add_col')
                    </div>
                </div>
            </div>
        </form>
@endsection
