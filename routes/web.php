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
Route::get('/install', [App\Http\Controllers\FrontController::class, 'install'])->name('install');
Route::post('/setupadmin', [App\Http\Controllers\FrontController::class, 'setupadmin'])->name('setupadmin');
Route::post('/create', [App\Http\Controllers\FrontController::class, 'store'])->name('store');
Route::post('/create_database',[App\Http\Controllers\FrontController::class,'create_database'])->name('create_database');
Route::get('/checkDirectoryExist',[App\Http\Controllers\FrontController::class,'checkDirectoryExist'])->name('checkDirectoryExist');
Route::get('/checkDatabaseExist',[App\Http\Controllers\FrontController::class,'checkDatabaseExist'])->name('checkDatabaseExist');
Route::get('/checkUsernameExist',[App\Http\Controllers\FrontController::class,'checkUsernameExist'])->name('checkUsernameExist');
Route::get('/deleteDirectory',[App\Http\Controllers\FrontController::class,'deleteDirectory'])->name('deleteDirectory');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
