<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @mixin Builder
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
     * Check if the user has written the practice.
     *
     * @param Practice $practice
     *
     * @return bool
     */
    final public function hasWritten(Practice $practice): bool { return $practice->user->id === $this->id; }

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

    final public function role(): BelongsTo { return $this->belongsTo(Role::class); }
    //endregion
}
