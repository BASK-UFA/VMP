<?php

namespace App\Http\Controllers\Blog;

use App\Http\Requests\BlogPostSearchRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;

class PostController extends BaseController
{

    private $blogPostRepository;
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
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
                ->withErrors(['msg' => "Пользователь $request->name не найден"]);
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
}
