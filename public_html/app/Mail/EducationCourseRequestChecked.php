<?php

namespace App\Mail;

use App\Models\EducationCourse;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EducationCourseRequestChecked extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, EducationCourse $educationCourse)
    {
        $this->user = $user;
        $this->course = $educationCourse;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@vmp-ufa.ru')
            ->view('mail.default')
            ->with(
                [
                    'userName' => $this->user->name,
                    'courseName' => $this->course->name,
                    'text' => "Здравствуйте, ".$this->user->name." Ваша заявка на курс ".$this->course->name." была принята."
                ]
            );
    }
}
