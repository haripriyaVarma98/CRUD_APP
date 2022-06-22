<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\LeaveRequestController;
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
    return redirect('register');
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

Route::post('/address/update/{id}',[AddressController::class,'update'])->middleware('auth');
Route::get('/address/delete',[AddressController::class,'delete'])->middleware('auth');

Route::get('/users',[UserController::class,'show']);
Route::post('/users', [UserController::class,'data'])->name('userList');

Route::get('/home/applyLeave', function() {
    return view('user.leave');
})->middleware('auth');
Route::post('/home/applyLeave', [LeaveRequestController::class,'store']);