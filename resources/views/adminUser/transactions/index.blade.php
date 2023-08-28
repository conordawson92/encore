<a href="/adminUser/admin" class="text-laravel hover:underline">Back to Admin Functions</a>

<h1>Transactions</h1>

<!-- Display user's pending transactions with cancel button-->
<h3>Pending Transactions</h3>
@if ($pendingTransactions->count() > 0)
<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Buyer</th>
            <th>Seller</th>
            <th>Date</th>
            <th>Status</th>
            <th>Shipping</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendingTransactions as $transaction)
        <tr>
            <td>{{ $transaction->item->ItemName }}</td>
            <td>{{ $transaction->buyer->userName }}</td>
            <td>{{ $transaction->seller->userName }}</td>
            <td>{{ $transaction->datePurchase }}</td>
            <td>{{ $transaction->status }}</td>
            <td>{{ $transaction->shippingDetails }}</td>
            <td>
                <form action="{{ route('transactions.cancel', ['transaction' => $transaction->id]) }}" method="POST">
                    @csrf
                    @method('PATCH') <!-- Use PATCH method for updating -->
                    <button type="submit">Cancel</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No pending transactions found.</p>
@endif

<h3>Finished Transactions</h3>
@if ($finishedTransactions->count() > 0)
    <table>
        @foreach ($finishedTransactions as $transaction)
            <tr>
                <td>Item: {{ $transaction->item->ItemName }}</td>
                <td>Buyer: {{ $transaction->buyer->userName }}</td>
                <td>Seller: {{ $transaction->seller->userName }}</td>
                <td>Date: {{ $transaction->datePurchase }}</td>
                <td>Status: {{ $transaction->status }}</td>
                <td>Shipping: {{ $transaction->shippingDetails }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>No finished transactions found.</p>
@endif

<h3>Rejected Transactions</h3>
@if ($rejectedTransactions->count() > 0)
    <table>
        @foreach ($rejectedTransactions as $transaction)
            <tr>
                <td>Item: {{ $transaction->item->ItemName }}</td>
                <td>Buyer: {{ $transaction->buyer->userName }}</td>
                <td>Seller: {{ $transaction->seller->userName }}</td>
                <td>Date: {{ $transaction->datePurchase }}</td>
                <td>Status: {{ $transaction->status }}</td>
                <td>Shipping: {{ $transaction->shippingDetails }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>No rejected transactions found.</p>
@endif