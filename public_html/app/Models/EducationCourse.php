<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EducationCourse
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationCourse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EducationCourse extends Model
{
    protected $fillable = [
        'name',
        'content'
    ];
}
