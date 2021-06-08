<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\EducationLessonStoreRequest;
use App\Http\Requests\EducationLessonUpdateRequest;
use App\Models\EducationLesson;
use App\Models\EducationProgram;
use App\Repositories\BlogPostRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationLessonController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = EducationLesson::paginate('20');

        return view('teacher.lessons.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = $this->userRepository->getShow();

        $programs = EducationProgram::where('user_id', $data->id)->get();

        $item = (new EducationLesson());

        return view('teacher.lessons.edit', compact('item', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EducationLessonStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EducationLessonStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $item = (new EducationLesson())->fill($data);

        $result = $item->save();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка создания урока']);
        }

        return redirect()
            ->route('teacher.lessons.show', ['lesson' => $item->id])
            ->with(['success' => 'Урок успешно создан']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $item = EducationLesson::findOrFail($id);

        return redirect()
            ->route('education.lessons.show', ['lesson' => $item->id]);
        //return view('education.lessons.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $item = EducationLesson::findOrFail($id);

        $data = $this->userRepository->getShow();

        $programs = EducationProgram::where('user_id', $data->id)->get();

        return view('teacher.lessons.edit', compact('item', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EducationLessonUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EducationLessonUpdateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $item = EducationLesson::findOrFail($id)->fill($data);

        $result = $item->save();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка обновления урока']);
        }

        return redirect()
            ->route('education.lessons.show', ['lesson' => $item->id])
            ->with(['success' => 'Урок успешно обновлен']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $item = EducationLesson::findOrFail($id);

        $result = $item->delete();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка удаления урока']);
        }

        return redirect()
            ->route('teacher.index')
            ->with(['success' => 'Урок успешно удален']);
    }
}
