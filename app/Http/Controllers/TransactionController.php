<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //see all transactions to admin
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        $pendingTransactions = $transactions->where('status', 'pending');
        $finishedTransactions = $transactions->where('status', 'finished');
        $rejectedTransactions = $transactions->where('status', 'rejected');

        return view('adminUser.transactions.index', compact('pendingTransactions', 'finishedTransactions', 'rejectedTransactions'));
    }

    //cancel transaction for admin
    public function cancelTransaction(Transaction $transaction)
    {
        // Update the status to 'rejected'
        $transaction->update(['status' => 'rejected']);

        return redirect()->route('transactions.index')->with('message', 'Transaction canceled successfully, an email was sent to both users.');
    }
}
