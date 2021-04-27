<?php

namespace App\Http\Controllers\Teacher;

use App\Models\BlogPost;
use App\Models\EducationCourse;
use App\Models\Product;
use App\Repositories\BlogPostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
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

    public function index()
    {
        $data = $this->userRepository->getShow();

        $userCourseRequests = \DB::table('users_education_courses')->where(
            [['user_id', $data->id], ['is_checked', false]]
        )->get();
        $userCourseRequestsChecked = \DB::table('users_education_courses')->where(
            [['user_id', $data->id], ['is_checked', true]]
        )->get();

        $userCourses = EducationCourse::where('user_id', $data->id)->get();

        $data->userCourseRequests = $userCourseRequests;
        $data->userCourseRequestsChecked = $userCourseRequestsChecked;
        $data->userCourses = $userCourses;

        //dd($userCourseRequests);

        foreach ($data->userCourseRequests as $userCourseRequest) {
            if ($userCourses->where('id', $userCourseRequest->course_id)->first() !== null) {
                $userCourseRequest->course_name = $userCourses->where('id', $userCourseRequest->course_id)->first(
                )->name;
            } else {
                $userCourseRequest->course_name = 'Неизвестно';
            }
        }

        foreach ($data->userCourseRequestsChecked as $userCourseRequest) {
            if ($userCourses->where('id', $userCourseRequest->course_id)->first() !== null) {
                $userCourseRequest->course_name = $userCourses->where('id', $userCourseRequest->course_id)->first(
                )->name;
            } else {
                $userCourseRequest->course_name = 'Неизвестно';
            }
        }

        return view('teacher.home', compact('data'));
    }
}
