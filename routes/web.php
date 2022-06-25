<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('user',\App\Http\Controllers\UserController::class);
Route::resource('currency',\App\Http\Controllers\CurrencyController::class);
Route::resource('level',\App\Http\Controllers\LevelController::class);
Route::resource('transactionType',\App\Http\Controllers\TransactionTypeController::class);
Route::resource('transactionLimit',\App\Http\Controllers\TransactionLimitController::class);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

