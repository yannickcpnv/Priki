<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 * @mixin IdeHelperPublicationStateTransition
 */
class PublicationStateTransition extends Model
{

    use HasFactory;

    public $timestamps = false;

}
