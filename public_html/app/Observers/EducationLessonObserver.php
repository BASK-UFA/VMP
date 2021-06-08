<?php

namespace App\Observers;

use App\Models\EducationLesson;
use Carbon\Carbon;

class EducationLessonObserver
{

    /**
     * Обработка ПЕРЕД обновлением записи
     *
     * @param  EducationLesson  $educationLesson
     */
    public function updating(EducationLesson $educationLesson)
    {
        $this->setHtml($educationLesson);
        $this->setImage($educationLesson);
    }

    /**
     * Обработка ПЕРЕД созданием записи
     *
     * @param  EducationLesson  $educationLesson
     */
    public function creating(EducationLesson $educationLesson)
    {
        $this->setImage($educationLesson);
        $this->setRandImage($educationLesson);
        $this->setHtml($educationLesson);
        $this->setUser($educationLesson);
    }


    /**
     * Сохранить промо-картинку в памяти и обновить поле image поста
     *
     * @param  \App\Models\EducationLesson  $educationLesson
     */
    private function setImage(EducationLesson $educationLesson)
    {
        /** @var File $file */

        if ($educationLesson->isDirty('image') and is_file($educationLesson->image)) {
            $file = $educationLesson->image;

            $path = $file
                ->store('posts/'.$educationLesson->id, 'public');

            $educationLesson->image = 'storage/'.$path;
        }
    }

    /**
     * Установить картинку по умолчанию, если картинка не пришла
     *
     * @param  EducationLesson  $educationLesson
     */
    private function setRandImage(EducationLesson $educationLesson)
    {
        if (!$educationLesson->isDirty('image')) {
            $educationLesson->image = 'images/'.rand(1, 6).'-lg-posts.jpg';
        }
    }

    /**
     * Если дата публикации не установлена и происходит установка флага - Опубликовано,
     * то устанавливаем дату публикации на текующую.
     *
     * @param  EducationLesson  $educationLesson
     */
    private function setPublishedAt(EducationLesson $educationLesson)
    {
        if (empty($educationLesson->published_at) && $educationLesson->is_published) {
            $educationLesson->published_at = Carbon::now();
        }
    }

    /**
     * Если поле слаг пустое, то заполняем его конвертацией заголовка.
     *
     * @param  EducationLesson  $educationLesson
     */
    private function setSlug(EducationLesson $educationLesson)
    {
        if (empty($educationLesson->slug)) {
            $educationLesson->slug = \Str::slug($educationLesson->title);
        }
    }

    /**
     * Установка значения поля content_html относительно поля content_raw
     *
     * @param  EducationLesson  $educationLesson
     */
    protected function setHtml(EducationLesson $educationLesson)
    {
        if ($educationLesson->isDirty('content_raw')) {
            $educationLesson->content_html = markdown($educationLesson->content_raw);
        }
    }

    protected function setUser(EducationLesson $educationLesson)
    {
        $educationLesson->user_id = auth()->id() ?? EducationLesson::UNKNOWN_USER;
    }


    /**
     * Handle the education lesson "created" event.
     *
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return void
     */
    public function created(EducationLesson $educationLesson)
    {
        //
    }

    /**
     * Handle the education lesson "updated" event.
     *
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return void
     */
    public function updated(EducationLesson $educationLesson)
    {
        //
    }

    /**
     * Handle the education lesson "deleted" event.
     *
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return void
     */
    public function deleted(EducationLesson $educationLesson)
    {
        //
    }

    /**
     * Handle the education lesson "restored" event.
     *
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return void
     */
    public function restored(EducationLesson $educationLesson)
    {
        //
    }

    /**
     * Handle the education lesson "force deleted" event.
     *
     * @param  \App\Models\EducationLesson  $educationLesson
     * @return void
     */
    public function forceDeleted(EducationLesson $educationLesson)
    {
        //
    }
}
