<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogCategory withoutTrashed()
 * @property-read string $parent_title
 * @property-read string $parentTitle
 * @property-read \App\Models\BlogCategory $parentCategory
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'parent_id',
            'description'
        ];

    /**
     * Получить родительскую категорию
     *
     * @return BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Пример аксессуара (Accessor)
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ?? (($this->isRoot()) ? 'Корень' : '???');

        return $title;
    }

    /**
     * Является ли текущий объект корневым
     *
     * @return bool
     */
    private function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
