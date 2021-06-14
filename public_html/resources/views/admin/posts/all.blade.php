@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-11">
            <h1 class="mb-4">Статьи пользователей</h1>

            <div class="table table-responsive w-100">
                <table>
                    <tr>
                        <th class="border-top-0">id</th>
                        <th class="border-top-0">Дата</th>
                        <th class="border-top-0">Картинка</th>
                        <th class="border-top-0">Название</th>
                        <th class="border-top-0">Опубликовано</th>
                        <th class="border-top-0">Расположение</th>
                        <th class="border-top-0">Автор</th>
                        <th class="border-top-0"></th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->created_at->format('d.m.Y H:i:s') }}</td>
                            <td>
                                <img src="{{ asset($post->image) }}" style="height: 40px" alt="">
                            </td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->is_published? 'Да' : 'Нет'}}</td>
                            <td>{{ $post->is_moderated ? 'Блог' : 'Страница пользователя'}}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">Изменить</a>
                            </td>
                            <td>
                                @if(!$post->is_moderated || !$post->is_published)
                                    <form method="post" class=""
                                          action="{{ route('posts.update', ['id' => $post->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="is_published" value="1">
                                        <input type="hidden" name="is_moderated" value="1">
                                        <button type="submit" class="btn btn-success text-white">
                                            Опубликовать
                                        </button>
                                    </form>
                                @else
                                    <form method="post" class=""
                                          action="{{ route('posts.update', ['id' => $post->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="is_moderated" value="0">
                                        <button type="submit" class="btn btn-warning text-white">
                                            Скрыть
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
