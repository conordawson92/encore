<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Review;
use App\Models\Message;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard for all the admin informations and items/transactions/ messages/etc...
    public function dashboard()
    {
        // Get the authenticated admin
        $user = auth()->user();

        // Load user's wishlist items using the wishlist relationship
        $wishlistItems = $user->wishlist;

        // Load user's selling items
        $sellingItems = $user->sellerItems;

        // Load user's selling transactions
        $sellingTransactions = Transaction::where('sellerUser_id', $user->id)
            ->with('item')
            ->get();

       // Load user's buying transactions
        $buyingTransactions = Transaction::where('buyerUser_id', $user->id)
            ->with('item')
            ->get();
            
        // Load user's messages with sender information
        $messagesSented = Message::where('senderUser_id', $user->id)
            ->with(['receiver', 'item'])
            ->get();

        // Load user's messages with receiver information
        $messagesReceived = Message::where('receiverUser_id', $user->id)
        ->with(['sender', 'item'])
        ->get();

        // Load user's notifications
        $notifications = Notification::where('user_id', $user->id)
            ->with(['sender', 'item', 'typeNotification'])
            ->get();

        // Load user's reviews as reviewer 
        $reviewsGiven = Review::where('reviewer_id', $user->id)->get();

        // Load user's reviews as reviewed 
        $reviewsReceived = Review::where('reviewed_id', $user->id)->get();

        // Pass all this data to the dashboard view
        return view('adminUser.dashboard', compact(
            'user',
            'wishlistItems',
            'sellingItems',
            'sellingTransactions',
            'buyingTransactions',
            'messagesSented',
            'messagesReceived',
            'notifications',
            'reviewsGiven',
            'reviewsReceived'
        ));
    }

    //admin manage page
    public function adminFunctionsPage()
    {
        return view('adminUser.admin');
    }

    //list of all users
    public function manageUsersPage()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('adminUser.users', compact('users'));
    }

    //displaying the personnel date from each user
    public function viewUser(User $user)
    {
        // Load user's reviews history
        $reviewsGiven = Review::where('reviewer_id', $user->id)->get();
        $reviewsReceived = Review::where('reviewed_id', $user->id)->get();

        // Load user's finished transactions
        $finishedTransactions = Transaction::where(function ($query) use ($user) {
            $query->where('buyerUser_id', $user->id)
                  ->orWhere('sellerUser_id', $user->id);
        })
        ->whereIn('status', ['finished', 'rejected'])
        ->with('item')
        ->get();

        // Load user's pending transactions
        $pendingTransactions = Transaction::where(function ($query) use ($user) {
            $query->where('buyerUser_id', $user->id)
                ->orWhere('sellerUser_id', $user->id);
        })
        ->whereIn('status', ['pending'])
        ->with('item')
        ->get();

        // Load user's sold items
        $soldItems = Item::where('sellerUser_id', $user->id)
            ->where('status', 'sold')
            ->get();

        // Load user's items for sale
        $itemsForSale = Item::where('sellerUser_id', $user->id)
            ->where('status', 'available')
            ->get();

        return view('adminUser.viewUser', compact(
            'user',
            'reviewsGiven',
            'reviewsReceived',
            'finishedTransactions',
            'pendingTransactions',
            'soldItems',
            'itemsForSale'
        ));
    }

    //cancelling the pending transactions if wanted
    public function cancelTransaction(Transaction $transaction)
    {
        // Update the status of the transaction to "rejected"
        $transaction->update(['status' => 'rejected']);

        return redirect()->back()->with('message', 'Transaction has been canceled and an email was sented to the user.');
    }

    //edit user
    public function editUser(User $user)
    {
        return view('adminUser.editUser', compact('user'));
    }

    //update the new informations in the database
    public function updateUser(Request $request, User $user)
    {
        // Validate and update user information based on form inputs
        $user->update($request->all());

        return redirect()->route('users')->with('message', 'User information has been updated and an email was sented to the user.');
    }

 /*    //banning a specific user method
    public function banUser(Request $request, User $user)
    {
        //
    } */
}