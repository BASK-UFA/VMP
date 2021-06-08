<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any products.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Product $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        return true;
    }

    /**
     * Determine whether the user can create products.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user, Product $product)
    {
        return $this->checkPermissionModerate($product);
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Product $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return $user->hasRole('admin') || (($user->id === $product->user->id) && $this->checkPermissionModerate(
                    $product
                ));
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Product $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return $user->hasRole('admin') || $user->id === $product->user->id;
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Product $product
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        return $user->hasRole('admin') || $user->id === $product->user->id;
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        return false;
    }

    /**
     * Проверить право на публикацию статьи
     *
     * @param  \App\Models\BlogPost  $product
     * @return bool
     */
    private function checkPermissionModerate(Product $product): bool
    {
        if ($product->isDirty('is_moderated')) {
            if (\Auth::user()->hasPermission('public-product')) {
                return true;
            }
            return false;
        }
        return true;
    }
}
