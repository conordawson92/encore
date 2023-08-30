<x-layout>
    <!-- Back Navigation and Title -->
    <div class="flex items-center justify-between m-8">
        <a href="{{ route('admin') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
            <i class="fas fa-user-cog mr-2"></i> Back to Admin Functions
        </a>
        <div class="flex items-center">
            <h1 class="text-4xl font-semibold text-orange_logo ml-4">View Transactions</h1>
            <div class="text-3xl text-orange-500 ml-4">
                🛠
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-10 p-8 bg-white shadow-md rounded-lg">
        <h1 class="text-4xl font-semibold text-orange-500 mb-8">Transactions</h1>

        <!-- Pending Transactions -->
        <h3 class="text-2xl font-semibold mb-4">Pending Transactions</h3>
        @if ($pendingTransactions->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-t border-l rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="bg-gray-200">
                        <th class="p-2 border-b border-r text-left">Item</th>
                        <th class="p-2 border-b border-r text-left">Buyer</th>
                        <th class="p-2 border-b border-r text-left">Seller</th>
                        <th class="p-2 border-b border-r text-left">Date</th>
                        <th class="p-2 border-b border-r text-left">Status</th>
                        <th class="p-2 border-b border-r text-left">Shipping</th>
                        <th class="p-2 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingTransactions as $transaction)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }} hover:bg-gray-200">
                        <td class="p-2 border">{{ $transaction->item->ItemName }}</td>
                        <td class="p-2 border">{{ $transaction->buyer->userName }}</td>
                        <td class="p-2 border">{{ $transaction->seller->userName }}</td>
                        <td class="p-2 border">{{ $transaction->datePurchase }}</td>
                        <td class="p-2 border">{{ $transaction->status }}</td>
                        <td class="p-2 border">{{ $transaction->shippingDetails }}</td>
                        <td class="p-2 border">
                            <form action="{{ route('transactions.cancel', ['transaction' => $transaction->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-orange-600">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-red-500">No pending transactions found.</p>
        @endif

        <div class="border-b border-orange-300 my-4"></div>

        <!-- Finished Transactions -->
        <h3 class="text-2xl font-semibold mb-4">Finished Transactions</h3>
        @if ($finishedTransactions->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-t border-l rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="bg-gray-200">
                        <th class="p-2 border-b border-r text-left">Item</th>
                        <th class="p-2 border-b border-r text-left">Buyer</th>
                        <th class="p-2 border-b border-r text-left">Seller</th>
                        <th class="p-2 border-b border-r text-left">Date</th>
                        <th class="p-2 border-b border-r text-left">Status</th>
                        <th class="p-2 border-b text-left">Shipping</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($finishedTransactions as $transaction)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }} hover:bg-gray-200">
                        <td class="p-2 border">{{ $transaction->item->ItemName }}</td>
                        <td class="p-2 border">{{ $transaction->buyer->userName }}</td>
                        <td class="p-2 border">{{ $transaction->seller->userName }}</td>
                        <td class="p-2 border">{{ $transaction->datePurchase }}</td>
                        <td class="p-2 border">{{ $transaction->status }}</td>
                        <td class="p-2 border">{{ $transaction->shippingDetails }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-red-500">No finished transactions found.</p>
        @endif

        <div class="border-b border-orange-300 my-4"></div>

        <!-- Rejected Transactions -->
        <h3 class="text-2xl font-semibold mb-4">Rejected Transactions</h3>
        @if ($rejectedTransactions->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-t border-l rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="bg-gray-200">
                        <th class="p-2 border-b border-r text-left">Item</th>
                        <th class="p-2 border-b border-r text-left">Buyer</th>
                        <th class="p-2 border-b border-r text-left">Seller</th>
                        <th class="p-2 border-b border-r text-left">Date</th>
                        <th class="p-2 border-b border-r text-left">Status</th>
                        <th class="p-2 border-b text-left">Shipping</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rejectedTransactions as $transaction)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }} hover:bg-gray-200">
                        <td class="p-2 border">{{ $transaction->item->ItemName }}</td>
                        <td class="p-2 border">{{ $transaction->buyer->userName }}</td>
                        <td class="p-2 border">{{ $transaction->seller->userName }}</td>
                        <td class="p-2 border">{{ $transaction->datePurchase }}</td>
                        <td class="p-2 border">{{ $transaction->status }}</td>
                        <td class="p-2 border">{{ $transaction->shippingDetails }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-red-500">No rejected transactions found.</p>
        @endif
    </div>
</x-layout>