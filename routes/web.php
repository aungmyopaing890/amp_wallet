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
Route::resource('user',\App\Http\Controllers\Admin\UserController::class);
Route::resource('currency',\App\Http\Controllers\Admin\CurrencyController::class);
Route::resource('level',\App\Http\Controllers\Admin\LevelController::class);
Route::resource('transactionType',\App\Http\Controllers\Admin\TransactionTypeController::class);
Route::resource('transactionLimit',\App\Http\Controllers\Admin\TransactionLimitController::class);
Route::resource('serviceType',\App\Http\Controllers\Admin\ServiceTypeController::class);
Route::resource('service',\App\Http\Controllers\Admin\ServiceController::class);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'getTransaction'])->name('getTransaction');

Route::get('/deposit/{id}', [App\Http\Controllers\TransactionController::class, 'getDeposit'])->name('getDeposit');
Route::post('/deposit', [App\Http\Controllers\TransactionController::class, 'postDeposit'])->name('postDeposit');;

Route::get('/withdraw/{id}', [App\Http\Controllers\TransactionController::class, 'getWithdraw'])->name('getWithdraw');
Route::post('/Withdraw', [App\Http\Controllers\TransactionController::class, 'postWithdraw'])->name('postWithdraw');;
Route::get('users/{id}/unBan', [App\Http\Controllers\Admin\UserController::class, 'unBan'])->name('users.unBan');
Route::get('users/{id}/ban', [App\Http\Controllers\Admin\UserController::class, 'ban'])->name('users.ban');
Route::get('/customer', 'App\Http\Controllers\Admin\UserController@customerIndex')->name('customer.index');
Route::get('/merchant', 'App\Http\Controllers\Admin\UserController@merchantIndex')->name('merchant.index');

