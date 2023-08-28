<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
{
    $user = auth()->user();
    $cartItems = Cart::where('user_id', $user->id)->with('item')->get();

    return view('components.cart', compact('cartItems'));
}

    public function addToCart(Item $item)
{
    $user = auth()->user();
    
    $cartItem = Cart::where('user_id', $user->id)
        ->where('item_id', $item->id)
        ->first();

    if ($cartItem) {
        $cartItem->quantity++;
        $cartItem->save();
    } else {
        $cartItem = new Cart([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'quantity' => 1,
        ]);
        $cartItem->save();
    }

    return redirect()->back()->with('success', 'Item added to cart.');
}

public function updateCartItem(Request $request, Cart $cart)
{
    $cart->update(['quantity' => $request->quantity]);
    return redirect()->back()->with('success', 'Cart item updated.');
}

public function removeFromCart(Cart $cart)
{
    $cart->delete();
    return redirect()->back()->with('success', 'Item removed from cart.');
}


public function checkout()
{
    $user = auth()->user();
    $cartItems = Cart::where('user_id', $user->id)->with('item')->get();
    $totalAmount = $cartItems->sum(function ($cartItem) {
        return $cartItem->quantity * $cartItem->item->price;
    });

    return view('api.stripe', compact('cartItems', 'totalAmount'));
}

}
