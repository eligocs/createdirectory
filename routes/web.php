<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [App\Http\Controllers\FrontController::class, 'index'])->name('create');
Route::post('/create', [App\Http\Controllers\FrontController::class, 'store'])->name('store');
Route::post('/create_database',[App\Http\Controllers\FrontController::class,'create_database'])->name('create_database');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
