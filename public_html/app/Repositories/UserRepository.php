<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\User as Model;

class UserRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param $id
     * @return \App\Models\User|\App\Models\User[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getShow($id)
    {
        $user = User::with(['posts', 'products'])->findOrFail($id);

        $user->lastPosts = $user->posts->where('is_published', 1)->last()->limit(5)->get()->load('user');
        $user->lastProducts = $user->products->last()->limit(3)->get();
        $user->draftPosts = $user->posts->where('is_published', 0)->load('user');

        return $user;
    }
}
