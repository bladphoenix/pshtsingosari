<?php

namespace App\Policies;

use App\Models\SocialFinance;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialFinancePolicy
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
     * @param  \App\Models\SocialFinance  $socialFinance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, SocialFinance $socialFinance)
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
     * @param  \App\Models\SocialFinance  $socialFinance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, SocialFinance $socialFinance)
    {
        return $user->hasRole(['Super Admin', 'Ranting']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\SocialFinance  $socialFinance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, SocialFinance $socialFinance)
    {
        return $user->hasRole(['Super Admin', 'Ranting']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\SocialFinance  $socialFinance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, SocialFinance $socialFinance)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\SocialFinance  $socialFinance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, SocialFinance $socialFinance)
    {
        //
    }
}
