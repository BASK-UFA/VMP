<?php


namespace App\Repositories;
use App\Models\Product as Model;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogProductRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'image',
            'excerpt',
            'content_html',
            'user_id',
            'name',
            'created_at'
        ];

        /** @var LengthAwarePaginator $result */
        $result = $this->startConditions()
            ->select($columns)
            ->where('is_moderated', 1)
            ->orderBy('id', 'DESC')
            ->with(['user'])
            ->paginate(9);

        return $result;
    }

    /**
     * Получить модель для редактирования в админке.
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить работы пользователя в пагинаторе
     *
     * @param $id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllForUserWithPaginate($id)
    {
        $user = User::find($id);

        return $user->products()
            ->orderBy('id', 'DESC')
            ->with(['user'])
            ->paginate(9);
    }
}
