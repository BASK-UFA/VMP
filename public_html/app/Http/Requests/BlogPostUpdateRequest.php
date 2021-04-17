<?php

namespace App\Http\Requests;

use App\Models\BlogPost;
use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $blogPost = BlogPost::find($this->route('post'));
        return $blogPost && $this->user()->can('update', $blogPost);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'min:5|max:200',
            'slug' => 'max:200',
            'excerpt' => 'max:500',
            'content_raw' => 'string|min:5|max:10000',
            'category_id' => 'integer|exists:blog_categories,id',
        ];
    }
}
