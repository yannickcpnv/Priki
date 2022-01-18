<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperPractice
 */
class Practice extends Model
{

    use HasFactory;

    //region Methods

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
     * Retrieve all practice grouped by domain and order by publication state.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    final public static function allGroupByDomainOrderByState(): Collection
    {
        return self::with('domain', 'publicationState')
                   ->get()
                   ->sortBy(function ($practice) {
                       return [$practice->domain->name, $practice->publication_state_id];
                   })
                   ->groupBy(fn($practice) => $practice->domain->name);
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

        return self::where('updated_at', '>=', $dateSubDay)->get();
    }

    /**
     * Check if the practice is in published publication state.
     *
     * @return bool
     */
    final public function isPublished(): bool
    {
        return $this->publicationState->slug === config('business.domain.published');
    }

    /**
     * Check if the practice is in proposed publication state.
     *
     * @return bool
     */
    final public function isProposed(): bool
    {
        return $this->publicationState->slug === config('business.domain.proposed');
    }

    final public function publish(): void
    {
        $publicationState = PublicationState::whereSlug(config('business.domain.published'))->first();
        $this->publicationState()->associate($publicationState);

        $this->save();
    }

    private static function allPublishedQuery(string $with = null): Builder
    {
        $relation = 'publicationState';
        $callback = fn($publicationState) => $publicationState->where('slug', config('business.domain.published'));

        return is_null($with)
            ? self::whereHas($relation, $callback)
            : self::with($with)->whereHas($relation, $callback);
    }

    //endregion

    //region Accessors

    final public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    final public function publicationState(): BelongsTo
    {
        return $this->belongsTo(PublicationState::class);
    }

    final public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    final public function opinions(): HasMany
    {
        return $this->hasMany(Opinion::class);
    }

    //endregion
}
