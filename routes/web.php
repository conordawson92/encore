<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ParentCategoryController;
use App\Models\ParentCategory;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});

//Displaying all listings(products)
Route::get('/listings', [ListingController::class, 'index']);

//Single listing(product)
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



//ADMIN
//show admin personnel dashboard
Route::get('/adminUser/dashboard', [AdminController::class, 'dashboard'])->middleware('auth')->name('dashboard');

//show list of managements
Route::get('/adminUser/admin', [AdminController::class, 'adminFunctionsPage'])->middleware('auth')->name('admin');

//show users management
Route::get('/adminUser/users', [AdminController::class, 'manageUsersPage'])->middleware('auth')->name('users');

//show a selectioned user
Route::get('/adminUser/users/{user}', [AdminController::class, 'viewUser'])->middleware('auth')->name('admin.users.view');

//cancelling transactions
Route::patch('/adminUser/transactions/{transaction}/cancel', [AdminController::class, 'cancelTransaction'])
    ->middleware('auth')
    ->name('transactions.cancel');

//edit a selectioned user
Route::get('/adminUser/users/{user}/edit', [AdminController::class, 'editUser'])
    ->middleware('auth')
    ->name('users.edit');
    
// Update user
Route::put('/adminUser/users/{user}', [AdminController::class, 'updateUser'])
->middleware('auth')
->name('users.update');

//ban an specific user
Route::delete('/adminUser/users/{user}', [AdminController::class, 'banUser'])
    ->middleware('auth')
    ->name('users.banUser');



//layout

Route::get('/layout', function () {
    return view('components/layout');
});


//Stripe API checkout
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

//Searchbar filter
Route::get('/search', [ListingController::class, 'search'])->name('search');

