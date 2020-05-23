@php /** @var App\Models\BlogPost $item */ @endphp

<div class="row justify-content-center pt-4" style="font-family: 'Oswald', sans-serif;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header  text-white" style="background-color: chocolate; ">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-footer border-0" >
                <div class="card-title"></div>
                <ul class="nav  nav-tabs" role="tablist" >
                    <li class="nav-item border-0">
                        <a  id="maindata-tab" href="#maindata" data-toggle="tab" class="nav-link active border-0 text-dark" role="tab" aria-controls="maindata" aria-selected="true">Основные данные</a>
                    </li>
                    <li class="nav-item" >
                        <a id="adddata-tab" href="#adddata" data-toggle="tab" class="nav-link border-0 text-dark" role="tab" aria-controls="adddata" aria-selected="true">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="name" value="{{ old('name', $item->name) }}"
                                   type="text"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea
                                style="height: 400px;"
                                name="content_raw"
                                id="content_raw"
                                class="form-control"
                                rows="3">{{ old('content_raw', $item->content_raw)}}</textarea>
                        </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Изображения</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>


                    </div>
                    <div class="tab-pane fade" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea
                                name="excerpt"
                                id="excerpt"
                                class="form-control"
                                rows="3">{{ old('excerpt', $item->excerpt)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Превью</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
