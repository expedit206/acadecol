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

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');
    
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('formations', App\Http\Controllers\Admin\FormationController::class);
    Route::post('formations/{formation}/toggle-featured', [App\Http\Controllers\Admin\FormationController::class, 'toggleFeatured'])
        ->name('formations.toggle-featured');
});

require __DIR__.'/auth.php';
