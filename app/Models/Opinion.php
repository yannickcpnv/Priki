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
        $this->comments()->attach($user->id, [
            'comment' => $attributes['comment'],
            'points'  => $attributes['points'],
        ]);
    }

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
    final public function comments(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_opinion')
            ->withPivot('comment', 'points')
            ->as('feedback');
    }

    /**
     * Get the number of up votes for this opinion.
     *
     * @return int
     */
    final public function upVotes(): int
    {
        return $this->comments()->wherePivot('points', '>', 0)->count();
    }

    /**
     * Get the number of down votes for this opinion.
     *
     * @return int
     */
    final public function downVotes(): int
    {
        return $this->comments()->wherePivot('points', '<', 0)->count();
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
}
