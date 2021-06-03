<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\EducationProgramStoreRequest;
use App\Http\Requests\EducationProgramUpdateRequest;
use App\Models\EducationLesson;
use App\Models\EducationProgram;
use App\Repositories\BlogPostRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationProgramController extends Controller
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
        $items = EducationProgram::paginate('20');

        return view('teacher.programs.index', compact('items'));
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

        $item = (new EducationProgram());

        return view('teacher.programs.edit', compact('item', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EducationProgramStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EducationProgramStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $item = (new EducationProgram())->fill($data);

        $result = $item->save();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка создания программы']);
        }

        return redirect()
            ->route('teacher.programs.show', ['program' => $item->id])
            ->with(['success' => 'Программа успешно создана']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $data = $this->userRepository->getShow();

        $item = EducationProgram::findOrFail($id);

        return view('teacher.programs.show', compact('item', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $data = $this->userRepository->getShow();

        $item = EducationProgram::findOrFail($id);

        $programs = EducationProgram::where('user_id', $data->id)->all();

        return view('teacher.programs.edit', compact('item', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EducationProgramUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EducationProgramUpdateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();

        $item = EducationProgram::findOrFail($id)->fill($data);

        $result = $item->save();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка обновления программы']);
        }

        return redirect()
            ->route('teacher.programs.show', ['lesson' => $item->id])
            ->with(['success' => 'Программа успешно обновлена']);
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
        $item = EducationProgram::findOrFail($id);

        $result = $item->delete();

        if (!$result) {
            return back()->withErrors(['msg' => 'Ошибка удаления программы']);
        }

        return redirect()
            ->route('teacher.programs.index')
            ->with(['success' => 'Программа успешно удалена']);
    }
}
