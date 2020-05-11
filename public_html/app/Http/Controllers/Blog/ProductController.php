<?php

namespace App\Http\Controllers\Blog;

use App\Models\Product;
use App\Repositories\BlogProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    private $blogProductRepository;

    public function __construct()
    {
        $this->blogProductRepository = app(BlogProductRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \View
     */
    public function index()
    {
        $data = $this->blogProductRepository->getAllWithPaginate();

        // TODO: Указать вьюшку страницы "Наши работы"
        return view('', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);

        // TODO: Указать вьюшку для просмотра работы
        return view('', $data);
    }

}
