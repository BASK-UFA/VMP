<?php

namespace App\Observers;

use App\Models\BlogPost;
use App\Models\Product;
use Carbon\Carbon;

class ProductObserver
{
    /**
     * Обработка ПЕРЕД обновлением записи
     *
     * @param \App\Models\Product $product
     */
    public function updating(Product $product)
    {
        $this->setPublishedAt($product);
    }

    /**
     * Обработка ПЕРЕД созданием записи
     *
     * @param \App\Models\Product $product
     */
    public function creating(Product $product)
    {
        $this->setPublishedAt($product);
        $this->setHtml($product);
        $this->setUser($product);
    }

    /**
     * Если дата публикации не установлена и происходит установка флага - Опубликовано,
     * то устанавливаем дату публикации на текующую.
     *
     * @param \App\Models\Product $product
     */
    private function setPublishedAt(Product $product)
    {
        if (empty($product->published_at) && $product->is_published) {
            $product->published_at = Carbon::now();
        }
    }

    /**
     * Установка значения поля content_html относительно поля content_raw
     *
     * @param \App\Models\Product $product
     */
    protected function setHtml(Product $product)
    {
        if ($product->isDirty('content_raw')) {
            $product->content_html = markdown($product->content_raw);
        }
    }

    /**
     * Установка автора работы
     *
     * @param \App\Models\Product $product
     */
    protected function setUser(Product $product)
    {
        $product->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }
}
