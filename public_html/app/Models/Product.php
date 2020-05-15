<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 *
 */
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'excerpt', 'category_id', 'content_raw', 'is_published', 'published_at',
    ];

    /**
     * Продукт (работа) принадлежит пользователю
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
