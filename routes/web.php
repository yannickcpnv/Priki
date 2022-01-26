<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReferenceController;


Route::get('/', [HomeController::class, 'index'])
     ->name('home');

Route::prefix('/practices')->group(function () {
    Route::get('', [PracticeController::class, 'index'])
         ->name('practices.list');

    Route::get('/published', [PracticeController::class, 'listPublished'])
         ->name('practices.list-published');

    Route::get('/domains/{slug}', [PracticeController::class, 'byDomain'])
         ->name('practices.list-by-domain');

    Route::get('/{practice}', [PracticeController::class, 'view'])
         ->name('practices.view');

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

Route::resource('references', ReferenceController::class);

require __DIR__ . '/auth.php';
