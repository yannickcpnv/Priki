<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{

    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    //region Laravel fields

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'fullname',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //endregion

    //region Methods

    //region Authorization

    /**
     * Check if the user role is moderator.
     *
     * @return bool
     */
    final public function isModerator(): bool
    {
        return $this->role?->slug === config('business.role.moderator');
    }

    /**
     * Check if the user can consult a practice.
     *
     * @param Practice $practice
     *
     * @return bool
     */
    public function canConsult(Practice $practice): bool
    {
        return $practice->isPublished() || $this->isModerator();
    }

    /**
     * Check if the user can publish a practice.
     *
     * @param Practice $practice
     *
     * @return bool
     */
    final public function canPublish(Practice $practice): bool
    {
        return $this->isModerator() && $this->hasGivenOpinionTo($practice) && $practice->isProposed();
    }

    //endregion

    /**
     * Check if the user has already given his opinion to a practice.
     *
     * @param Practice $practice
     *
     * @return bool
     */
    final public function hasGivenOpinionTo(Practice $practice): bool
    {
        return $practice->opinions?->contains(fn(Opinion $opinion) => $opinion->user_id === $this->id);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    final protected static function booted(): void
    {
        static::creating(function (User $user) {
            $user->role_id = $user->role_id ?? self::defaultRole()->id;
        });
    }

    private static function defaultRole(): Role
    {
        return Role::whereSlug(config('business.user.default_role'))->first();
    }

    //endregion

    //region Accessors

    final public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    //endregion
}
