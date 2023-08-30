<x-layout>
    <!-- Back Navigation and Title -->
    <div class="flex items-center justify-between m-8">
        <a href="/adminUser/admin" class="text-laravel hover:underline">Back to Admin Functions</a>
        <div class="flex items-center">
            <h1 class="text-4xl font-semibold text-orange_logo ml-4">View Transactions</h1>
            <div class="text-6xl text-orange-500 ml-4">
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
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border">Item</th>
                    <th class="border">Buyer</th>
                    <th class="border">Seller</th>
                    <th class="border">Date</th>
                    <th class="border">Status</th>
                    <th class="border">Shipping</th>
                    <th class="border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingTransactions as $transaction)
                <tr>
                    <td class="border">{{ $transaction->item->ItemName }}</td>
                    <td class="border">{{ $transaction->buyer->userName }}</td>
                    <td class="border">{{ $transaction->seller->userName }}</td>
                    <td class="border">{{ $transaction->datePurchase }}</td>
                    <td class="border">{{ $transaction->status }}</td>
                    <td class="border">{{ $transaction->shippingDetails }}</td>
                    <td class="border">
                        <form action="{{ route('transactions.cancel', ['transaction' => $transaction->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-blue-500 hover:text-blue-700">Cancel</button>
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
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border">Item</th>
                    <th class="border">Buyer</th>
                    <th class="border">Seller</th>
                    <th class="border">Date</th>
                    <th class="border">Status</th>
                    <th class="border">Shipping</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finishedTransactions as $transaction)
                <tr>
                    <td class="border">{{ $transaction->item->ItemName }}</td>
                    <td class="border">{{ $transaction->buyer->userName }}</td>
                    <td class="border">{{ $transaction->seller->userName }}</td>
                    <td class="border">{{ $transaction->datePurchase }}</td>
                    <td class="border">{{ $transaction->status }}</td>
                    <td class="border">{{ $transaction->shippingDetails }}</td>
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
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border">Item</th>
                    <th class="border">Buyer</th>
                    <th class="border">Seller</th>
                    <th class="border">Date</th>
                    <th class="border">Status</th>
                    <th class="border">Shipping</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rejectedTransactions as $transaction)
                <tr>
                    <td class="border">{{ $transaction->item->ItemName }}</td>
                    <td class="border">{{ $transaction->buyer->userName }}</td>
                    <td class="border">{{ $transaction->seller->userName }}</td>
                    <td class="border">{{ $transaction->datePurchase }}</td>
                    <td class="border text-red-500">{{ $transaction->status }}</td>
                    <td class="border">{{ $transaction->shippingDetails }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-red-500">No rejected transactions found.</p>
    @endif
        </x-layout>



