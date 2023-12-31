<?php

use App\Models\ParentCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ParentCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Session;



Route::get('/', function () {
    return view('Home.index');
});

// the future page
Route::get('/future', function () {
    return view('future');
});


//LISTINGS
// Displaying all listings(products)
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

// Search and tag filter combined
Route::get('/listings/search', [ListingController::class, 'index'])->name('listings.search');

// Single listing(product)
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Items By Parent Category
Route::get('/parent-category/{parentCategory}', [ListingController::class, 'showItemsByParentCategory'])->name('showItemsByParentCategory');

// Show Items By Category
Route::get('/category/{categoryID}', [ListingController::class, 'showItemsByCategory'])->name('showItemsByCategory');

//USERS
//show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//middleware('guest') checked if we are logged in and prevents

//create new user
Route::post('/users', [UserController::class, 'store']);

//edit user
Route::get('/user/edit', [UserController::class, 'edit'])
    ->middleware('auth')
    ->name('user.edit');

// Update user
Route::put('/user/update', [UserController::class, 'update'])
    ->middleware('auth')
    ->name('user.update');

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//manage user
Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');

//show user dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');


//show new item form
Route::get('/items/createItem', [ItemController::class, 'createItem'])
    ->middleware('auth')
    ->name('items.createItem');

//store the new item in the db
Route::post('/items/storeItem', [ItemController::class, 'storeItem'])
    ->middleware('auth')
    ->name('items.storeItem');

//navbar heart route
Route::get('/wishlistDashboard', [UserController::class, 'wishlistDashboard'])
    ->middleware('auth')
    ->name('wishlistDashboard');

//show user 
Route::get('/user/{user_id}', [UserController::class, 'showProfile'])->name('users.showProfile');



//REVIEWS
//handle updating reviews
Route::post('/submit-review', [ReviewController::class, '']);


//WISHLIST
//remove item from wishlist
Route::delete('/wishlist/remove/{itemId}', [WishlistController::class, 'remove'])
    ->name('wishlist.remove')
    ->middleware('auth');

// Add item to wishlist
Route::post('/wishlist/add/{itemId}', [WishlistController::class, 'addToWishlist'])
    ->name('wishlist.add')
    ->middleware('auth');

Route::post('/wishlist/{itemId}', [WishlistController::class, 'toggleWishlist'])
    ->name('wishlist.toggle')
    ->middleware('auth');

    
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

//edit a selected user
Route::get('/adminUser/users/{user}/edit', [AdminController::class, 'editUser'])
    ->middleware('auth')
    ->name('users.editUser');

// Update user
Route::put('/adminUser/users/{user}', [AdminController::class, 'updateUser'])
    ->middleware('auth')
    ->name('users.updateUser'); 

//ban a user
Route::put('/adminUser/users/{user}/banUser', [AdminController::class, 'banUser'])
    ->middleware('auth')
    ->name('users.banUser');

//have the active and banned users
Route::get('/adminUser/users', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('users.index');

//show the users list
Route::get('/adminUser/users', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('adminUser.users');

//restore a banned user
Route::put('/adminUser/users/{user}/restore', [AdminController::class, 'restoreUser'])
    ->middleware('auth')
    ->name('users.restore');

//list items 
Route::get('/adminUser/items', [AdminController::class, 'manageItems'])->middleware('auth')->name('items.manage');

//editing items
Route::get('/adminUser/editItem/{item}', [AdminController::class, 'editItem'])
    ->middleware('auth')
    ->name('items.edit');

//update the item changed in the db
Route::put('/adminUser/editItem/{item}', [AdminController::class, 'updateItem'])
    ->middleware('auth')
    ->name('items.update');

//delete an item
Route::delete('/adminUser/items/{item}', [AdminController::class, 'destroyItem'])
    ->middleware('auth')
    ->name('items.destroy');


// Add a review 
Route::get('review/add/{item}', [ReviewController::class, 'create'])->name('review.create');

// Store the review in the database
Route::post('/adminUser/reviews', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('reviews.store');

//list all reviews
Route::get('/adminUser/reviews', [ReviewController::class, 'index'])
    ->middleware('auth')
    ->name('reviews.index');

//edit the review
Route::get('/adminUser/reviews/{review}/edit', [ReviewController::class, 'edit'])
    ->middleware('auth')
    ->name('reviews.edit');

//update the modify review in the db
Route::put('/adminUser/reviews/{review}', [ReviewController::class, 'update'])
    ->middleware('auth')
    ->name('reviews.update');

//delete the review
Route::delete('/adminUser/reviews/{review}', [ReviewController::class, 'destroy'])
    ->middleware('auth')
    ->name('reviews.destroy');

//see all transactions
Route::get('/adminUser/transactions', [TransactionController::class, 'index'])
    ->middleware('auth')
    ->name('transactions.index');

//cancel pending transactions
Route::patch('/adminUser/transactions/{transaction}/cancel', [TransactionController::class, 'cancelTransaction'])
    ->middleware('auth')
    ->name('transactions.cancel');



//our mission
Route::get('/our-mission', function () {
    return view('components/our_mission');
});


// our platform
Route::get('/our-platform', function () {
    return view('components/our_platform');
});

// FAQ
Route::get('/faq', function () {
    return view('platform/faq');
});

//Stripe API checkout
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
Route::get('stripe/checkout', [CartController::class, 'checkout'])->name('stripe.checkout');


//show Items By Parent Category
Route::get('/parent-category/{parentCategory}', [ListingController::class, 'showItemsByParentCategory'])->name('showItemsByParentCategory');

// About us page
Route::get('/about', [AboutController::class, 'index']);

// Platform - Contact us
Route::get('/platform', [PlatformController::class, 'index']);

//SHOPPING CART
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.cart');
    // Add items to the cart
    Route::post('/cart/add/{item}', [CartController::class, 'addToCart'])->name('cart.add');
    // Update cart item quantity
    Route::patch('/cart/update/{cart}', [CartController::class, 'updateCartItem'])->name('cart.update');
    // Remove item from the cart
    Route::delete('/cart/remove/{cart}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    //Buy button
    Route::post('/cart/add-redirect/{item}', [CartController::class, 'addToCartAndRedirect'])->name('cart.addAndRedirect');
});
