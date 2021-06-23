@extends('layouts.app')

@section('content')
    @php /** var @var \App\Models\EducationLesson $item */ @endphp

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Загрузить изображение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="load-form" method="POST" enctype="multipart/form-data" action="{{ route('image.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <section class="alert alert-danger" v-if="errored">
                                <div><b>Не удалось загрузить изображение.</b></div>
                            </section>

                            <section v-else>
                                <div class="alert alert-info" v-if="loading">Загрузка ...</div>
                                <div class="alert alert-success" v-if="message">
                                    <div class="text-break">Ваше изображение загружено в статью. Не забудьте сохранить
                                        изменения.
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="form-check">
                            <input v-bind:value="false" v-model="checked" class="form-check-input" type="radio"
                                   name="exampleRadios" id="exampleRadios1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Автоматический размер
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input v-bind:value="true" v-model="checked" class="form-check-input" type="radio"
                                   name="exampleRadios" id="exampleRadios2">
                            <label class="form-check-label" for="exampleRadios2">
                                Свой размер в px
                            </label>
                        </div>

                        <div v-if="checked" class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="width">Ширина</label>
                                <input class="col form-control" id="width" name="width" type="text" value="100"
                                       placeholder="ширина">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="height">Высота</label>
                                <input class="col form-control" id="height" name="height" type="text" value="100"
                                       placeholder="высота">
                            </div>
                        </div>

                        <div class="input-group">
                            <input id="file" name="file" type="file" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button v-on:click="upload" type="button" class="btn btn-primary">Загрузить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Загрузить видео</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="videoUploadForm" method="POST" enctype="multipart/form-data"
                      action="{{ route('image.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <section class="alert alert-danger" v-if="errored">
                                <div><b>Не удалось загрузить видео.</b></div>
                            </section>

                            <section v-else>
                                <div class="alert alert-info" v-if="loading">Загрузка ...</div>
                                <div class="alert alert-success" v-if="message">
                                    <div class="text-break">Ваше видео загружено в статью. Не забудьте сохранить
                                        изменения.
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="form-check">
                            <input v-bind:value="true" v-model="file" class="form-check-input" type="radio"
                                   name="exampleRadios" id="radioFileUpload" checked>
                            <label class="form-check-label" for="radioFileUpload">
                                Загрузить с файла
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input v-bind:value="false" v-model="file" class="form-check-input" type="radio"
                                   name="exampleRadios" id="radioFileLink">
                            <label class="form-check-label" for="radioFileLink">
                                Загрузить по ссылке
                            </label>
                        </div>

                        <div v-if="file" class="form-row mb-4">
                            <div class="form-group">
                                <input id="videoFile" name="file" type="file" class="form-control-file" required>
                            </div>
                        </div>

                        <div v-else>
                            <div class="form-group">
                                <label for="videoLink">Ссылка на видео</label>
                                <input class="col form-control" id="videoLink" name="VideoLink" type="text"
                                       placeholder="Ссылка">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button v-on:click="upload" type="button" class="btn btn-primary">Загрузить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

    <script>
        function getId(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);

            return (match && match[2].length === 11)
                ? "https://www.youtube.com/embed/" + match[2]
                : url;
        }

        let vm = new Vue({
            el: '#load-form',
            data() {
                return {
                    checked: false,
                    message: null,
                    loading: false,
                    errored: false,
                    errors: null,
                    value: null
                };
            },
            methods: {
                upload: function (event) {
                    this.errored = false;
                    this.loading = true;
                    this.message = null;
                    this.errors = null;
                    this.value = null;

                    var data = new FormData(document.getElementById("load-form"));
                    var image = document.querySelector('#file')
                    data.file = image.files[0];
                    axios
                        .post('/api/image', data, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                    'X-CSRF-TOKEN': document.querySelector("#load-form [name='_token']").value
                                }
                            }
                        )
                        .then(response => {
                            this.message = response.data.message;
                            this.value = response.data.value;
                            var textarea = document.getElementById('content_raw');
                            if (!this.checked) {
                                textarea.value += "\n<img class='img-fluid' src='" + this.value + "' alt='Описание'>";
                            } else {
                                var height = document.getElementById('height').value;
                                var width = document.getElementById('width').value;
                                textarea.value += "\n<img style='max-width: 100%' width='" + width + "' height='" + height + "' src='" + this.value + "' alt='Описание'>";
                            }
                        })
                        .catch(error => {
                            this.errors = error.response.data;
                            console.log(this.errors);
                            this.errored = true;
                        })
                        .finally(() => (this.loading = false));
                }
            }
        });

        let videoUpload = new Vue({
            el: '#videoUpload',
            data() {
                return {
                    file: true,
                    checked: false,
                    message: null,
                    loading: false,
                    errored: false,
                    errors: null,
                    value: null
                };
            },
            methods: {
                upload: function (event) {
                    this.errored = false;
                    this.loading = true;
                    this.message = null;
                    this.errors = null;
                    this.value = null;

                    var data = new FormData(document.getElementById("videoUploadForm"));
                    var image = document.querySelector('#videoFile')
                    var link = document.querySelector('#videoLink')

                    if (this.file) {
                        data.file = image.files[0];
                        axios
                            .post('/api/image', data, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data',
                                        'X-CSRF-TOKEN': document.querySelector("#videoUploadForm [name='_token']").value
                                    }
                                }
                            )
                            .then(response => {
                                this.message = response.data.message;
                                this.value = response.data.value;
                                var textarea = document.getElementById('content_raw');
                                textarea.value += "\n<video controls style='max-width: 100%' src='" + this.value + "' alt='Описание'><source height='100%' width='100%' src='" + this.value + "'></video>";
                            })
                            .catch(error => {
                                this.errors = error.response.data;
                                console.log(this.errors);
                                this.errored = true;
                            })
                            .finally(() => (this.loading = false));
                    } else {
                        var textarea = document.getElementById('content_raw');
                        let value = getId(link.value)
                        textarea.value += "\n<div class='lesson-container'><iframe src='" + value + "' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><div>";
                        this.loading = false
                    }
                }
            }
        });
    </script>

    @include('blog.user.posts.includes.result_message')
    @if($item->exists)
        <form enctype="multipart/form-data" method="POST" action="{{ route('teacher.lessons.update', $item->id) }}">
            @method('PATCH')
            @else
                <form enctype="multipart/form-data" method="POST" action="{{ route('teacher.lessons.store') }}">
                    @endif
                    <div class="container">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="row justify-content-center  home"
                                     style="font-family: 'Oswald', sans-serif;">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header text-white bg-dark Oswald h4">
                                                @if($item->exists)
                                                    Изменить урок
                                                @else
                                                    Создать новый урок
                                                @endif
                                            </div>
                                            <div class="card-footer border-0">
                                                <div class="card-title"></div>
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item border-0">
                                                        <a id="maindata-tab" href="#maindata" data-toggle="tab"
                                                           class="nav-link active border-0 text-dark h5" role="tab"
                                                           aria-controls="maindata"
                                                           aria-selected="true">Основные данные</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a id="adddata-tab" href="#adddata" data-toggle="tab"
                                                           class="nav-link border-0 text-dark h5"
                                                           role="tab" aria-controls="adddata" aria-selected="true">Доп.
                                                            данные</a>
                                                    </li>
                                                </ul>
                                                <br>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="maindata" role="tabpanel"
                                                         aria-labelledby="maindata-tab">
                                                        <div class="form-group">
                                                            <label for="category_id" class="h5">Программа</label>
                                                            <select name="program_id"
                                                                    placeholder="Выберете программу"
                                                                    id="category_id"
                                                                    class="form-control"
                                                                    required>
                                                                @foreach($programs as $program)
                                                                    <option value="{{ $program->id }}"
                                                                            @if($program->id == $item->product_id) selected @endif>
                                                                        {{ $program->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title" class="h5">Заголовок</label>
                                                            <input name="name" value="{{ old('name', $item->name) }}"
                                                                   type="text"
                                                                   id="title"
                                                                   class="form-control"
                                                                   minlength="3"
                                                                   autocomplete="off"
                                                                   required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="content_raw" class="h5">Содержание урока</label>
                                                            {{--                                                            <div>--}}
                                                            {{--                                                                <button class="btn btn-outline-dark"><strong>B</strong>--}}
                                                            {{--                                                                </button>--}}
                                                            {{--                                                            </div>--}}
                                                            <textarea
                                                                style="height: 400px;"
                                                                name="content_raw"
                                                                id="content_raw"
                                                                class="form-control"
                                                                rows="3">{{ old('content_raw', $item->content_raw)}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-dark"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                Загрузить изображение
                                                            </button>

                                                            <button type="button" class="btn btn-dark"
                                                                    data-toggle="modal" data-target="#videoUpload">
                                                                Загрузить видео
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="adddata" role="tabpanel"
                                                         aria-labelledby="adddata-tab">
                                                        <div class="form-group">
                                                            <label for="excerpt" class="h5">Выдержка</label>
                                                            <textarea
                                                                name="excerpt"
                                                                id="excerpt"
                                                                class="form-control"
                                                                rows="3">{{ old('excerpt', $item->excerpt)}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1"
                                                                   class="h5">Превью</label>
                                                            <input type="file" name="image" class="form-control-file"
                                                                   id="exampleFormControlFile1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @include('blog.user.posts.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>
                @if ($item->exists)
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card p-2">

                                    <form method="POST" action="{{ route('teacher.lessons.destroy', $item->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 ">
                                                <div class="text-right">
                                                    <button type="submit" class=" btn-dark btn-lg">Удалить</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
    @endif

@endsection
