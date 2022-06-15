<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\UserAddress;
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
    return view('user.create');
});

Route::get('register', [UserController::class,'create'])->middleware('guest');
Route::post('register', [UserController::class,'store'])->middleware('guest');

Route::get('/home', function () {
    return view('user.home');
})->name('home');

Route::get('login', [SessionController::class,'create'])->name('login')->middleware('guest');
Route::post('login', [SessionController::class,'store'])->middleware('guest');
Route::post('logout', [SessionController::class,'destroy'])->middleware('auth');

Route::get('address',[AddressController::class,'create'])->middleware('auth');
Route::post('/address/save',[AddressController::class,'store'])->middleware('auth');

Route::get('/address/edit/{id}',[AddressController::class,'edit'])->middleware('auth');
Route::get('/address/delete',[AddressController::class,'delete'])->middleware('auth');

Route::get('/users', [UserController::class,'show']);
