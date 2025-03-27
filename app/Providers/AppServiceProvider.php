<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define('admin', function(User $user){
        //     return $user->admin === 1 ;
        // });

        // Gate::define('user', function(user $user){
        //     return $user->user === 1 ;
        // });

        // Gate::define('student', function(user $user){
        //     return $user->student === 1; 
        // });

        // Gate::define('wtbs', function(user $user){
        //     $user->wtbs === 1 ;
        // });
    }
}
