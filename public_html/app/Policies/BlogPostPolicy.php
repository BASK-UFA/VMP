<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any blog posts.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the blog post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\BlogPost $blogPost
     * @return mixed
     */
    public function view(User $user, BlogPost $blogPost)
    {
        return true;
    }

    /**
     * Determine whether the user can create blog posts.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the blog post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\BlogPost $blogPost
     * @return mixed
     */
    public function update(User $user, BlogPost $blogPost)
    {
        return $user->id === $blogPost->user->id;
    }

    /**
     * Determine whether the user can delete the blog post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\BlogPost $blogPost
     * @return mixed
     */
    public function delete(User $user, BlogPost $blogPost)
    {
        return $user->id === $blogPost->user->id;
    }

    /**
     * Determine whether the user can restore the blog post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\BlogPost $blogPost
     * @return mixed
     */
    public function restore(User $user, BlogPost $blogPost)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the blog post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\BlogPost $blogPost
     * @return mixed
     */
    public function forceDelete(User $user, BlogPost $blogPost)
    {
        return false;
    }
}
