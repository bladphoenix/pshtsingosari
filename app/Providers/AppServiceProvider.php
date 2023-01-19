<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Jakarta');
        View::composer(['layouts.nav', 'layouts.navadmin', 'layouts.sidepaneladmin', 'layouts.sidepanel', 'user.notification', 'user.user', 'admin.notification', 'admin.user'], function ($view) {
            $view->with('user', Auth::user());
        });
        Paginator::useBootstrap();
    }
}
