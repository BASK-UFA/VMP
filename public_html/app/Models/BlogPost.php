<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlogPost
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $slug
 * @property string $title
 * @property string|null $excerpt
 * @property string $content_raw
 * @property string $content_html
 * @property int $is_published
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogPost withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\BlogCategory $category
 * @property-read \App\Models\User $user
 */
class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'title', 'slug', 'excerpt', 'category_id', 'content_raw', 'is_published', 'published_at',
    ];

    public function category()
    {
        // Статья принаджелит категории
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        // Статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
