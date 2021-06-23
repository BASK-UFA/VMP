<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'program_id',
        'user_id',
        'image',
        'name',
        'excerpt',
        'content_raw',
        'content_html'
    ];

    public function program()
    {
        return $this->belongsTo(EducationProgram::class, 'program_id')->with(['lessons']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
