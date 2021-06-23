<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EducationLesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationLessonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any education lessons.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the education lesson.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return mixed
     */
    public function view(User $user, EducationLesson $educationLesson)
    {
        return true;
    }

    /**
     * Determine whether the user can create education lessons.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the education lesson.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return mixed
     */
    public function update(User $user, EducationLesson $educationLesson)
    {
        return $user->id === $educationLesson->user->id;
    }

    /**
     * Determine whether the user can delete the education lesson.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return mixed
     */
    public function delete(User $user, EducationLesson $educationLesson)
    {
        return $user->id === $educationLesson->user->id;
    }

    /**
     * Determine whether the user can restore the education lesson.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return mixed
     */
    public function restore(User $user, EducationLesson $educationLesson)
    {
        return $user->id === $educationLesson->user->id;
    }

    /**
     * Determine whether the user can permanently delete the education lesson.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return mixed
     */
    public function forceDelete(User $user, EducationLesson $educationLesson)
    {
        return false;
    }
}
