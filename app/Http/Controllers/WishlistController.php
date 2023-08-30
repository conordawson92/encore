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
    public function addToWishlist(Request $request, $itemId)
{
    $user = auth()->user();
    $item = Item::findOrFail($itemId);

    // Check if the item is already in the user's wishlist
    if ($user->wishlist->contains($item)) {
        return redirect()->back()->with('message', "'{$item->ItemName}' is already in your wishlist.");
    }

    $user->wishlist()->attach($item);

    return redirect()->back()->with('message', "'{$item->ItemName}' added to wishlist successfully.");
}


    

    //method to remove an item from the wishlist
    public function remove($itemId)
    {
        $user = auth()->user();

        // Find the item in the user's wishlist
        $item = $user->wishlist->find($itemId);

        if (!$item) {
            return redirect()->back()->with('error', 'Item not found in wishlist.');
        }

        // Remove the item from the wishlist
        $user->wishlist()->detach($item);

        return redirect()->back()->with('message', 'Item removed from wishlist.');
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
