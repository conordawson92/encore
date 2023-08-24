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
    public function addToWishlist(Request $request, Item $item)
    {
        $user = auth()->user();

        // Check if the item is already in the user's wishlist
        if (!$user->wishlist->contains($item)) {
            $user->wishlist()->attach($item);
        }

        return redirect()->back()->with('message', 'Item added to wishlist successfully.');
    }

    //method to remove an item from the wishlist
    public function removeFromWishlist(Request $request, Item $item)
    {
        $user = auth()->user();

        // Check if the item is in the user's wishlist
        if ($user->wishlist->contains($item)) {
            $user->wishlist()->detach($item);
        }

        return redirect()->back()->with('message', 'Item removed from wishlist successfully.');
    }

    //method to clear all the items from the wishlist
    public function clearWishlist()
    {
        $user = auth()->user();

        // Detach all items from the user's wishlist
        $user->wishlist()->detach();

        return redirect()->back()->with('message', 'Wishlist cleared successfully.');
    }

}
