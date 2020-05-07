@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @php /** var @var \App\Models\BlogPost $item */ @endphp

            @foreach($items as $item)
                <div class="col-md-12 p-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $item->title }}</h4>
                            <div style="color: #979896">{{ $item->created_at }}</div>
                        </div>
                        <div class="card-body">
                            <div>{{ $item->excerpt }}</div>
                            <div>
                                <a href="#">Читать далее...</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
