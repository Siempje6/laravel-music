<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MemberMusicController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);


require __DIR__.'/auth.php'; // Breeze routes

// Routes die alle ingelogde users mogen zien (view-only)
Route::middleware(['auth'])->group(function () {
    Route::resource('albums', AlbumController::class)->only(['index', 'show']);
    Route::resource('songs', SongController::class)->only(['index', 'show']);
    Route::resource('bands', BandController::class)->only(['index', 'show']);
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');
});

// Member routes (eigen content toevoegen)
Route::middleware(['auth', 'member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/music', [MemberMusicController::class, 'index'])->name('music.index');
    Route::get('/music/create-song', [MemberMusicController::class,'createSong'])->name('music.createSong');
    Route::post('/music/store-song', [MemberMusicController::class,'storeSong'])->name('music.storeSong');
    Route::get('/music/create-album', [MemberMusicController::class,'createAlbum'])->name('music.createAlbum');
    Route::post('/music/store-album', [MemberMusicController::class,'storeAlbum'])->name('music.storeAlbum');
});

// Admin routes (user & role management + full CRUD)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', AdminUserController::class)->except(['create','store','show']);
    // optionally full resources for songs/albums/bands for admin:
    Route::resource('albums', AlbumController::class);
    Route::resource('songs', SongController::class);
    Route::resource('bands', BandController::class);
});
