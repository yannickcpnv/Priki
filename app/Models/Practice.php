<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class Practice extends Model
{

    use HasFactory;

    public final function getSwitzerlandDate(): string
    {
        return $this->updated_at->isoFormat('LL');
    }
}
