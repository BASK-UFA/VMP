<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostSearchRequest;
use App\Http\Requests\BlogPostStoreRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;

class PostController extends Controller
{

    private $blogPostRepository;
    private $blogCategoryRepository;

    /**
     * Подключение репозиториев
     *
     * PostController constructor.
     */
    public function __construct()
    {
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Показать статьи всех пользователей
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate();

        return view('blog.posts.index', compact('paginator'));
    }

    /**
     * Показать все статьи пользователей, чей GET параметр name равен имени пользователя в БД
     * Если найти статьи не удалось, то редирект на posts.index
     * В будущем будет более детальный поиск, а не только по name пользователей
     *
     * @param \App\Http\Requests\BlogPostSearchRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(BlogPostSearchRequest $request)
    {
        $paginator = $this->blogPostRepository->getSpecificWithPaginate($request)->appends('name', $request->name);

        if ($paginator->isEmpty()) {
            return redirect()
                ->route('posts.index')
                ->withErrors(['msg' => "По вашему запросу статьи не найдены"]);
        }

        return view('blog.posts.index', compact('paginator'));
    }

    /**
     * Показать статью
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = BlogPost::findOrFail($id);

        return view('blog.posts.show', compact('item'));
    }

    /**
     * Показать форму создание статьи
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.user.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Сохранить статью в базе данных
     *
     * @param \App\Http\Requests\BlogPostStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(BlogPostStoreRequest $request)
    {
        $item = new BlogPost();

        $this->authorize('create', $item);

        $data = $request->all();

        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()
                ->route('posts.edit', [$item->id])
                ->with(['success' => 'Успешно создано']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка создания'])
                ->withInput();
        }
    }

    /**
     * Показать форму изменения статьи
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        $this->authorize('update', $item);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => 'Запись не найдена']);
        }

        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.user.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Обновить статью
     *
     * @param \App\Http\Requests\BlogPostUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}]не найдена"])
                ->withInput();
        }

        $this->authorize('update', $item);

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('posts.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }
    }

    /**
     * Удалить статью
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = BlogPost::findOrFail($id);

        $this->authorize('delete', $model);

        $result = $model->delete();

        if ($result) {
            return redirect()
                ->route('posts.create')
                ->with(['success' => "Статья удалена"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка удаления"])
                ->withInput();
        }
    }
}
