<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();
        Gate::define('super_admin', function(User $user){
            return $user->level_user === 'super_admin';
        });
        Gate::define('admin', function(User $user){
            return $user->level_user === 'admin';
        });
        Gate::define('tim_sales', function(User $user){
            return $user->level_user === 'tim_sales';
        });
        Gate::define('manajer_sales', function(User $user){
            return $user->level_user === 'manajer_sales';
        });
        Gate::define('tim_proyek', function(User $user){
            return $user->level_user === 'tim_proyek';
        });
        Gate::define('manajer_proyek', function(User $user){
            return $user->level_user === 'manajer_proyek';
        });
    }
}
