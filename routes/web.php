<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ParentCategoryController;
use App\Models\ParentCategory;

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

//Displaying all listings
Route::get('/listings', [ListingController::class, 'index']);

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);




//USERS
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

//show user profile
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');


//WISHLIST
//add item to wishlist
Route::post('/wishlist/add/{item}', [WishlistController::class, 'addToWishlist'])->middleware('auth');

//remove item from wishlist
Route::post('/wishlist/remove/{item}', [WishlistController::class, 'removeFromWishlist'])->middleware('auth');



//layout

Route::get('/layout', function () {
    return view('components/layout');
});


//API fake store
Route::get('/products', [ApiController::class, 'apiFakeStore']);

//Stripe API checkout
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
