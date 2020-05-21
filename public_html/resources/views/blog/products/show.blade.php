@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \App\Models\Product $item */ @endphp

    {{--  Верстайте тут, в $item будет модель Product                               --}}
    {{--  Для обращения к полю используйте конструкцию {{ $item->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод всех полей модели через дебагер                                --}}
    @dd($item->getAttributes())

@endsection
