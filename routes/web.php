<?php

use App\Models\Role;
use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'practices' => Practice::all(),
    ]);
});

Route::get('/domains', function () {
    return view('domains', [
        'domains' => Domain::all(),
    ]);
});

Route::get('/roles', function () {
    return view('roles', [
        'roles' => Role::all(),
    ]);
});
