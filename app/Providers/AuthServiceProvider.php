<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

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

        Gate::define('admin', function(User $user) {
            Log::debug("Admin gate check for user {$user->id}", ['admin' => $user->admin]);
            return $user->admin == 1; // Using == for loose comparison
        });

        Gate::define('user', function(User $user) {
            return $user->user == 1;
        });

        Gate::define('student', function(User $user) {
            return $user->student == 1;
        });

        Gate::define('wtbs', function(User $user) {
            return $user->wtbs == 1; // Added missing return statement
        });
    }
}
