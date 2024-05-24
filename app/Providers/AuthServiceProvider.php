<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
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

        // Gate for is Supervisor
        Gate::define('isSupervisor', function(User $user) {
            return $user->userLevel == 0;
        });

        // Define Volunteer Gate
        Gate::define('isVolunteer', function (User $user) {
            return $user->userLevel == 1;  // assuming 1 is volunteer
        });

        // Define access to member registration
        Gate::define('register-member', function (User $user) {
            return $user->userLevel == 1;  // assuming 1 is volunteer
        });
    }
}
