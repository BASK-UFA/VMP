@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-8">
            <h1 class="mb-4">Статьи пользователей</h1>

            <div class="table table-responsive w-100">
                <table>
                    <tr>
                        <th class="border-top-0">id</th>
                        <th class="border-top-0">Картинка</th>
                        <th class="border-top-0">Название</th>
                        <th class="border-top-0">Опубликовано</th>
                        <th class="border-top-0">Автор</th>
                        <th class="border-top-0"></th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <img src="{{ asset($post->image) }}" style="height: 40px" alt="">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->is_moderated ? 'Да' : 'Нет'}}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">Изменить</a>
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
