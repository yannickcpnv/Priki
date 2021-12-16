<?php

namespace App\Models;

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
    final public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_opinion')
            ->withPivot('comment', 'points')
            ->as('feedback');
    }
}
