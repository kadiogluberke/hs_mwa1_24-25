<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfileController;
use App\Models\Education;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', \App\Http\Controllers\WellcomeController::class);

// Protected actions
Route::resource('educations', EducationController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

// Public actions
Route::get('educations', [EducationController::class, 'index'])->name('educations.index');
Route::get('educations/{education}', [EducationController::class, 'show'])->name('educations.show');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


