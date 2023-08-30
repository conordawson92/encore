    <x-layout>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Encore | User View</title>
        </head>

        <body class="bg-orange-100">

            <div class="flex items-center justify-between m-8">
                <a href="{{ route('adminUser.users') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                    <i class="fas fa-user-cog mr-2"></i> Back to User List
                </a>
                <div class="flex items-center">
                    <h1 class="text-4xl font-semibold text-orange_logo ml-4">View User</h1>
                    <div class="text-3xl text-orange-500 ml-4">
                        🛠
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg w-full md:w-1/2 mx-auto">
                <h2 class="text-4xl font-semibold text-orange-500 mb-8">User Information</h2>
                <img src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo" class="w-32 h-32 rounded-full mb-4">
                <p><strong>Name:</strong> {{ $user->userName }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Joined Date:</strong> {{ $user->dateJoined }}</p>
                <p><strong>Location:</strong> {{ $user->userLocation }}</p>
                <p><strong>Phone:</strong> {{ $user->userPhone }}</p>
                <p><strong>Preferencial Payment:</strong> {{ $user->paymentInfo }}</p>
                <p><strong>Rating:</strong> {{ $user->userRating }}</p>


                <!--users history information-->
                <!--ITEMS-->
                <!-- display users items sold-->
                <!-- Sold Items Section -->
                <div class="container mx-auto mt-10">
                    <h2 class="text-4xl font-semibold text-orange-500 mb-8">Sold Items</h2>

                    @if ($soldItems->count() > 0)
                    <div class="bg-white p-8 rounded-lg shadow-lg w-full md:w-3/4 mx-auto">
                        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Item</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Category</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Sub-Category</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Size</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Description</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Price</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Brand</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Condition</th>
                                    <th class="p-3 border-b border-r border-gray-300 text-left">Quantity</th>
                                    <th class="p-3 border-b border-gray-300 text-left">Date Listed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soldItems as $item)
                                <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }} hover:bg-gray-200">
                                    <td class="p-2 border border-gray-300 flex items-center">
                                        <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->ItemName }} Image" class="w-12 h-12 rounded-full mr-2">
                                        {{ $item->ItemName }}
                                    </td>
                                    <td class="p-2 border border-gray-300">{{ optional($item->category->parentCategory)->categoryName }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->category->categoryName }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->size }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->description }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->price }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->brand }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->condition }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->quantity }}</td>
                                    <td class="p-2 border border-gray-300">{{ $item->dateListed }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>

                <!-- Items for Sale Section -->
                <div class="p-6 bg-white rounded-lg shadow-lg mb-4 overflow-auto" style="max-height: 400px;">
                    <h2 class="text-2xl font-semibold text-orange-500 mb-4">Items for Sale</h2>
                    @if ($itemsForSale->count() > 0)
                    <table class="min-w-full bg-white border-t border-l rounded-lg text-sm">
                        <thead class="border-b">
                            <tr>
                                <th class="p-2 border-r">Item</th>
                                <th class="p-2 border-r">Parent Category</th>
                                <th class="p-2 border-r">Category</th>
                                <th class="p-2 border-r">Size</th>
                                <th class="p-2 border-r">Description</th>
                                <th class="p-2 border-r">Price</th>
                                <th class="p-2 border-r">Brand</th>
                                <th class="p-2 border-r">Condition</th>
                                <th class="p-2 border-r">Quantity</th>
                                <th class="p-2">Date Listed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemsForSale as $item)
                            <tr class="border-b">
                                <td class="p-2 border-r">
                                    <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->ItemName }} Image" width="50">
                                    {{ $item->ItemName }}
                                </td>
                                <td class="p-2 border-r">{{ optional($item->category->parentCategory)->categoryName }}</td>
                                <td class="p-2 border-r">{{ $item->category->categoryName }}</td>
                                <td class="p-2 border-r">{{ $item->size }}</td>
                                <td class="p-2 border-r">{{ $item->description }}</td>
                                <td class="p-2 border-r">{{ $item->price }}</td>
                                <td class="p-2 border-r">{{ $item->brand }}</td>
                                <td class="p-2 border-r">{{ $item->condition }}</td>
                                <td class="p-2 border-r">{{ $item->quantity }}</td>
                                <td class="p-2">{{ $item->dateListed }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No items for sale.</p>
                    @endif
                </div>

                <!-- Line Separator -->
                <div class="border-b border-orange-300 my-4"></div>

                <!-- Reviews Section -->
                <div class="my-8">
                    <h2 class="text-4xl font-semibold text-orange-500 mb-8">Reviews</h2>

                    <div class="rounded-lg shadow-lg p-6 bg-white overflow-auto" style="max-height: 400px;">
                        <!-- Reviews Sent -->
                        <h3 class="text-2xl font-semibold text-orange-500 mb-4">Sent</h3>
                        @if ($reviewsGiven->count() > 0)
                        <div class="border-t border-b border-gray-200 mb-4">
                            @foreach ($reviewsGiven as $review)
                            <div class="border-b border-gray-200 py-2">
                                <p><strong>To:</strong> {{ $review->item->seller->userName }}</p>
                                <p><strong>Item:</strong> {{ $review->item->ItemName }}</p>
                                <p><strong>Date of Purchase:</strong> {{ $review->dateReview }}</p>
                                <p><strong>Comment:</strong> {{ $review->comment }}</p>
                                <p><strong>Rating:</strong> {{ $review->rating }}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-gray-500">No reviews sent.</p>
                        @endif

                        <!-- Reviews Received -->
                        <h3 class="text-2xl font-semibold text-orange-500 mb-4">Received</h3>
                        @if ($reviewsReceived->count() > 0)
                        <div class="border-t border-b border-gray-200">
                            @foreach ($reviewsReceived as $review)
                            <div class="border-b border-gray-200 py-2">
                                <p><strong>From:</strong> {{ $review->item->seller->userName }}</p>
                                <p><strong>Item:</strong> {{ $review->item->ItemName }}</p>
                                <p><strong>Date of Purchase:</strong> {{ $review->dateReview }}</p>
                                <p><strong>Comment:</strong> {{ $review->comment }}</p>
                                <p><strong>Rating:</strong> {{ $review->rating }}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-gray-500">No reviews received.</p>
                        @endif
                    </div>
                </div>

                <!-- Transactions Section -->
                <div class="my-8">
                    <h2 class="text-4xl font-semibold text-orange-500 mb-8">Transactions</h2>

                    <div class="rounded-lg shadow-lg p-6 bg-white overflow-auto" style="max-height: 400px;">
                        <!-- Finished Transactions -->
                        <h3 class="text-2xl font-semibold text-orange-500 mb-4">Finished Transactions</h3>
                        @if ($finishedTransactions->count() > 0)
                        <div class="border-t border-b border-gray-200 mb-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody>
                                    @foreach ($finishedTransactions as $transaction)
                                    <tr class="bg-white">
                                        <td class="px-4 py-2">Item: {{ $transaction->item->ItemName }}</td>
                                        <td class="px-4 py-2">Buyer: {{ $transaction->buyer->userName }}</td>
                                        <td class="px-4 py-2">Seller: {{ $transaction->seller->userName }}</td>
                                        <td class="px-4 py-2">Date: {{ $transaction->datePurchase }}</td>
                                        <td class="px-4 py-2">Status: {{ $transaction->status }}</td>
                                        <td class="px-4 py-2">Shipping: {{ $transaction->shippingDetails }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-gray-500">No finished transactions found.</p>
                        @endif

                        <!-- Pending Transactions -->
                        <h3 class="text-2xl font-semibold text-orange-500 mb-4">Pending Transactions</h3>
                        @if ($pendingTransactions->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-4 py-2">Item</th>
                                    <th class="px-4 py-2">Buyer</th>
                                    <th class="px-4 py-2">Seller</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Shipping</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pendingTransactions as $transaction)
                                <tr>
                                    <td class="px-4 py-2">{{ $transaction->item->ItemName }}</td>
                                    <td class="px-4 py-2">{{ $transaction->buyer->userName }}</td>
                                    <td class="px-4 py-2">{{ $transaction->seller->userName }}</td>
                                    <td class="px-4 py-2">{{ $transaction->datePurchase }}</td>
                                    <td class="px-4 py-2">{{ $transaction->status }}</td>
                                    <td class="px-4 py-2">{{ $transaction->shippingDetails }}</td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('transactions.cancel', ['transaction' => $transaction->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Cancel</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="text-gray-500">No pending transactions found.</p>
                        @endif
                    </div>
                </div>

        </body>

        </html>
    </x-layout>