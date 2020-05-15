@extends('layouts.app')

@section('content')
    @php /** PHPDOC @var \Illuminate\Pagination\LengthAwarePaginator $data */ @endphp

    {{--  Верстайте тут, в $data будет пагинатор модели Product                                          --}}
    {{--  Для обращения к полю используйте конструкцию в цикле с foreach {{ $product->НАЗВАНИЕ-ПОЛЯ }}   --}}
    {{--  Ниже вывод содержимого пагинатора в виде массива                                               --}}
    <div class="and-content">
        <div class="and-one">
            <div class="and-blok1">
                <h2 class="and-h2"><a href="">HOME</a></h2>
                <h2 class="and-h22">PROJECTS</h2>
            </div>
            <div class="and-blok2">
                <h3 class="and-h3">PORTFOLIO</h3>
                <div class="and-blokflex">
                    <div class="and-blok22">
                        <p class="and-p1">OUR LATEST</p>
                        <p class="and-p1">PROJECTS</p>
                    </div>
                    <div class="and-blok21">
                        <p class="and-p2">Our team of 1,200 employees hails from every craft and expertise in the field, allowing us to combine innovative construction methods and accountable project management to get the job done, and to get it done right. To do this, we work closely with architects, engineers, subcontractors, and clients at every stage of the process.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="and-two">
            <img src="img/gallery-1.jpg" alt="">
            <img src="img/gallery-2.jpg" alt="">
            <img src="img/gallery-3.jpg" alt="">
            <img src="img/gallery-4.jpg" alt="">
            <img src="img/gallery-5.jpg" alt="">
            <img src="img/gallery-6.jpg" alt="">
            <img src="img/gallery-7.jpg" alt="">
            <img src="img/gallery-8.jpg" alt="">
            <img src="img/gallery-9.jpg" alt="">
        </div>
        <div class="and-free">
            <h3 class="and-h3">LET’S GET IN TOUCH</h3>
            <p class="and-p1">CONTACT DETAILS</p>
            <div class="and-blok3">
                <div class="and-blok31">
                    <p>Phone: (555)123-4567</p>
                    <p>E-mail: info@demolink.org</p>
                    <p>Address: Alexandria, 32 Washingtorn str, 22303</p>
                    <p>Opening hours:</p>
                    <p>Monday — Thursday 10:00 – 23:00</p>
                    <p>Friday — Sunday 10:00 – 19:00</p>
                </div>
                <div class="and-blok32">
                    <form action="">
                        <input type="text" placeholder="Your name">
                        <br>
                        <input type="E-mail" placeholder="Your E-mail">
                        <br>
                        <textarea name="comment" id="" cols="40" rows="3" placeholder="Your message"></textarea>
                        <br>
                        <input type="submit" value="SEND" class="and-sub">
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    @dd($data)--}}

@endsection
