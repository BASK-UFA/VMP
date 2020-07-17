@extends('layouts.app')

@section('content')
    @php /** var @var \App\Models\Product $item */ @endphp

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

    <script>
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
                                textarea.append("\n<img class='img-fluid' src='" + this.value + "' alt='Описание'>");
                            } else {
                                var height = document.getElementById('height').value;
                                var width = document.getElementById('width').value;
                                textarea.append("\n<img style='max-width: 100%' width='" + width + "' height='" + height + "' src='" + this.value + "' alt='Описание'>");
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
    </script>

    @include('blog.user.products.includes.result_message')
    @if($item->exists)
        <form enctype="multipart/form-data" method="POST" action="{{ route('products.update', $item->id) }}">
            @method('PATCH')
            @else
                <form enctype="multipart/form-data" method="POST" action="{{ route('products.store') }}">
                    @endif
                    <div class="container">


                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                @include('blog.user.products.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.user.products.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>

                @if ($item->exists)
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card p-2">

                                    <form method="POST" action="{{ route('products.destroy', $item->id) }}">
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
