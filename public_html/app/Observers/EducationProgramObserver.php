<?php

namespace App\Observers;

use App\Models\EducationProgram;

class EducationProgramObserver
{
    public function creating(EducationProgram $educationProgram)
    {
        $this->setUser($educationProgram);
        $this->setImage($educationProgram);
    }

    public function updating(EducationProgram $educationProgram)
    {
        $this->setImage($educationProgram);
    }

    /**
     * Handle the education program "created" event.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return void
     */
    public function created(EducationProgram $educationProgram)
    {
        //
    }

    /**
     * Handle the education program "updated" event.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return void
     */
    public function updated(EducationProgram $educationProgram)
    {
        //
    }

    /**
     * Handle the education program "deleted" event.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return void
     */
    public function deleted(EducationProgram $educationProgram)
    {
        //
    }

    /**
     * Handle the education program "restored" event.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return void
     */
    public function restored(EducationProgram $educationProgram)
    {
        //
    }

    /**
     * Handle the education program "force deleted" event.
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     * @return void
     */
    public function forceDeleted(EducationProgram $educationProgram)
    {
        //
    }

    protected function setUser(EducationProgram $educationProgram)
    {
        $educationProgram->user_id = auth()->id() ?? 1;
    }

    /**
     * Сохранить промо-картинку в памяти и обновить поле image поста
     *
     * @param  \App\Models\EducationProgram  $educationProgram
     */
    private function setImage(EducationProgram $educationProgram)
    {
        /** @var File $file */

        if ($educationProgram->isDirty('image') and is_file($educationProgram->image)) {
            $file = $educationProgram->image;

            $path = $file
                ->store('posts/'.$educationProgram->id, 'public');

            $educationProgram->image = 'storage/'.$path;
        }
    }
}
