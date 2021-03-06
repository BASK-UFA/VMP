<?php

namespace App\Observers;

use App\Mail\EducationCourseRequestChecked;
use App\Mail\EducationCourseRequestCreated;
use App\Models\EducationCourse;
use App\Models\User;
use App\Models\UserEducationCourse;

class UserEducationCourseObserver
{
    /**
     * Handle the user education course "created" event.
     *
     * @param  \App\Models\UserEducationCourse  $userEducationCourse
     * @return void
     */
    public function created(UserEducationCourse $userEducationCourse)
    {
        $user = User::findOrFail($userEducationCourse->user_id);

        $course = EducationCourse::findOrFail($userEducationCourse->course_id);

        $email = $user->email;

        \Mail::to($email)->send(new EducationCourseRequestCreated($user, $course));
    }

    /**
     * Handle the user education course "updated" event.
     *
     * @param  \App\Models\UserEducationCourse  $userEducationCourse
     * @return void
     */
    public function updated(UserEducationCourse $userEducationCourse)
    {
        if ($userEducationCourse->isDirty('is_checked')) {
            $user = User::findOrFail($userEducationCourse->user_id);

            $course = EducationCourse::findOrFail($userEducationCourse->course_id);

            $email = $user->email;

            \Mail::to($email)->send(new EducationCourseRequestChecked($user, $course));
        }
    }

    /**
     * Handle the user education course "deleted" event.
     *
     * @param  \App\Models\UserEducationCourse  $userEducationCourse
     * @return void
     */
    public function deleted(UserEducationCourse $userEducationCourse)
    {
        //
    }

    /**
     * Handle the user education course "restored" event.
     *
     * @param  \App\Models\UserEducationCourse  $userEducationCourse
     * @return void
     */
    public function restored(UserEducationCourse $userEducationCourse)
    {
        //
    }

    /**
     * Handle the user education course "force deleted" event.
     *
     * @param  \App\Models\UserEducationCourse  $userEducationCourse
     * @return void
     */
    public function forceDeleted(UserEducationCourse $userEducationCourse)
    {
        //
    }
}
