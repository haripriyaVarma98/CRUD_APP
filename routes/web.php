<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
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

Route::get('/users',[UserController::class,'show'])->middleware('admin');
Route::post('/users', [UserController::class,'data'])->name('userList');

Route::get('/home/applyLeave', function() {
    return view('user.leave');
})->middleware('auth');
Route::post('/home/applyLeave', [LeaveRequestController::class,'store']);

Route::get('/appliedLeaves',[LeaveRequestController::class,'show'])->middleware('admin');
Route::post('/appliedLeaves/reject',[LeaveRequestController::class,'reject'])->middleware('admin');
Route::post('/appliedLeaves/approve',[LeaveRequestController::class,'approve'])->middleware('admin');
Route::post('/appliedLeaves/massAction',[LeaveRequestController::class,'massApproveOrReject'])->middleware('admin');

Route::get('/categories',[CategoryController::class,'show'])->name('category');
Route::post('/categories/save',[CategoryController::class,'store']);
Route::post('/categories/update',[CategoryController::class,'update']);
Route::post('/categories/delete',[CategoryController::class,'destroy']);

Route::get('/blogs',[BlogController::class,'show'])->name('blog');
Route::get('/blogs/create',[BlogController::class,'create']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'view']);
Route::post('/blogs/save',[BlogController::class,'store']);

Route::post('/blog/addComment',[CommentController::class,'store']);
Route::get('/blog-list',[BlogController::class,'filter']);
Route::post('/blog-list',[BlogController::class,'list']);
Route::get('/blog/delete',[BlogController::class,'destroy']);

Route::get('/timezone',[CountryController::class,'view']);
Route::post('/timezone',[CountryController::class,'getTime']);