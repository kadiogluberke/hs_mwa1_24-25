<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group( function() {

    Route::get('educations', [\App\Http\Controllers\Api\EducationController::class, 'index'] )->name('educations.index');
    Route::get('educations/{id}', [\App\Http\Controllers\Api\EducationController::class, 'show'] )->name('educations.show');

    // Route::get('authors', [\App\Http\Controllers\Api\AuthorController::class, 'index'] )->name('authors.index');
    // Route::get('authors/{id}', [\App\Http\Controllers\Api\AuthorController::class, 'show'] )->name('authors.show');

});