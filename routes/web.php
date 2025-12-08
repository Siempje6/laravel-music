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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ApiSearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function() {
    $bands = Band::all();
    return view('welcome', compact('bands'));
})->name('welcome');

// (voor alle gebruikers)

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

// Api routes

Route::get('/search/songs', [ApiSearchController::class, 'search'])->name('search.songs');

Route::post('/admin/songs/add-from-api', [SongController::class, 'storeFromApi'])->name('admin.songs.addFromApi');


Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search/songs/add', [SearchController::class, 'addSong'])->name('search.songs.add');
Route::post('/search/albums/add', [SearchController::class, 'addAlbum'])->name('search.albums.add');
Route::post('/search/bands/add', [SearchController::class, 'addBand'])->name('search.bands.add');
