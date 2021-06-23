<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EducationProgram;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any education programs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the education program.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return mixed
     */
    public function view(User $user, EducationProgram $educationProgram)
    {
        return true;
    }

    /**
     * Determine whether the user can create education programs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the education program.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return mixed
     */
    public function update(User $user, EducationProgram $educationProgram)
    {
        return $educationProgram->user->id === $user->id;
    }

    /**
     * Determine whether the user can delete the education program.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return mixed
     */
    public function delete(User $user, EducationProgram $educationProgram)
    {
        return $educationProgram->user->id === $user->id;
    }

    /**
     * Determine whether the user can restore the education program.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return mixed
     */
    public function restore(User $user, EducationProgram $educationProgram)
    {
        return $educationProgram->user->id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the education program.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return mixed
     */
    public function forceDelete(User $user, EducationProgram $educationProgram)
    {
        return false;
    }
}
