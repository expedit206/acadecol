<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PublicController;

// Public Routes
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/a-propos', 'about')->name('about');
    Route::get('/formations', 'formations')->name('formations');
    Route::get('/certifications', 'certifications')->name('certifications');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/actualites', 'news')->name('news');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pre-inscription-reussie', [App\Http\Controllers\Auth\RegisteredUserController::class, 'success'])
        ->name('pre-registration.success');
});

require __DIR__.'/auth.php';
