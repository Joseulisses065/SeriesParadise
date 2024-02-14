<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MidiaController;
use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MidiaController::class,'index'])->name('home');


Route::resource('/midias',MidiaController::class)->except(['show']);

Route::get('/midias/{midia}/seasons', [SeasonController::class, 'index'])->name('seasons.index');
Route::get('seasons/{midia}/episodes', [SeasonController::class, 'show'])->name('seasons.show');


Route::get('/episodes/{episode}/update',[EpisodeController::class,'update'])->name('episodes.update');
Route::get('/{season}/episodes/create',[EpisodeController::class,'create'])->name('episodes.create');


Route::get('/episodes/{episode}',[EpisodeController::class,'index'])->name('episodes.index');

