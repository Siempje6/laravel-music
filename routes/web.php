<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Models\Band;

Route::get('/', function() {
    $bands = Band::all();
    return view('welcome', compact('bands'));
})->name('welcome');


Route::resource('bands', BandController::class);
Route::resource('albums', AlbumController::class);
Route::resource('songs', SongController::class);
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
