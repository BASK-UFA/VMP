@extends('layouts.app')

@section('content')

    @php /** var @var \App\Models\User $data */ @endphp

    <div class="row d-flex justify-content-center">
        <div class="col-11 col-md-11">
            @include('blog.includes.result_message')

            <h1 class="mb-4">Работы пользователей</h1>

            <div class="table table-responsive w-100">
                <table>
                    <tr>
                        <th class="border-top-0">id</th>
                        <th class="border-top-0">Дата</th>
                        <th class="border-top-0">Картинка</th>
                        <th class="border-top-0">Название</th>
                        <th class="border-top-0">Расположение</th>
                        <th class="border-top-0">Автор</th>
                        <th class="border-top-0"></th>
                    </tr>
                    @foreach($products as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->created_at->format('d.m.Y H:i:s') }}</td>
                            <td>
                                <img src="{{ asset($post->image) }}" style="height: 40px" alt="">
                            </td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->is_moderated ? 'Наши работы' : 'Страница пользователя'}}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                <a href="{{ route('products.edit', ['id' => $post->id]) }}" class="btn btn-primary">Изменить</a>
                            </td>
                            <td>
                                @if(!$post->is_moderated)
                                    <form method="post" class=""
                                          action="{{ route('products.update', ['id' => $post->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="is_moderated" value="1">
                                        <button type="submit" class="btn btn-success text-white">
                                            Опубликовать
                                        </button>
                                    </form>
                                @else
                                    <form method="post" class=""
                                          action="{{ route('products.update', ['id' => $post->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="is_moderated" value="0">
                                        <button type="submit" class="btn btn-danger text-white">
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
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
