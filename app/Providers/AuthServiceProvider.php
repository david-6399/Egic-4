<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function(User $user){
            return $user->admin == 1 ;
        });

        Gate::define('user', function(User $user){
            return $user->user == 1 ;
        });

        Gate::define('student', function(User $user){
            return $user->student == 1; 
        });

        Gate::define('wtbs', function(User $user){
            $user->wtbs == 1 ;
        });
    }
}
