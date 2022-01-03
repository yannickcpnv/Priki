<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReferenceController;


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

Route::prefix('/opinions')->group(function () {
    Route::post('', [OpinionController::class, 'store'])->name('opinions.store');
    Route::delete('/{opinion}', [OpinionController::class, 'destroy'])->name('opinions.destroy');
    Route::post('/comment', [OpinionController::class, 'storeComment'])->name('opinions.comment.store');
});

Route::resource('references', ReferenceController::class);

require __DIR__ . '/auth.php';
