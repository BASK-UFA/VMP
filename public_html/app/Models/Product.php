<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 */

class Product extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'category_id', 'content_raw', 'is_published', 'published_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
