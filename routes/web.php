<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', \App\Http\Controllers\WellcomeController::class)->name('welcome');

// Protected actions
Route::resource('educations', EducationController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::resource('works', WorkController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::resource('tasks', TaskController::class)
    ->except(['index', 'show'])
    ->middleware('auth');

Route::resource('skills', SkillController::class)
->middleware('auth');

// Public actions
Route::get('educations', [EducationController::class, 'index'])->name('educations.index');
Route::get('educations/{education}', [EducationController::class, 'show'])->name('educations.show');

Route::get('works', [WorkController::class, 'index'])->name('works.index');
Route::get('works/{work}', [WorkController::class, 'show'])->name('works.show');

Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
