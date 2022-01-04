<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class Domain extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    final public function practices(): HasMany
    {
        return $this->hasMany(Practice::class);
    }

    final public static function allWithPracticePublishedCount(): Collection|array
    {
        return self::withCount([
            'practices' => function ($query) {
                $query->whereHas('publicationState', function ($q) {
                    $q->where('slug', config('business.domain.published'));
                });
            },
        ])->get();
    }
}
