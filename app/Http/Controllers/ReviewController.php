<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    //list all the reviews for the admin
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        return view('adminUser.reviews.index', compact('reviews'));
    }

    //edit a review
    public function edit(Review $review)
    {
        return view('adminUser.reviews.edit', compact('review'));
    }

    //update the edit review
    public function update(Request $request, Review $review)
    {
        $review->update([
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('reviews.index')->with('message', 'Review updated successfully and email sent to both users.');
    }

    //delete e specific review
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('message', 'Review deleted successfully and email sent to both users.');
    }

    //add a review 
    public function create($item)
    {
        $item = Item::find($item); // Assuming you're using an Item model
        return view('adminUser.reviews.addReview', compact('item'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id' => 'required|integer',
            'comment' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Retrieve the transaction to get the sellerUser_ID and buyerUser_ID
        $transaction = Transaction::where('item_id', $validatedData['item_id'])->first();

        if (!$transaction) {
            return redirect()->back()->withErrors(['error' => 'No transaction found for the item.']);
        }

        // Check if the authenticated user is the buyer or seller
        if (auth()->id() == $transaction->buyerUser_id) {
            $reviewed_id = $transaction->sellerUser_id;
        } else if (auth()->id() == $transaction->sellerUser_id) {
            $reviewed_id = $transaction->buyerUser_id;
        } else {
            // Handle cases where the authenticated user is neither the buyer nor the seller
            return redirect()->back()->withErrors(['error' => 'Unauthorized review attempt.']);
        }

        Review::create([
            'item_id' => $validatedData['item_id'],
            'comment' => $validatedData['comment'],
            'rating' => $validatedData['rating'],
            'reviewer_id' => auth()->id(),
            'reviewed_id' => $reviewed_id,
            'dateReview' => now(),
        ]);

         
        return redirect()->route('dashboard')->with('message', 'Review added successfully!');
    }

    //store the new rating given/received
    public function storeRating(Request $request) {
        $rating = $request->input('rating');
        $reviewedUserId = $request->input('reviewed_id');
        
        $review = Review::create([
            'reviewer_id' => auth()->user()->id,
            'reviewed_id' => $reviewedUserId,
            'rating' => $rating,
        ]);

        // Calculate and update the user's rating
        $reviewedUser = User::findOrFail($reviewedUserId);
        $reviewedUser->updateRating();
        
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

}
