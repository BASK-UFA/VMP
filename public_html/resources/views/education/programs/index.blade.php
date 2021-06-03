@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="container">
                    <div class="row">
                        <div class="pt-5 col-md-12 text-center">
                            <h1 class="work-text Oswald">
                                <div>УЧЕБНЫЕ ПРОГРАММЫ</div>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-deck w-100">
                @foreach($data as $product)
                    <div class="col-md-4 position-relative">
                        <a href="{{route('education.programs.show', $product->id)}}"
                           class="p-2 text-decoration-none text-dark">
                            <div class="skill_block h-90 mb-5 text-center">
                                <img style="height: 165px; width: auto" class="card-img-top img-fluid"
                                     src="{{ asset($product->image) }}" alt="Card image cap">
                                <div class="card-body m-3">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->excerpt }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $product->publihed_at }}</small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($data->total() > $data->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card-body d-flex justify-content-center">{{ $data->links() }}</div>
            </div>
        </div>
    @endif
@endsection
