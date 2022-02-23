<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProductStore;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductStorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the productStore can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the productStore can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductStore  $model
     * @return mixed
     */
    public function view(User $user, ProductStore $model)
    {
        return true;
    }

    /**
     * Determine whether the productStore can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the productStore can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductStore  $model
     * @return mixed
     */
    public function update(User $user, ProductStore $model)
    {
        return true;
    }

    /**
     * Determine whether the productStore can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductStore  $model
     * @return mixed
     */
    public function delete(User $user, ProductStore $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductStore  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the productStore can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductStore  $model
     * @return mixed
     */
    public function restore(User $user, ProductStore $model)
    {
        return false;
    }

    /**
     * Determine whether the productStore can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductStore  $model
     * @return mixed
     */
    public function forceDelete(User $user, ProductStore $model)
    {
        return false;
    }
}
