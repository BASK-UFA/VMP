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

        $userCourseRequests = \DB::table('users_education_courses')->where('user_id', $data->id)->get();

        $userCourses = EducationCourse::where('user_id', $data->id)->get();

        $data->userCourseRequests = $userCourseRequests;
        $data->userCourses = $userCourses;

        foreach ($data->userCourseRequests as $userCourseRequest) {
            $userCourseRequest->course_name = $userCourses->where('id', $userCourseRequest->course_id)->first()->name;
        }

        return view('teacher.home', compact('data'));
    }
}
