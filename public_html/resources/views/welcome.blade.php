<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}">Мой профиль</a>
                    @else
                        <a href="{{ route('login') }}">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Зарегистрироваться</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Виртуальная мастерская программистов
                </div>

                <div class="links">
                    <a href="{{ route('blog.posts.index') }}">БЛОГ</a>
                    <a href="{{ route('blog.posts.index') }}">НАШИ РАБОТЫ</a>
                </div>
            </div>
        </div>
    </body>
</html>
