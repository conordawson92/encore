<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

Route::get('/products', [ApiController::class, 'index']);


