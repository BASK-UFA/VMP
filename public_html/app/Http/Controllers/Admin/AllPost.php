<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllPost extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $posts = BlogPost::paginate(20);

        return view('admin.posts.all', compact('posts'));
    }
}
