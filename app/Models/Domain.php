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

    const DRAFTED   = 'DRA';
    const PROPOSED  = 'PRO';
    const PUBLISHED = 'PUB';
    const CLOSED    = 'CLO';
    const ARCHIVED  = 'ARC';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    final public static function allWithPracticePublishedCount(): Collection|array
    {
        return Domain::withCount([
                                     'practices' => function ($query) {
                                         $query->whereHas('publicationState', function ($q) {
                                             $q->where('slug', self::PUBLISHED);
                                         });
                                     },
                                 ])->get();
    }

    final public function practices(): HasMany
    {
        return $this->hasMany(Practice::class);
    }
}
