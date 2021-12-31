<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class Reference extends Model
{

    use HasFactory;

    public    $timestamps = false;
    protected $fillable   = [
        'description',
        'url',
    ];

    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }
}
