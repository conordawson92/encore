<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\ParentCategory;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        
        return view('listings.index', [

            'listings' => Item::all(),
        ]);
    }

    //show a single listing
    public function show(Item $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show Items By Parent Category
    public function showItemsByParentCategory($parentCategoryId)
    {
        $parentCategory = ParentCategory::findOrFail($parentCategoryId);
        $items = Item::whereHas('category', function ($query) use ($parentCategoryId) {
            $query->where('parentCategory_id', $parentCategoryId);
        })->get();

        return view('listings.index', [
            'listings' => $items
        ]);
    }

        public function search(Request $request)
    {
        $query = $request->input('query');
        
        $listings = Item::where('ItemName', 'LIKE', '%' . $query . '%')
                        ->orWhere('description', 'LIKE', '%' . $query . '%')
                        ->orWhere('price', 'LIKE', '%' . $query . '%')
                        ->orWhere('size', 'LIKE', '%' . $query . '%')
                        ->orWhere('brand', 'LIKE', '%' . $query . '%')
                        ->get();

        return view('listings.index', [
            'listings' => $listings
        ]);
    }

    public function filterByTag($tag)
    {
        $listings = Item::where('tags', 'LIKE', '%' . $tag . '%')->get();
        
        return view('listings.index', [
            'listings' => $listings
        ]);
    }


}
