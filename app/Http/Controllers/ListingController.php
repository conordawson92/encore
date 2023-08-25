<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\ParentCategory;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Item::latest()->filter(request(['search', 'tag']))->paginate(10),
        ]);
    }

    //show a single listing
    public function show(Item $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show Items By Parent Category
    public function showItemsByParentCategory($parentCategory)
    {
        $items = Item::whereHas('category', function ($query) use ($parentCategory) {
            $query->where('parentCategory_id', $parentCategory);
        })->paginate(10);

        return view('listings.index', [
            'listings' => $items,
        ]);
    }

    public function showItemsByCategory($category_name)
{
    $items = Item::whereHas('category', function ($query) use ($category_name) {
        $query->where('category_name', $category_name); // Assuming the column name is 'category_name'
    })->paginate(10);

    return view('listings.index', [
        'listings' => $items,
    ]);
}



    //filtering tags and search bar
    public function filter($query, array $filters)
    {
        return $query->filter($filters);
    }

}
