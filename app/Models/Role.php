<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperRole
 */
class Role extends Model
{

    use HasFactory;

    public $timestamps = false;
}
