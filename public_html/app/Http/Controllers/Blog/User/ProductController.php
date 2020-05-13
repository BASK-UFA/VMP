<?php

namespace App\Http\Controllers\Blog\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        // TODO: Указать вьюшку для просмотра всех работ пользователя
        return view('', compact('data'));
    }

    /**
     * Показать страницу создания работы
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Product();

        return view('blog.user.products.edit',compact('item'));
    }

    /**
     * Сохранить продукт в память
     *
     * @var Product $item
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $item = new Product();
        $result = $item->create($data);

        if ($result) {
            if ($result) {
                return redirect()
                    ->route('blog.user.products.edit', ['id' => $item->id])
                    ->with(['success' => 'Успешно обновлено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения']);
            }
        }
    }

    /**
     * Показать страницу изменения работы
     *
     * @param  int  $id
     * @return \View
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);


        return view('blog.user.products.edit', compact('item'));
    }

    /**
     * Обновить продукт в памяти
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $result = Product::findOrFail($id)->update($data);

        if ($result) {
            if ($result) {
                return redirect()
                    ->route('blog.user.products.edit', ['id' => $id])
                    ->with(['success' => 'Успешно обновлено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения']);
            }
        }
    }

    /**
     * Удалить продукт
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
