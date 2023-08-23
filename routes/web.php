<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


//show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//middleware('guest') checked if we are logged in and prevents

//create new user
Route::post('/users', [UserController::class, 'store']);


//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//manage user
Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');

//show edit user form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

//update user in db
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');


//layout
Route::get('/layout', function () {
    return view('components/layout');
});