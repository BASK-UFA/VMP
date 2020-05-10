@php /** @var App\Models\BlogPost $item */ @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="maindata-tab" href="#maindata" data-toggle="tab" class="nav-link active" role="tab" aria-controls="maindata" aria-selected="true">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a id="adddata-tab" href="#adddata" data-toggle="tab" class="nav-link" role="tab" aria-controls="adddata" aria-selected="true">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ old('title', $item->title) }}"
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
                    </div>
                    <div class="tab-pane fade" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ old('slug', $item->slug) }}"
                                   type="text"
                                   id="slug"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Родитель</label>
                            <select name="category_id"
                                    placeholder="Выберете категорию"
                                    id="category_id"
                                    class="form-control"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea
                                name="excerpt"
                                id="excerpt"
                                class="form-control"
                                rows="3">{{ old('excerpt', $item->excerpt)}}</textarea>
                        </div>

                        <div class="form-check">
                            <input name="is_published" type="hidden" value="0">
                            <label>
                                <input name="is_published"
                                       class="form-check-input"
                                       value="1"
                                       @if ($item->is_published)
                                           checked="checked"
                                       @endif
                                       type="checkbox">
                                Опубликовано
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
