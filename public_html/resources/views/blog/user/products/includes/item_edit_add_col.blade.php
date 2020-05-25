@php
    /** var @var \App\Models\BlogPost $item */
@endphp

<div class="row justify-content-center home pt-sm-0">
    <div class="col-md-12">
        <div class="border-0">
            <div class="mb-3">
                <button type="submit" class="btn-lg text-white btn-dark mt-1 Oswald h4">Сохранить</button>
            </div>

            @if($item->exists)
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-body">
                            ID: {{ $item->id }}
                            <div class="form-group">
                                <label for="created_at" class="h4 Oswald">Создано</label>
                                <input id="created_at" type="text" value="{{ $item->created_at }}" class="form-control"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at"class="h4 Oswald">Изменено</label>
                                <input id="updated_at" type="text" value="{{ $item->updated_at }}" class="form-control"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="deleted_at"class="h4 Oswald">Удалено</label>
                                <input id="deleted_at" type="text" value="{{ $item->deleted_at }}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endif
