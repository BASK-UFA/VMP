<?php

namespace App\Http\Controllers;

use App\Models\User;

final class AllPostUser
{
    /**
     * Получить все опубликованные посты пользоватля в пагинаторе
     *
     * @param  int  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke($user)
    {
        $user = User::findOrFail($user);

        $paginator = $user->posts()
            ->orderBy('id', 'DESC')
            ->where('is_published', 1)
            ->with(['user', 'category'])
            ->paginate(10);

        return view('blog.posts.index', compact('paginator'));
    }
}
