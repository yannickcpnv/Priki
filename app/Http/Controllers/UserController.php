<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{

    final public function show(User $user): View
    {
        return view('pages.users.show', compact('user'));
    }
}
