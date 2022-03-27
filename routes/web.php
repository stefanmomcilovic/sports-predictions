<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [APIController::class, 'callAPI'])->name('index');
Route::get('/o-nama', [UserController::class, 'aboutUs'])->name('o-nama');
Route::get('/kontakt', [UserController::class, 'contantUs'])->name('kontakt');