<?php

namespace App\Policies;

use App\Models\Finance;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        return $user->hasRole(['Super Admin', 'Ranting', 'Bendahara Ranting']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Finance $finance)
    {
        return $user->hasRole(['Super Admin', 'Ranting', 'Bendahara Ranting']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return $user->hasRole(['Super Admin', 'Ranting', 'Bendahara Ranting']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Finance $finance)
    {
        return $user->hasRole(['Super Admin', 'Ranting']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Finance $finance)
    {
        return $user->hasRole(['Super Admin', 'Ranting']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Finance $finance)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Finance $finance)
    {
        //
    }
}
