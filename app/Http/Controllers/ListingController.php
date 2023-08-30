<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ParentCategory;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        $query = Item::where('status', 'available')->filter(request(['search', 'tag'])); // Filtering first.
        
        $query = $this->applySorting($query); // Sorting next.
        
        return view('listings.index', [
            'listings' => $query->paginate(10)->appends(request()->all()), // appends ensures the current request params are added.
        ]);
    }

    //show a single listing
    public function show(Item $listing)
    {
        $listingUser = User::find($listing->sellerUser_id);
        return view('listings.show', [
            'listing' => $listing,
            'listingUser' => $listingUser
        ]);
    }

    //show Items By Parent Category
    public function showItemsByParentCategory($parentCategory)
    {
        $query = Item::where('status', 'available')->whereHas('category', function ($query) use ($parentCategory) {
            $query->where('parentCategory_id', $parentCategory);
        });

        $query = $this->applySorting($query);

        return view('listings.index', [
            'listings' => $query->paginate(10),
        ]);
    }

    public function showItemsByCategory($categoryID)
    {
        $query = Item::where('status', 'available')->whereHas('category', function ($query) use ($categoryID) {
            $query->where('category_id', $categoryID);
        })->inRandomOrder();
        
        $query = $this->applySorting($query);

        return view('listings.index', [
            'listings' => $query->paginate(10),
        ]);
    }

    // Private method to handle sorting logic
    private function applySorting($query)
    {
        $sort = request('sort');

        if ($sort == 'priceAsc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort == 'priceDesc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort == 'newest') {
            $query->orderBy('dateListed', 'desc');
        } elseif ($sort == 'oldest') {
            $query->orderBy('dateListed', 'asc');
        } else {
            $query->latest();  // Default sort
        }

        return $query;
    }

    //filtering tags and search bar
    public function filter($query, array $filters)
    {
        return $query->filter($filters);
    }
    
}
