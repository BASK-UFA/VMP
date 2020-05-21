@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    {{--  Верстайте тут, в $data будет пагинатор модели Product                                          --}}
    {{--  Для обращения к полю используйте конструкцию в цикле с foreach {{ $product->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод содержимого пагинатора в виде массива                                               --}}

    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-12 ">--}}
    {{--                <div class="Oswald  d-md-inline d-block pl-m-5 h4">--}}
    {{--                    <h2 class="float-md-right">PROJECTS</h2>--}}
    {{--                    <h2 class="float-md-right "><a href="">HOME</a>/</h2>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-8 ">--}}

    {{--                    <div class="pt-5 col-md-4">--}}
    {{--                        <h5>PORTFOLIO</h5>--}}
    {{--                        <h1 class="Oswald work-text">--}}
    {{--                            <div>OUR LATEST</div>--}}
    {{--                            <div>PROJECTS</div>--}}
    {{--                        </h1>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        <p>Our team of 1,200 employees hails from every craft and expertise in the field, allowing us to--}}
    {{--                            combine innovative construction methods and accountable project management to get the job--}}
    {{--                            done, and to get it done right. To do this, we work closely with architects, engineers,--}}
    {{--                            subcontractors, and clients at every stage of the process. </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <div class="container">

        <div class="row">
            <div class="Oswald   col-md-12 h4 text-right">
                <h2 class="float-md-right">PROJECTS</h2>
                <h2 class="float-md-right"><a href="">HOME</a>/</h2>
            </div>
            <div class="col-md-9 m-auto pt-5">
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
                            <p>Our team of 1,200 employees hails from every craft and expertise in the field, allowing
                                us to
                                combine innovative construction methods and accountable project management to get the
                                job
                                done, and to get it done right. To do this, we work closely with architects, engineers,
                                subcontractors, and clients at every stage of the process. </p>
                        </div>

                    </div>


                </div>
            </div>

            <div>
                <div class="col-sm">
                    <img src="{{asset('images/avatar.png')}}" alt="">
                </div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
            </div>
            <div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
            </div>
            <div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
                <div class="col-sm">
                    Одна из трёх колонок
                </div>
            </div>
            <div class="col-md-9 m-auto pt-5">
                <div class="container">
                    <div class="row">
                        <div class="pt-5 col-md-12">
                            <h5>LET’S GET IN TOUCH</h5>
                            <h1 class="Oswald work-text">
                                <div>CONTACT DETAILS</div>

                            </h1>
                        </div>
                        <div class="col pt-5 pl-4 ">
                            <p>Our team of 1,200 employees hails from every craft and expertise in the field, allowing
                                us to
                                combine innovative construction methods and accountable project management to get the
                                job
                                done, and to get it done right. To do this, we work closely with architects, engineers,
                                subcontractors, and clients at every stage of the process. </p>
                        </div>
                        <div class="col pt-5 pl-4 ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Ваше имя"
                                       aria-label="Имя пользователя" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Ваш E-mail"
                                       aria-label="Имя получателя" aria-describedby="basic-addon2">
                            </div>
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Ваше сообщение" aria-label="With textarea"></textarea>
                                </div>
                            </div>

                        </div>
                    <div class="col-md-12 ">
                        <button type="button" class="btn btn-outline-warning m-auto">Предупреждение</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
            @dd($data)

@endsection
