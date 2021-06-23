<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationProgram extends Model
{
    protected $fillable = [
        'name',
        'image',
        'user_id'
    ];

    public function lessons()
    {
        return $this->hasMany(EducationLesson::class, 'program_id');
    }
}
