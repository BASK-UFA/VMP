<?php


namespace App\Repositories;
use App\Models\BlogPost;
use App\Models\BlogPost as Model;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить все статьи, где GET параметр равен полю name пользователей
     * Если ни один пользователь не найден, то редирект на posts.index с ошибкой
     *
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\RedirectResponse
     */
    public function getSpecificWithPaginate($request)
    {
        $name = $request->get('name');

        if (empty($name)) {
            return $this->getAllWithPaginate();
        }

        $usersId = User::where('name', 'LIKE', '%' . $name . '%')->get('id')->toArray();

        $result = BlogPost::whereIn('user_id', $usersId)
            ->with(['user'], ['category'])
            ->paginate(10)
            ->appends('name', $request->name);

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
