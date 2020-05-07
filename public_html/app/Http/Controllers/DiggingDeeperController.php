<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{

    public function collections()
    {
        $eloquentCollection = BlogPost::withTrashed()->get();
        $collection = collect($eloquentCollection);

        $result = [];

        $result['first'] = $collection->first()->getAttributes();
//        $result['last'] = $collection->last()->id;

        $result['data'] = $collection
            ->where('category_id', 1)
            ->values();
//            ->keyBy('id');

        dd($result);
    }

}
