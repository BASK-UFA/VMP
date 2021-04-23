<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEducationCourseStoreRequest;
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
        $data = $request->all();

        $result = \DB::insert('education_courses', $data);

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
