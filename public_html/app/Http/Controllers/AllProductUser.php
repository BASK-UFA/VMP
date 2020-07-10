<?php

namespace App\Http\Controllers;

use App\Models\User;

class AllProductUser extends Controller
{
    /**
     * Получить работы пользователея в пагинаторе
     *
     * @param  int  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(int $user)
    {
        $user = User::find($user);

        $data = $user->products()
            ->orderBy('id', 'DESC')
            ->with(['user'])
            ->paginate(9);

        return view('blog.products.index', compact('data'));
    }
}
