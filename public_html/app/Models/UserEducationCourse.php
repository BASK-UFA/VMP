<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserEducationCourse
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $user_name
 * @property string $user_phone
 * @property int $course_id
 * @property int $is_checked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereIsChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEducationCourse whereUserPhone($value)
 * @mixin \Eloquent
 */
class UserEducationCourse extends Model
{
    protected $table = 'users_education_courses';

    protected $fillable = [
        'course_id',
        'user_id',
        'user_name',
        'user_phone',
        'is_checked',
    ];
}
