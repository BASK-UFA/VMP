<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Repositories\BlogProductRepository;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $blogProductRepository;

    /**
     * Подключение репозиториев
     *
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->blogProductRepository = app(BlogProductRepository::class);
    }

    /**
     * Показать страницу всех работ
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->blogProductRepository->getAllWithPaginate();

        return view('blog.products.index', compact('data'));
    }

    /**
     * Показать работу
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = Product::findOrFail($id);

        //$this->authorize('view', $item);

        return view('blog.products.show', compact('item'));
    }

    /**
     * Показать страницу создания работы
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $item = new Product();

        $this->authorize('create', $item);

        return view('blog.user.products.edit', compact('item'));
    }

    /**
     * Сохранить работу в память
     *
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();

        $item = new Product();

        $this->authorize('create', $item);

        $item->create($data);

        if ($item->exists()) {
            return redirect()
                ->back()
                ->with(['success' => 'Успешно обновлено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }

    }

    /**
     * Показать страницу изменения работы
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);

        $this->authorize('update', $item);

        return view('blog.user.products.edit', compact('item'));
    }

    /**
     * Обновить работу
     *
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->all();

        $model = Product::findOrFail($id);

        $this->authorize('update', $model);

        $result = $model->update($data);

        if ($result) {
            return redirect()
                ->back()
                ->with(['success' => 'Успешно обновлено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }
    }

    /**
     * Удалить работу
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function destroy($id)
    {
        $model = Product::findOrFail($id);

        $this->authorize('delete', $model);

        $result = $model->delete();

        if ($result) {
            return redirect()
                ->back()
                ->with(['success' => 'Работа успешно удалена']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления работы']);
        }
    }
}
