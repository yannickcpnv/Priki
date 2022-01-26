<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReferenceController;


Route::get('/', [PracticeController::class, 'listPublished'])
     ->name('home');

Route::prefix('/users')->group(function () {
    Route::get('/{user}', [UserController::class, 'show'])
         ->name('users.show');
});

Route::prefix('/practices')->group(function () {
    Route::get('', [PracticeController::class, 'index'])
         ->name('practices.list');

    Route::get('/published', [PracticeController::class, 'listPublished'])
         ->name('practices.list-published');

    Route::get('/domains/{slug}', [PracticeController::class, 'byDomain'])
         ->name('practices.list-by-domain');

    Route::get('/{practice}', [PracticeController::class, 'show'])
         ->name('practices.show');

    Route::post('/{practice}/publish', [PracticeController::class, 'publish'])
         ->name('practices.publish');
});

Route::prefix('/opinions')->group(function () {
    Route::post('', [OpinionController::class, 'store'])
         ->name('opinions.store');

    Route::post('/comment', [OpinionController::class, 'storeComment'])
         ->name('opinions.comment.store');

    Route::delete('/{opinion}', [OpinionController::class, 'destroy'])
         ->name('opinions.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('references', ReferenceController::class);
});

require __DIR__ . '/auth.php';
