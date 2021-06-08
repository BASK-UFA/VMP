<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEducationCourseStoreRequest;
use App\Http\Requests\UserEducationCourseUpdateRequest;
use App\Models\UserEducationCourse;
use Illuminate\Http\Request;

class UserEducationCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserEducationCourseStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserEducationCourseStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->except(['_token']);

        if (\Auth::user()) {
            $data['user_id'] = \Auth::user()->id;
        }

        $result = UserEducationCourse::create($data)->save();

        if ($result) {
            return back()
                ->with(['success' => 'Заявка принята']);
        }

        return back()
            ->withErrors(['msg' => 'Ошибка подачи заявки']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UserEducationCourseUpdateRequest $request, $id)
    {
        $data = $request->except(['_token']);

        $courseRequest = UserEducationCourse::findOrFail($id);

        if (\Auth::user()) {
            if ($courseRequest['user_id'] !== \Auth::user()->id) {
                abort(403);
            }
        } else {
            abort(403);
        }


        $result = $courseRequest->update($data);

        if ($result) {
            return back()
                ->with(['success' => 'Заявка успешно обновлена']);
        }

        return back()
            ->withErrors(['msg' => 'Ошибка обновления заявки']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $courseRequest = UserEducationCourse::findOrFail($id);

        if (\Auth::user()) {
            if ($courseRequest['user_id'] !== \Auth::user()->id) {
                abort(403);
            }
        } else {
            abort(403);
        }

        $result = $courseRequest->delete();

        if ($result) {
            return back()
                ->with(['success' => 'Заявка успешно обновлена']);
        }

        return back()
            ->withErrors(['msg' => 'Ошибка обновления заявки']);
    }
}
