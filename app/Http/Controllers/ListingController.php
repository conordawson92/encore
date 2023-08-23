<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        
        return view('listings.index', [

            'listings' => Item::all()
            
        ]);
    }

    //show a single listing
    public function show(Item $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }


}
