<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/pricing', [App\Http\Controllers\AdminController::class, 'view'])->name('admin-pricing');
Route::get('/user/pricing', [App\Http\Controllers\UserController::class, 'view'])->name('user-pricing');
Route::post('/user/set/pricing', [App\Http\Controllers\UserController::class, 'store'])->name('user-setpricing');
Route::post('/admin/update/pricing', [App\Http\Controllers\AdminController::class, 'store'])->name('updatesubs');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'show_users'])->name('admin-users');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/play', [App\Http\Controllers\CompletionsController::class,'index'])->name('play');
Route::post('completions', [App\Http\Controllers\CompletionsController::class,'store'])->name('completions');
Route::post('/user/payment', [App\Http\Controllers\UserController::class,'makepayment'])->name('user-makepayment');
Route::get('/user/statement', [App\Http\Controllers\UserController::class, 'statement'])->name('user-statement');
Route::get('/user/credit/card', [App\Http\Controllers\UserController::class, 'creditcard'])->name('user-creditcard');
Route::post('/user/credit/card/add', [App\Http\Controllers\UserController::class, 'addcreditcard'])->name('user-addcreditcard');



