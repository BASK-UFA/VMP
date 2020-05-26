@extends('layouts.app')

@section('content')
    @php /** var @var \App\Models\Product $item */ @endphp

    @include('blog.user.products.includes.result_message')
    @if($item->exists)
        <form enctype="multipart/form-data" method="POST" action="{{ route('products.update', $item->id) }}">
            @method('PATCH')
            @else
                <form enctype="multipart/form-data" method="POST" action="{{ route('products.store') }}">
                    @endif
                    <div class="container">


                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                @include('blog.user.products.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.user.products.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>

                @if ($item->exists)
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card p-2">

                                    <form method="POST" action="{{ route('products.destroy', $item->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 ">
                                                <div class="text-right">
                                                    <button type="submit" class=" btn-dark btn-lg">Удалить</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </form>

                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
    @endif

@endsection
