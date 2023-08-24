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
            // ->filter(request(['tag', 'search']))
        ]);
    }

    //show a single listing
    public function show(Item $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $listings = Item::where('ItemName', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->get();

    return view('listings.index', compact('listings'));
}


}
