<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ListingController;


Route::get('/', function () {
    return view('welcome');
});

//Displaying all listings(products)
Route::get('/listings', [ListingController::class, 'index']);

//Single listing(product)
Route::get('/listings/{listing}', [ListingController::class, 'show']);

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


//show edit user form
Route::get('/users/edit', [UserController::class, 'manage'])->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');


//update user
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');


Route::get('/layout', function () {
    return view('components/layout');
});


//Stripe API checkout
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
