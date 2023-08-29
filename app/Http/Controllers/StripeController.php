<?php
namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Cart;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('api.stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

     public function stripePost(Request $request)
     {
         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         Stripe\Charge::create ([
             "amount" => $request->total_amount * 100, // Convert to cents
             "currency" => "eur",
             "source" => $request->stripeToken,
             "description" => "Test payment"
         ]);
     
         // Mark the cart items as purchased
         $cartItemIds = $request->input('cart_items', []);
         Cart::whereIn('id', $cartItemIds)->delete();
     
         // Flash success message
         Session::flash('success', 'Payment successful! Thanks for your purchase with Encore.');
     
         return redirect('/adminUser/dashboard');
     }
}

