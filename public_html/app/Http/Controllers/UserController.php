<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\BlogPostRepository;
use App\Repositories\UserRepository;
use Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    private $blogPostRepository;
    private $userRepository;

    /**
     * Подключение репозиториев
     *
     */
    public function __construct()
    {
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Показать страницу авторизованного пользователя
     *
     * @return View
     */
    public function index()
    {
        $data = Auth::user();

        return view('home', compact('data'));
    }

    /**
     * Показать страницу пользователя
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $data = $this->userRepository->getShow($id);

        return view('home', compact('data'));
    }

    /**
     * Обновить данные пользователя
     *
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $model = User::findOrFail($id);

        $this->authorize('update', $model);

        $data = $request->all();

        $result = $model->update($data);

        if ($result) {
            return redirect()
                ->route('user.show', ['id' => $id])
                ->with(['success' => 'Успешно обновлено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }
    }
}
