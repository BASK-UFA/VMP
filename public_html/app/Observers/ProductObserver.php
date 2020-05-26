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
        $this->setImage($product);
        $this->setHtml($product);
    }

    /**
     * Обработка ПЕРЕД созданием записи
     *
     * @param \App\Models\Product $product
     */
    public function creating(Product $product)
    {
        $this->setImage($product);
        $this->setRandImage($product);
        $this->setHtml($product);
        $this->setUser($product);
    }

    /**
     * Сохранить промо-картинку в памяти и обновить поле image работы
     * Если картинки нет, то поставить картинку по умолчанию
     *
     * @param Product $product
     */
    private function setImage(Product $product)
    {
        /** @var File $file */

        if ($product->isDirty('image') and is_file($product->image)) {
            $file = $product->image;

            $path = $file
                ->store('products/'.$product->id, 'public');

            $product->image = 'storage/'.$path;
        }
    }

    /**
     * Установить картинку по умолчанию, если картинка не пришла
     *
     * @param  \App\Models\Product  $product
     */
    private function setRandImage(Product $product)
    {
        if (!$product->isDirty('image')) {
            $product->image = 'images/'.rand(1, 6).'-product-sm.png';
        }
    }

    /**
     * Если дата публикации не установлена и происходит установка флага - Опубликовано,
     * то устанавливаем дату публикации на текующую.
     *
     * @param  \App\Models\Product  $product
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
