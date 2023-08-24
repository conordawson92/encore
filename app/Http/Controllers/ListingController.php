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

            'listings' => Item::latest()->filter(request(['tag', 'search'])),
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




}
