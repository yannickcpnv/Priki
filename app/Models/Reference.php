<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperReference
 */
class Reference extends Model
{

    use HasFactory;

    public    $timestamps = false;
    protected $fillable   = [
        'description',
        'url',
    ];

    final public function hasUrl(): bool
    {
        return !is_null($this->url);
    }
}
