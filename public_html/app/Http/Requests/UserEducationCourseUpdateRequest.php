<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEducationCourseUpdateRequest extends FormRequest
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
            'user_id' => 'required|int|exists:id,users',
            'course_id' => 'required|int|exists:id,education_courses',
        ];
    }
}
