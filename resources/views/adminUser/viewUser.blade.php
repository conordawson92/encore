    <x-layout>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Encore | User View</title>
        </head>

        <body>
            <a href="/adminUser/users">Back to User List</a>
            <h1>View User</h1>

            <!--users personnel information-->
            <h2>User Information</h2>
            <img src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo">
            <p>Name: {{ $user->userName }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Joined Date: {{ $user->dateJoined }}</p>
            <p>Location: {{ $user->userLocation }}</p>
            <p>Phone: {{ $user->userPhone }}</p>
            <p>Preferencial Payment: {{ $user->paymentInfo }}</p>
            <p>Rating: {{ $user->userRating }}</p>


            <!--users history information-->
            <!--ITEMS-->
            <!-- display users items sold-->
            <h2>Sold Items</h2>
            @if ($soldItems->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($soldItems as $item)
                    <tr>
                        <<td>
                            <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->ItemName }} Image" width="50">
                            {{ $item->ItemName }}
                            </td>
                            <td>{{ optional($item->category->parentCategory)->categoryName }}</td>
                            <td>{{ $item->category->categoryName }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->condition }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->dateListed }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No sold items.</p>
            @endif

            <!-- Display user's items for sale -->
            <h2>Items for Sale</h2>
            @if ($itemsForSale->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itemsForSale as $item)
                    <tr>
                        <<td>
                            <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->ItemName }} Image" width="50">
                            {{ $item->ItemName }}
                            </td>
                            <td>{{ optional($item->category->parentCategory)->categoryName }}</td>
                            <td>{{ $item->category->categoryName }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->condition }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->dateListed }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No items for sale.</p>
            @endif

            <!--REVIEWS-->
            <h2>Reviews</h2>
            <h3>Sented</h3>
            @if ($reviewsGiven->count() > 0)
            <table>
                @foreach ($reviewsGiven as $review)
                <p>To: {{ $review->item->seller->userName }}</p>
                <p>Item: {{ $review->item->ItemName }}</p>
                <p>Date of Purchase: {{ $review->dateReview }}</p>
                <p>Comment: {{ $review->comment }}</p>
                <p>Rating: {{ $review->rating }}</p>
                @endforeach
            </table>
            @else
            <p>No reviews sented.</p>
            @endif
            <h3>Received</h3>
            @if ($reviewsReceived->count() > 0)
            <table>
                @foreach ($reviewsReceived as $review)
                <p>From: {{ $review->item->seller->userName }}</p>
                <p>Item: {{ $review->item->ItemName }}</p>
                <p>Date of Purchase: {{ $review->dateReview }}</p>
                <p>Comment: {{ $review->comment }}</p>
                <p>Rating: {{ $review->rating }}</p>
                @endforeach
            </table>
            @else
            <p>No reviews received.</p>
            @endif

            <!--TRANSACTIONS-->
            <h2>Transactions</h2>
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

        </body>

        </html>
    </x-layout>
