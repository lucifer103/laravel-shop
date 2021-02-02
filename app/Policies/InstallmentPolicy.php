<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Policies;

use App\Models\Installment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstallmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any installments.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the installment.
     *
     * @return mixed
     */
    public function view(User $user, Installment $installment)
    {
    }

    /**
     * Determine whether the user can create installments.
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the installment.
     *
     * @return mixed
     */
    public function update(User $user, Installment $installment)
    {
    }

    /**
     * Determine whether the user can delete the installment.
     *
     * @return mixed
     */
    public function delete(User $user, Installment $installment)
    {
    }

    /**
     * Determine whether the user can restore the installment.
     *
     * @return mixed
     */
    public function restore(User $user, Installment $installment)
    {
    }

    /**
     * Determine whether the user can permanently delete the installment.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Installment $installment)
    {
    }

    public function own(User $user, Installment $installment)
    {
        return $installment->user_id == $user->id;
    }
}
