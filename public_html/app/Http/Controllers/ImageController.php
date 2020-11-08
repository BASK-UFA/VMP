<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageStoreRequest;

class ImageController extends Controller
{
    public function store(ImageStoreRequest $request)
    {
        $file = $request->file('file');
        $path = $file
            ->store('files', 'public');

        $url = 'storage/'.$path;

        return back()
            ->with('success', 'Ваш файл загружен. Ссылка: '.\URL::route('/').'/'.$url)
            ->withInput();
    }

    public function storeAjax(ImageStoreRequest $request)
    {
        $file = $request->file('file');

        $result = $file->store('files', 'public');

        if (empty($result)) {
            return response('Ошибка сохранения', 500)->header('Content-Type', 'text/plain');
        }

        $url = 'storage/'.$result;

        return response(['message' => 'Успешно сохранено', 'value' => asset($url)], 200)->header(
            'Content-Type',
            'application/json'
        );
    }
}
