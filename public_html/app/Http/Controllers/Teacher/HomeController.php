<?php

namespace App\Http\Controllers\Teacher;

use App\Models\BlogPost;
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

        return view('teacher.home', compact('data'));
    }
}
