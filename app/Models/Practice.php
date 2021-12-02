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
     * @return Collection
     */
    final public static function allPublished(): Collection
    {
        return self::allPublishedQuery()->get();
    }

    private static function allPublishedQuery(): Builder
    {
        return Practice::whereHas(
            'publicationState',
            fn($publicationState) => $publicationState->whereSlug('PUB')
        );
    }

    /**
     * Retrieve all published story by a specific relation.
     *
     * @param string $relation The name of the relation.
     * @param mixed  $columnValue The value of the relation column.
     * @param bool   $isValueSlug Specify if the value is a slug or an id.
     *
     * @return Collection
     */
    final public static function allPublishedBy(
        string $relation,
        mixed $columnValue,
        bool $isValueSlug = false
    ): Collection {
        return self::allPublishedQuery()->whereHas(
            $relation,
            fn($relation) => $relation->where($isValueSlug ? 'slug' : 'id', $columnValue)
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

    final public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    final public function publicationState(): BelongsTo
    {
        return $this->belongsTo(PublicationState::class);
    }
}
