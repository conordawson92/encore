<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        // Fazendo uma requisição à API
        $response = Http::get('https://fakestoreapi.com/products');
        $products = $response->json();

        return view('api.index', compact('products'));
    }
}

