@php
    /** var @var \App\Models\BlogPost $item */
@endphp

<div class="row justify-content-center  home">
    <div class="col-md-12">
        <div class="card border-0">
            <div class="mb-3">
                <button type="submit "  class="btn text-white btn-dark mt-1 Oswald " >Сохранить</button>
            </div>
            @if($item->exists)
                <div class="card">
                    <div class="card-body">
                        ID: {{ $item->id }}
                        <div class="form-group">
                            <label for="created_at">Создано</label>
                            <input id="created_at" type="text" value="{{ $item->created_at }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Изменено</label>
                            <input id="updated_at" type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="deleted_at">Удалено</label>
                            <input id="deleted_at" type="text" value="{{ $item->deleted_at }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div><br>

@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">

        </div>
    </div>
@endif
