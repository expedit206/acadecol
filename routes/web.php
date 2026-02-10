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

// Pré-inscriptions Publiques
Route::controller(App\Http\Controllers\PreRegistrationController::class)->group(function () {
    Route::get('/pre-inscription', 'create')->name('pre-registration.create');
    Route::post('/pre-inscription', 'store')->name('pre-registration.store');
    Route::get('/ma-fiche', 'status')->name('pre-registration.status');
    Route::post('/ma-fiche/check', 'check')->name('pre-registration.check');
    Route::put('/ma-fiche/{preRegistration}', 'update')->name('pre-registration.update');
});

Route::get('/pre-inscription-reussie', function () {
    return Inertia\Inertia::render('PreRegistration/Success');
})->name('pre-registration.success');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pre-inscription-reussie', [App\Http\Controllers\Auth\RegisteredUserController::class, 'success'])
        ->name('pre-registration.success');
});

// Admin Routes
// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'formations' => App\Models\Formation::count(),
                'categories' => App\Models\Category::count(),
                'pre_registrations' => App\Models\PreRegistration::count(),
            ]
        ]);
    })->name('dashboard');
    
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('formations', App\Http\Controllers\Admin\FormationController::class);
    Route::post('formations/{formation}/toggle-featured', [App\Http\Controllers\Admin\FormationController::class, 'toggleFeatured'])
        ->name('formations.toggle-featured');
    
    Route::resource('pre-registrations', App\Http\Controllers\Admin\PreRegistrationController::class)
        ->only(['index', 'show', 'update']);
});

require __DIR__.'/auth.php';
