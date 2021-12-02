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

    final public static function allPublished(): Collection
    {
        return self::allPublishedQuery()->get();
    }

    final public static function allPublishedBy(string $column, mixed $value, bool $isValueSlug = false): Collection
    {
        return self::allPublishedQuery()->whereHas(
            $column,
            fn($relation) => $relation->where($isValueSlug ? 'slug' : 'id', $value)
        )->get();
    }

    final public static function lastUpdates(int $days = 1): Collection
    {
        $dateSubDay = Carbon::now()->subDays($days);
        return Practice::where('updated_at', '>=', $dateSubDay)->get();
    }

    private static function allPublishedQuery(): Builder
    {
        return Practice::whereHas(
            'publicationState',
            fn($publicationState) => $publicationState->where('slug', 'PUB')
        );
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
