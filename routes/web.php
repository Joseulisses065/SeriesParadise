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



Route::resource('seasons',SeasonController::class)->only('destroy','edit','update');
Route::get('seasons/{midia}', [SeasonController::class, 'show'])->name('seasons.show');
Route::get('seasons/{midia}/create', [SeasonController::class, 'create'])->name('seasons.create');
Route::post('seasons/{midia}/store', [SeasonController::class, 'store'])->name('seasons.store');





Route::resource('episodes',EpisodeController::class)->only('destroy','edit','update');
Route::get('/{season}/episodes/create',[EpisodeController::class,'create'])->name('episodes.create');
Route::post('/{season}/episode/store',[EpisodeController::class,'store'])->name('episodes.store');


Route::get('/episodes/{episode}',[EpisodeController::class,'index'])->name('episodes.index');
Route::put('/episodes/view/{episode}',[EpisodeController::class,'view'])->name('episodes.view');

