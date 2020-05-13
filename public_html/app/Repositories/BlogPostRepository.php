<?php


namespace App\Repositories;
use App\Models\BlogPost as Model;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }


    public function getAllOfUserWithPaginate($id = null) {
        if ($id === null) {
            $id = \Auth::user()->id;
        }

        /** @var LengthAwarePaginator $result */
        $result = $this->startConditions()
            ->where('user_id', $id)
            ->orderBy('id', 'DESC')
            ->with(['category', 'user'])
            ->paginate(10);


        return $result;
    }

    /**
     * Получить список всех статей для вывода в списке
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'image',
            'excerpt',
            'category_id',
            'user_id',
            'slug',
            'title',
            'is_published',
            'published_at',
            'created_at'
        ];

        /** @var LengthAwarePaginator $result */
        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category', 'user'])
            ->paginate(25);


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
}
