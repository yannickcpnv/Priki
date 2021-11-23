<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
}
