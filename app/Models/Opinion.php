<?php

namespace App\Models;

use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin Builder
 */
class Opinion extends Model
{

    use HasFactory;

    //region Accessors

    /**
     * Retrieve the user that created this opinion.
     *
     * @return BelongsTo
     */
    final public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retrieve all users who left feedback on this opinion.
     *
     * @return BelongsToMany
     */
    final public function commentators(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_opinion')
            ->withPivot('comment', 'points')
            ->as('feedback');
    }

    /**
     * Retrieve all reference linked to this opinion.
     *
     * @return BelongsToMany
     */
    final public function references(): BelongsToMany
    {
        return $this->belongsToMany(Reference::class, 'opinion_reference');
    }

    /**
     * Get the number of up votes for this opinion.
     *
     * @return int
     */
    final public function getAllPointsAttribute(): int
    {
        return $this->commentators()->sum('points');
    }

    /**
     * Get the number of up votes for this opinion.
     *
     * @return int
     */
    final public function getUpVotesAttribute(): int
    {
        return $this->commentators()->wherePivot('points', '>', 0)->count();
    }

    /**
     * Get the number of down votes for this opinion.
     *
     * @return int
     */
    final public function getDownVotesAttribute(): int
    {
        return $this->commentators()->wherePivot('points', '<', 0)->count();
    }

    //endregion

    //region Methods

    /**
     * Add a new comment from a user to this opinion.
     *
     * @param User  $user
     * @param array $attributes
     */
    final public function addComment(
        User $user,
        #[ArrayShape([
            'comment' => 'string',
            'points'  => 'string',
        ])] array $attributes
    ): void {
        $this->commentators()->attach($user->id, [
            'comment' => $attributes['comment'],
            'points'  => $attributes['points'],
        ]);
    }

    /**
     * Check if this opinion is written by a user.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    final public function isWrittenBy(User $user): bool
    {
        return $this->user_id === $user->id;
    }

    /**
     * Increment the points of the user feedback.
     * It can't exceed 1.
     *
     * @param \App\Models\User $user
     */
    public function increasePoints(User $user): void
    {
        $this->commentators()->where('user_id', $user->id)->increment('points');
    }

    /**
     * Increment the points of the user feedback.
     * It can't be below -1.
     *
     * @param \App\Models\User $user
     */
    public function decreasePoints(User $user): void
    {
        $this->commentators()->where('user_id', $user->id)->decrement('points');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::deleting(function (Opinion $opinion) {
            $opinion->references()->detach();
        });
    }

    //endregion
}
