<head>
    <title>Encore | Transactions</title>
</head>

<a href="/adminUser/admin" class="text-laravel hover:underline">Back to Admin Functions</a>
<x-layout>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-4xl font-semibold text-orange_logo_light">Transactions</h1>
            <a href="{{ route('admin') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                <i class="fas fa-user-cog mr-2"></i> Back to Admin Functions
            </a>
        </div>


        <!-- Display user's pending transactions with cancel button-->
        <h3 class="text-xl font-medium mb-3">Pending Transactions</h3>
        @if ($pendingTransactions->count() > 0)
        <table class="w-full border-collapse border border-gray-300 mb-5">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Item</th>
                    <th class="border p-2">Buyer</th>
                    <th class="border p-2">Seller</th>
                    <th class="border p-2">Date</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Shipping</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingTransactions as $transaction)
                <tr>
                    <td class="border p-2">{{ $transaction->item->ItemName }}</td>
                    <td class="border p-2">{{ $transaction->buyer->userName }}</td>
                    <td class="border p-2">{{ $transaction->seller->userName }}</td>
                    <td class="border p-2">{{ $transaction->datePurchase }}</td>
                    <td class="border p-2">{{ $transaction->status }}</td>
                    <td class="border p-2">{{ $transaction->shippingDetails }}</td>
                    <td class="border p-2">
                        <form action="{{ route('transactions.cancel', ['transaction' => $transaction->id]) }}" method="POST">
                            @csrf
                            @method('PATCH') <!-- Use PATCH method for updating -->
                            <button type="submit" class="bg-orange-500 text-white py-1 px-3 rounded hover:bg-orange-600 transition-all duration-300">Cancel</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No pending transactions found.</p>
        @endif
        <!-- Finished Transactions -->
        <h3 class="text-xl font-medium mb-3">Finished Transactions</h3>
        @if ($finishedTransactions->count() > 0)
        <table class="w-full border-collapse border border-gray-300 mb-5">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Item</th>
                    <th class="border p-2">Buyer</th>
                    <th class="border p-2">Seller</th>
                    <th class="border p-2">Date</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Shipping</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finishedTransactions as $transaction)
                <tr>
                    <td class="border p-2">{{ $transaction->item->ItemName }}</td>
                    <td class="border p-2">{{ $transaction->buyer->userName }}</td>
                    <td class="border p-2">{{ $transaction->seller->userName }}</td>
                    <td class="border p-2">{{ $transaction->datePurchase }}</td>
                    <td class="border p-2">{{ $transaction->status }}</td>
                    <td class="border p-2">{{ $transaction->shippingDetails }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="mb-5">No finished transactions found.</p>
        @endif

        <!-- Rejected Transactions -->
        <h3 class="text-xl font-medium mb-3">Rejected Transactions</h3>
        @if ($rejectedTransactions->count() > 0)
        <table class="w-full border-collapse border border-gray-300 mb-5">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Item</th>
                    <th class="border p-2">Buyer</th>
                    <th class="border p-2">Seller</th>
                    <th class="border p-2">Date</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Shipping</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rejectedTransactions as $transaction)
                <tr>
                    <td class="border p-2">{{ $transaction->item->ItemName }}</td>
                    <td class="border p-2">{{ $transaction->buyer->userName }}</td>
                    <td class="border p-2">{{ $transaction->seller->userName }}</td>
                    <td class="border p-2">{{ $transaction->datePurchase }}</td>
                    <td class="border p-2">{{ $transaction->status }}</td>
                    <td class="border p-2">{{ $transaction->shippingDetails }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="mb-5">No rejected transactions found.</p>
        @endif

    </div>
</x-layout>