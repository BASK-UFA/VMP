<?php

namespace App\Http\Controllers\Blog\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Показать все работы пользователя
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = Product::all()->where('user_id', $id);

        return view('blog.user.products.index', compact('data'));
    }

    /**
     * Показать страницу создания работы
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new Product();

        return view('blog.user.products.edit', compact('item'));
    }

    /**
     * Сохранить продукт в память
     *
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();
        $item = (new Product())->create($data);

        if ($item->exists) {
            return redirect()
                ->route('blog.user.products.edit', ['id' => $item->id])
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
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);

        return view('blog.user.products.edit', compact('item'));
    }

    /**
     * Обновить продукт в памяти
     *
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = Product::findOrFail($id)->update($data);

        if ($result) {
            return redirect()
                ->route('blog.user.products.edit', ['id' => $id])
                ->with(['success' => 'Успешно обновлено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }

    }

    /**
     * Удалить продукт
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = Product::destroy($id);

        if ($result) {
            return redirect()
                ->route('blog.user.products.create')
                ->with(['success' => 'Работа успешно удалена']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления работы']);
        }
    }
}
