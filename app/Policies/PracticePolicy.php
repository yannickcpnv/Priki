<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Auth\Access\HandlesAuthorization;

class PracticePolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can consult the practice.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Practice  $practice
     *
     * @return bool
     */
    public function view(?User $user, Practice $practice): bool
    {
        return $practice->isPublished() || ($user ?? new User())->can('access-moderator');
    }

    /**
     * Determine whether the user can publish the practice.
     *
     * @param \App\Models\User     $user
     * @param \App\Models\Practice $practice
     *
     * @return bool
     */
    public function publish(User $user, Practice $practice): bool
    {
        return $user->can('access-moderator')
               && $practice->isProposed()
               && $user->hasGivenOpinionTo($practice);
    }
}
