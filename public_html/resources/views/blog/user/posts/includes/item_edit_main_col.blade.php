@php /** @var App\Models\BlogPost $item */ @endphp

<div class="row justify-content-center  home" style="font-family: 'Oswald', sans-serif;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-white bg-dark Oswald h4">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-footer border-0">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item border-0">
                        <a id="maindata-tab" href="#maindata" data-toggle="tab"
                           class="nav-link active border-0 text-dark h5" role="tab" aria-controls="maindata"
                           aria-selected="true">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a id="adddata-tab" href="#adddata" data-toggle="tab" class="nav-link border-0 text-dark h5"
                           role="tab" aria-controls="adddata" aria-selected="true">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
                        <div class="form-group">
                            <label for="title" class="h5">Заголовок</label>
                            <input name="title" value="{{ old('title', $item->title) }}"
                                   type="text"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="content_raw" class="h5">Статья</label>
                            <textarea
                                style="height: 400px;"
                                name="content_raw"
                                id="content_raw"
                                class="form-control"
                                rows="3">{{ old('content_raw', $item->content_raw)}}</textarea>
                        </div>
{{--                        @if ($item->exists)--}}
{{--                            <br>--}}
{{--                            <form method="POST" action="{{ route('posts.destroy', $item->id) }}">--}}
{{--                                @method('DELETE')--}}
{{--                                @csrf--}}
{{--                                <div class=" pb-1 form-group">--}}
{{--                                    <div class="row justify-content-center">--}}
{{--                                        <div class="col-md-12 ">--}}
{{--                                                <div class="text-right">--}}
{{--                                                    <button type="submit" class=" btn-dark btn-lg">Удалить</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-3"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        @endif--}}

                    </div>
                    <div class="tab-pane fade" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <label for="category_id" class="h5">Родитель</label>
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
                            <label for="excerpt" class="h5">Выдержка</label>
                            <textarea
                                name="excerpt"
                                id="excerpt"
                                class="form-control"
                                rows="3">{{ old('excerpt', $item->excerpt)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="h5">Превью</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-check">
                            <input name="is_published" type="hidden" value="0">
                            <label>
                                <input name="is_published"
                                       class="form-check-input "
                                       value="1"
                                       @if ($item->is_published)
                                           checked="checked"
                                       @endif
                                       type="checkbox">
                                <h5>Опубликовано</h5>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
