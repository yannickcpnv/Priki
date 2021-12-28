<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @mixin Builder
 */
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    public const DEFAULT_ROLE = 'MBR';

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

    /**
     * Create a new model and return the instance.
     *
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = []): Model
    {
        if (!array_key_exists('role_id', $attributes)) {
            $attributes['role_id'] = self::defaultRole()->id;
        }

        return (new self)->newQuery()->create($attributes);
    }

    private static function defaultRole(): Role
    {
        return Role::whereSlug(config('business.user.default_role'))->first();
    }
}
