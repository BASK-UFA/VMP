<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\BlogPostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\BlogPost;

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

        $data->posts = BlogPost::orderBy('id', 'desc')->take(5)->get();;

        $data->products = Product::orderBy('id', 'desc')->take(5)->get();;

        return view('admin.home', compact('data'));
    }
}
