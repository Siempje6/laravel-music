<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Member\MusicController;
use App\Models\Band;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function() {
    $bands = Band::all();
    return view('welcome', compact('bands'));
})->middleware('auth')->name('welcome');

// Default resource routes (voor alle gebruikers)
Route::resource('bands', BandController::class);
Route::resource('albums', AlbumController::class);
Route::resource('songs', SongController::class);

// Search
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
             ->name('dashboard');

        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('bands', \App\Http\Controllers\Admin\BandController::class);
        Route::resource('albums', \App\Http\Controllers\Admin\AlbumController::class);
        Route::resource('songs', \App\Http\Controllers\Admin\SongController::class);
});



// Member routes
Route::middleware(['auth','member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/music', [MusicController::class, 'index'])->name('music.index');
    Route::get('/albums', [MusicController::class, 'albums'])->name('albums.index');
});

require __DIR__.'/auth.php';
