<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationLessonStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'program_id' => 'required|integer',
            'image' => 'file',
            'name' => 'required|string',
            'excerpt' => 'string|nullable',
            'content_raw' => 'string',
            'content_html' => 'string|nullable'
        ];
    }
}
