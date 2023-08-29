<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Review;
use App\Models\Message;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $activeUsers;
    protected $bannedUsers;
    
    //index method to show active and banned users
    public function index()
    {
        $activeUsers = User::where('banUser', false)->get();
        $bannedUsers = User::where('banUser', true)->get();

        return view('adminUser.users', compact('activeUsers', 'bannedUsers'));
    }

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

        return redirect()->route('adminUser.users')->with('message', 'User information has been updated.');
    }

    //banning a specific user method
    public function banUser(User $user)
    {
        // Update the user's banned status and put a date on
        $user->update([
            'banUser' => true,
            'deleted_at' => now(), 
        ]);

        // Cancel user's pending transactions
        $pendingTransactions = Transaction::where('buyerUser_id', $user->id)
        ->where('status', 'pending')
        ->get();
        foreach ($pendingTransactions as $transaction) {
            $transaction->update(['status' => 'rejected']);
        }

        // Loop through the user's items
        foreach ($user->sellerItems as $item) {
            // Update or delete items depending on the user's role
            $item->update(['sellerUser_id' => 1]);
        }
        foreach ($user->buyerItems as $item) {
            $item->update(['buyerUser_id' => 1]);
        }
    
        //log the user out if they are currently logged in
        if (Auth::check() && Auth::user()->id === $user->id) {
            Auth::logout();
        }

        return redirect()->route('adminUser.users')->with('message', 'User has been banned and an email was sented to the user.');
    }

    //restore a banned user
    public function restoreUser(User $user)
    {
        $user->update(['banUser' => false]);
        return redirect()->route('adminUser.users')->with('message', 'User has been restored and an email was sent to the user.');

    }

    //see all the items from the site
    public function manageItems()
    {
        // Retrieve all items
        $items = Item::all(); 

        return view('adminUser.items', compact('items'));
    }

    //edit a specific item
    public function editItem(Item $item)
    {
        $categories = Category::all();
        $possibleConditions = ['new', 'used', 'very used'];

        // Generate the $categoryMap
        $categoryMap = [];
        foreach ($categories as $category) {
            if (!isset($categoryMap[$category->parentCategory_id])) {
                $categoryMap[$category->parentCategory_id] = [];
            }
            $categoryMap[$category->parentCategory_id][] = [
                'id' => $category->id,
                'category_name' => $category->category_name,
            ];
        }
        
        return view('adminUser.editItem', [
            'item' => $item,
            'possibleConditions' => $possibleConditions,
            'categories' => $categories,
            'categoryMap' => $categoryMap, // Pass the category map to the view
        ]);
    }

    //update the changes in the db
    public function updateItem(Request $request, Item $item)
    {
        $item->update([
            'itemImage' => $request->input('itemImage'),
            'ItemName' => $request->input('ItemName'),
            'description' => $request->input('description'),
            'size' => $request->input('size'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'condition' => $request->input('condition'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('items.manage')->with('message', 'Item updated successfully and email sent to the user.');
    }

    //delete (hide) an item
    public function destroyItem(Item $item)
    {
        // change the status of the item to unavailable (Delete the item)
        $item->update(['status' => 'unavailable']);

        return redirect()->back()->with('message', 'Item deleted successfully.');
}


}