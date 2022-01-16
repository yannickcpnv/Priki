<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Practice;
use App\Policies\PracticePolicy;
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
        Practice::class => PracticePolicy::class,
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
        Gate::define('consult', fn(?User $user, Practice $practice) => ($user ?? new User())->canConsult($practice));
    }
}
