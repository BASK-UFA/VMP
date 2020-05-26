@extends('layouts.app')

@section('content')
    @php /** var @var \App\Models\Product $item */ @endphp

    @if($item->exists)
        <form class="pt-5" enctype="multipart/form-data" method="POST" action="{{ route('products.update', $item->id) }}">
            @method('PATCH')
            @else
                <form class="pt-5" enctype="multipart/form-data" method="POST" action="{{ route('products.store') }}">
                    @endif
                    @csrf
                    <div class="container">
                        @include('blog.user.products.includes.result_message')

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
                    <br>
                    <form method="POST" action="{{ route('products.destroy', $item->id) }}">
                        @method('DELETE')
                        @csrf
                        <div class=" pb-1 form-group">
                            <div class="row justify-content-center">
                                <div class="col-md-12 ">
                                    <div class="text-right">
                                        <button type="submit" class=" btn-dark btn-lg">Удалить</button>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </form>
    @endif

@endsection
