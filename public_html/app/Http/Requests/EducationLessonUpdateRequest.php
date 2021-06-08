<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationLessonUpdateRequest extends FormRequest
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
            'program_id' => 'integer',
            'image' => 'file',
            'name' => 'string',
            'excerpt' => 'string|nullable',
            'content_raw' => 'string|nullable',
            'content_html' => 'string|nullable'
        ];
    }
}
