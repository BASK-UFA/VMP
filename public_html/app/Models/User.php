<?php
namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property \Illuminate\Database\Eloquent\Collection $lastPosts
 * @property \Illuminate\Database\Eloquent\Collection $lastProducts
 * @property \Illuminate\Database\Eloquent\Collection $draftPosts
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogPost[] $posts
 * @property-read int|null $post_count
 * @property string|null $description
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDescription($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property string|null $phone
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 */
class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    // Администратор - первая запись в бд
    const ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'description',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Пользователь имеет статьи
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * Пользователь имеет неопубликованные статьи
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function draftPosts()
    {
        return $this->hasMany(BlogPost::class)->where('is_published', 0)->get();
    }

    /**
     * Пользватель имеет последние 5 опубликованных постов
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function lastPosts()
    {
        return $this->hasMany(BlogPost::class)->where('is_published', 1)->latest()->limit(5)->get();
    }

    /**
     * Пользователь имеет работы
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Пользователь имеет последние 5 работ
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function lastProducts()
    {
        return $this->hasMany(Product::class)->latest()->limit(3)->get();
    }

    /**
     * Пользователь имеет роли
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * Пользователь имеет курсы
     */
    public function courses()
    {
        return $this->hasMany(EducationCourse::class, 'user_id');
    }
}

