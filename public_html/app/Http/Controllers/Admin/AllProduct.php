<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllProduct extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = Product::orderby('created_at', 'desc')->paginate(20);

        return view('admin.products.all', compact('products'));
    }
}
