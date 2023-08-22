<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //method to show all the items in the wishlist 
    public function show(Wishlist $wishlist)
    {
        $items = Item::all();
        return view('wishlists.show', [
            'items'=>$items,
            'wishlist'=> $wishlist
        ]);
    }

    //method to add an item to the wishlist
    public function addToWishList()
    {
        
    }

    //method to remove an item from the wishlist
    public function removeFromCart()
    {

    }

    //method to clear all the items from the wishlist
    public function clearWishlist()
    {
        
    }

}
