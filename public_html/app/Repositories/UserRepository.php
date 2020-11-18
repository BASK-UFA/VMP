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
        $user = User::findOrFail($id);

        $user->lastPosts = $user->lastPosts()->load('user');
        $user->lastProducts = $user->lastProducts();
        $user->draftPosts = $user->draftPosts()->load('user');

        return $user;
    }
}
