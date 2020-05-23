@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    {{--  Верстайте тут, в $data будет пагинатор модели Product                                          --}}
    {{--  Для обращения к полю используйте конструкцию в цикле с foreach {{ $product->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод содержимого пагинатора в виде массива                                               --}}

    <div class="container pt-4">
        <div class="row">
            <div>
                <div class="col-md-9 m-auto pt-5 pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="pt-5 col-md-4">
                                <h5>PORTFOLIO</h5>
                                <h1 class="Oswald work-text">
                                    <div>OUR LATEST</div>
                                    <div>PROJECTS</div>
                                </h1>
                            </div>
                            <div class="col-md-8 pt-5 pl-4 ">
                                <p>
                                    Our team of 1,200 employees hails from every craft and expertise in the field,
                                    allowing us to combine innovative construction methods and accountable project
                                    management to get the job done, and to get it done right.
                                    To do this, we work closely with architects, engineers,
                                    subcontractors, and clients at every stage of the process.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                @foreach($data as $product)
                    <div class="col-md-4">
                        <a href="{{route('products.show', ['id' =>$product->id])}}"
                           class="p-2 text-decoration-none text-dark">
                            <div class="skill_block h-90 mb-5">
                                <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
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
    {{--        @dd($data)--}}

@endsection
