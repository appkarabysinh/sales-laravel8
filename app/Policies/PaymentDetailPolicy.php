<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PaymentDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paymentDetail can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the paymentDetail can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentDetail  $model
     * @return mixed
     */
    public function view(User $user, PaymentDetail $model)
    {
        return true;
    }

    /**
     * Determine whether the paymentDetail can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the paymentDetail can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentDetail  $model
     * @return mixed
     */
    public function update(User $user, PaymentDetail $model)
    {
        return true;
    }

    /**
     * Determine whether the paymentDetail can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentDetail  $model
     * @return mixed
     */
    public function delete(User $user, PaymentDetail $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentDetail  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the paymentDetail can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentDetail  $model
     * @return mixed
     */
    public function restore(User $user, PaymentDetail $model)
    {
        return false;
    }

    /**
     * Determine whether the paymentDetail can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentDetail  $model
     * @return mixed
     */
    public function forceDelete(User $user, PaymentDetail $model)
    {
        return false;
    }
}
