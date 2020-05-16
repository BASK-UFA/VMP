<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{


    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    public function __construct()
    {
        $this->blogPostRepository = app(BlogPostRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \Auth::user();
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Показать страницу пользователя
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('home', compact('data'));
    }

    /**
     * Обновить данные пользователя
     *
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();

        $result = User::findOrFail($id)->update($data);

        if ($result) {
            return redirect()
                ->route('user.show', ['id' => $id])
                ->with(['success' => 'Успешно обновлено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }
    }

    /**
     * Удалить пользователя
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
