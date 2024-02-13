<?php

use App\Http\Controllers\MidiaController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MidiaController::class,'index']);
Route::get('/midias', [MidiaController::class,'index'])->name('midias.index');
Route::resource('/midias',MidiaController::class)->except(['show'])->except('index');






Route::get('/',[UserController::class,'index'])->name('user.index');

Route::get('/login', [UserController::class,'index'])->name('user.index');

Route::get('/create', [UserController::class,'edit'])->name('user.edit');

Route::post('/create/store', [UserController::class,'store'])->name('user.store');

Route::post('/login/show', [UserController::class,'show'])->name('user.show');

Route::get('/logout', [UserController::class,'destroy'])->name('user.destroy');



Route::group(['middleware'=>'auth'],function(){
Route::get('/midias/{midia}/seasons', [SeasonController::class, 'index'])->name('seasons.index');
});