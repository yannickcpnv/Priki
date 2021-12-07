<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class Practice extends Model
{

    use HasFactory;

    /**
     * Retrieve all published practices.
     *
     * @param string|null $with The relation to get with the model in eager loading.
     *
     * @return Collection
     */
    final public static function allPublished(string $with = null): Collection
    {
        return self::allPublishedQuery($with)->get();
    }

    /**
     * Retrieve all published story by a specific relation.
     *
     * @param string $modelRelation The name of the model relation.
     * @param mixed  $value         The value of the relation column.
     * @param bool   $isValueSlug   Specify if the value is a slug or an id.
     *
     * @return Collection
     */
    final public static function allPublishedBy(
        string $modelRelation,
        mixed $value,
        bool $isValueSlug = false
    ): Collection {
        return self::allPublishedQuery()->whereHas(
            $modelRelation,
            fn($relation) => $relation->where($isValueSlug ? 'slug' : 'id', $value)
        )->get();
    }

    /**
     * Retrieve last updated practices by days.
     *
     * @param int $days The last updated days.
     *
     * @return Collection
     */
    final public static function lastUpdates(int $days): Collection
    {
        $dateSubDay = Carbon::now()->subDays($days);
        return Practice::where('updated_at', '>=', $dateSubDay)->get();
    }

    private static function allPublishedQuery(string $with = null): Builder
    {
        $relation = 'publicationState';
        $callback = fn($publicationState) => $publicationState->where('slug', 'PUB');

        return is_null($with)
            ? Practice::whereHas($relation, $callback)
            : Practice::with($with)->whereHas($relation, $callback);
    }

    final public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    final public function publicationState(): BelongsTo
    {
        return $this->belongsTo(PublicationState::class);
    }
}
