<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationProgram extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'user_id'
    ];

    public function lessons()
    {
        return $this->hasMany(EducationLesson::class, 'program_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
