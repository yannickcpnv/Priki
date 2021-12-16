<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\PracticeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/domains')->group(function () {
    Route::get('', [DomainController::class, 'index'])->name('domains');
    Route::get('/{slug}', [DomainController::class, 'bySlug'])->name('domains.slug');
});

Route::prefix('/practices')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('practices');
    Route::get('/{practice}', [PracticeController::class, 'consultPractice'])
        ->name('practice')
        ->middleware('practice.isPublished');
});

require __DIR__ . '/auth.php';
