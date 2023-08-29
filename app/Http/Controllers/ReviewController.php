<?php

namespace App\Http\Controllers;

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

    //update the edit review
    public function update(Request $request, Review $review)
    {
        $review->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('reviews.index')->with('message', 'Review updated successfully and email sent to both users.');
    }

    //delete e specific review
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('message', 'Review deleted successfully and email sent to both users.');
    }
}
