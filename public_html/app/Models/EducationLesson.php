<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLesson extends Model
{
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
        return $this->belongsTo(EducationProgram::class, 'program_id');
    }
}
