<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
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

    //delete e specific review
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('message', 'Review deleted successfully and email sent to both users.');
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
