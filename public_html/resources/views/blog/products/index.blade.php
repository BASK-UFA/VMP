@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    {{--  Верстайте тут, в $data будет пагинатор модели Product                                          --}}
    {{--  Для обращения к полю используйте конструкцию в цикле с foreach {{ $product->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод содержимого пагинатора в виде массива                                               --}}
    @dd($data)

@endsection
