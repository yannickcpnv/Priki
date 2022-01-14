<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    final public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('access-moderator', fn(User $user) => $user->isModerator());
        Gate::define('consult-practice', function (User $user, Practice $practice) {
            return Gate::allows('access-moderator') || $practice->isPublished();
        });
    }
}
