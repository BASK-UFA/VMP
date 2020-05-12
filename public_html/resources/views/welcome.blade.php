<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

    <section class="intro">
        <div class="fluid-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_img"></div>
                </div>
            </div>
        </div>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-4">
                    <h3 class="about_title text-left">О нас</h3>
                    <h2 class="about_text text-left">Мы создаем будущее</h2>
                    <div class="about_line bg-warning">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="about_us">
                        Следует отметить, что постоянный количественный рост и сфера нашей активности способствует подготовке и реализации соответствующих условий активизации.
                    </p>
                    <p class="about_team">
                        В рамках спецификации современных стандартов, многие известные личности, превозмогая сложившуюся непростую экономическую ситуацию, рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок. В частности, курс на социально-ориентированный национальный проект предоставляет широкие возможности для анализа существующих паттернов поведения. И нет сомнений, что предприниматели в сети интернет, превозмогая сложившуюся непростую экономическую ситуацию, объединены в целые кластеры себе подобных.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="cats">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8">
                    <h3 class="cats_title mt-5 text-center">
                        Категории
                    </h3>
                    <h2 class="cats_text text-center">Наших статей</h2>
                    <div class="container">
                        <div class="card-deck mb-3 mt-5 text-center">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Дизайн</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title text-muted">Картинка</h1>
                                    <button type="button" class="btn btn-lg btn-block btn-outline-warning">Посмотреть</button>
                                </div>
                            </div>
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Дизайн</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title text-muted">Картинка</h1>
                                    <button type="button" class="btn btn-lg btn-block btn-outline-warning">Посмотреть</button>
                                </div>
                            </div>
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">IT</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title text-muted">Картинка</h1>
                                    <button type="button" class="btn btn-lg btn-block btn-outline-warning">Посмотреть</button>
                                </div>
                            </div>
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Архитектура</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title text-muted">Картинка</h1>
                                    <button type="button" class="btn btn-lg btn-block btn-outline-warning">Посмотреть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-2 pb-2">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a class="text-warning" href="#">Пользователь</a>
                                <span class="float-md-right d-md-inline d-block" style="color: #979896">19:30 11.05.20</span>
                            </div>
                            <h3 class="pt-2">Название статьи</h3>
                        </div>
                        <div class="card-body" style="color: #111">
                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam eius unde sapiente praesentium impedit laudantium dolore nulla rerum consequatur optio, ab maiores totam modi possimus dolor quo quis laboriosam! Sequi laboriosam repellat dignissimos delectus laudantium ullam repudiandae voluptatibus velit accusantium tempore, at voluptatum sint id libero! Sit consectetur, incidunt autem?</div>
                            <div>
                                <a class="text-success" href="#">Читать далее...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-2 pb-2">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a class="text-warning" href="#">Пользователь</a>
                                <span class="float-md-right d-md-inline d-block" style="color: #979896">19:30 11.05.20</span>
                            </div>
                            <h3 class="pt-2">Название статьи</h3>
                        </div>
                        <div class="card-body" style="color: #111">
                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam eius unde sapiente praesentium impedit laudantium dolore nulla rerum consequatur optio, ab maiores totam modi possimus dolor quo quis laboriosam! Sequi laboriosam repellat dignissimos delectus laudantium ullam repudiandae voluptatibus velit accusantium tempore, at voluptatum sint id libero! Sit consectetur, incidunt autem?</div>
                            <div>
                                <a class="text-success" href="#">Читать далее...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-2 pb-2">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a class="text-warning" href="#">Пользователь</a>
                                <span class="float-md-right d-md-inline d-block" style="color: #979896">19:30 11.05.20</span>
                            </div>
                            <h3 class="pt-2">Название статьи</h3>
                        </div>
                        <div class="card-body" style="color: #111">
                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam eius unde sapiente praesentium impedit laudantium dolore nulla rerum consequatur optio, ab maiores totam modi possimus dolor quo quis laboriosam! Sequi laboriosam repellat dignissimos delectus laudantium ullam repudiandae voluptatibus velit accusantium tempore, at voluptatum sint id libero! Sit consectetur, incidunt autem?</div>
                            <div>
                                <a class="text-success" href="#">Читать далее...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-2 pb-2">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a class="text-warning" href="#">Пользователь</a>
                                <span class="float-md-right d-md-inline d-block" style="color: #979896">19:30 11.05.20</span>
                            </div>
                            <h3 class="pt-2">Название статьи</h3>
                        </div>
                        <div class="card-body" style="color: #111">
                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam eius unde sapiente praesentium impedit laudantium dolore nulla rerum consequatur optio, ab maiores totam modi possimus dolor quo quis laboriosam! Sequi laboriosam repellat dignissimos delectus laudantium ullam repudiandae voluptatibus velit accusantium tempore, at voluptatum sint id libero! Sit consectetur, incidunt autem?</div>
                            <div>
                                <a class="text-success" href="#">Читать далее...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
