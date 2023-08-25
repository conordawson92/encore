<!--html diaply for the admin complete dashboard with all the informations, history, messages, etc...and the manage options link-->
<x-layout>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin Profile</title>
    </head>

    <body>
        <div class="w-[50%] mx-auto">
            <p>
                Go to the admnistrator page 
                <a href="/adminUser/admin">
                    here
                </a>
            </p>

            <!--the admin profile informations-->
            <div class="flex gap-4 flex-col p-2 shadow-custom">
                <div class="flex gap-4 items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <img class="w-20 h-20 rounded-full" src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo">
                        <div class="font-bold text-2xl">
                            {{ $user->userName }}
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($user->userRating))
                                    <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                                @elseif($i - 0.5 == $user->userRating)
                                    <span class="text-yellow-500"><i class="fas fa-star-half-alt"></i></span>
                                @else
                                    <span class="text-gray-400"><i class="fas fa-star"></i></span>
                                @endif
                            @endfor
                            <p class="text-gray-400 text-sm font-normal">Member since: {{ $user->created_at }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 mr-6">
                        <button>
                            <i class="fa-solid fa-chevron-up text-2xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div clas="details_container">
                <ul class="bg-white shadow-custom p-2 flex flex-col gap-2">
                    <h2 class="">User Details:</h2>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        {{ $user->email }}
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        {{ $user->userLocation }}
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        {{ $user->userPhone }}
                    </li>
                    <li>
                        Your favorite payment method:    
                        {{ $user->paymentInfo }}
                    </li>
                </ul>                
            </div>
            <!--all the admin selling items-->
            <div>
                <h2>Your Items</h2>

                @if($user->sellerItems->isEmpty())
                        <p>You currently don't have items to sell</p>
                @else
                @foreach ($user->sellerItems as $item)
                <div>
                    <h4>{{ $item->ItemName }}</h4>
                    <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->ItemName }} Image">
                    <p>Description: {{ $item->description }}</p>
                    <p>Price: {{ $item->price }}</p>
                    <p>Size: {{ $item->size }}</p>
                    <p>Brand: {{ $item->brand }}</p>
                    <p>Condition: {{$item->condition}}</p>
                    <p>Status: {{$item->status}}</p>
                    <p>Date was posted: {{$item->dateListed}}</p>
                    <p>Quantity available: {{$item->quantity}}</p>
                </div>
                @endforeach
                @endif
            </div>
            <!--the items in the admin wishlist-->
            <h2>Your Wishlist</h2>
            @if ($user->wishlist->count() > 0)
            @foreach ($user->wishlist as $item)
            <div>
                <p>{{ $item->ItemName }}</p>
                <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->ItemName }} Image">
                <p>Description: {{ $item->description }}</p>
                <p>Price: {{ $item->price }}</p>
                <p>Size: {{ $item->size }}</p>
                <p>Brand: {{ $item->brand }}</p>
                <p>Condition: {{$item->condition}}</p>
                <p>Status: {{$item->status}}</p>
                <p>Date was posted: {{$item->dateListed}}</p>
                <p>Quantity available: {{$item->quantity}}</p>
            </div>
            @endforeach
            @else
            <p>Your wishlist is empty.</p>
            @endif

            <!--all the items bought for the admin logged in with the transaction history-->
            <h2>Your Buying Transactions</h2>
            @if ($buyingTransactions->count() > 0)
            <table>
                @foreach ($buyingTransactions as $transaction)
                <p>Item: {{ $transaction->item->ItemName }}</p>
                <p>Seller: {{ $transaction->item->seller->userName }}</p>
                <p>Date of Purchase: {{ $transaction->datePurchase }}</p>
                <p>Payment Details: {{ $transaction->paymentDetails }}</p>
                <p>Shipment Details {{ $transaction->shippingDetails }}</p>
                @endforeach
            </table>
            @else
            <p>No buying transactions found.</p>
            @endif

            <!--all the items sell for the admin logged in with the transaction history-->
            <h2>Your Selling Transactions</h2>
            @if ($sellingTransactions->count() > 0)
            <table>
                @foreach ($sellingTransactions as $transaction)
                <p>Item: {{ $transaction->item->ItemName }}</p>
                <p>Buyer: {{ $transaction->item->seller->userName }}</p>
                <p>Date of Purchase: {{ $transaction->datePurchase }}</p>
                <p>Payment Details: {{ $transaction->paymentDetails }}</p>
                <p>Shipment Details {{ $transaction->shippingDetails }}</p>
                @endforeach
            </table>
            @else
            <p>No selling transactions found.</p>
            @endif

            <!--all the reviews made by the admin logged in-->
            <h2>Your Reviews</h2>
            <h3>Sented</h3>
            @if ($reviewsGiven->count() > 0)
            <table>
                @foreach ($reviewsGiven as $review)
                <p>Seller: {{ $review->item->seller->userName }}</p>
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
                <p>Buyer: {{ $review->item->seller->userName }}</p>
                <p>Item: {{ $review->item->ItemName }}</p>
                <p>Date of Purchase: {{ $review->dateReview }}</p>
                <p>Comment: {{ $review->comment }}</p>
                <p>Rating: {{ $review->rating }}</p>
                @endforeach
            </table>
            @else
            <p>No reviews received.</p>
            @endif

            <!--all the admin messages history-->
            <h2>Your Messages</h2>
            <h3>Sented</h3>
            @if ($messagesSented->count() > 0)
            <table>
                @foreach ($messagesSented as $message)
                <p>Receiver: {{ $message->receiver->userName }}</p>
                <p>Item: {{ $message->item->ItemName }}</p>
                <p>Date: {{ $message->dateSent }}</p>
                <p>Message: {{ $message->content }}</p>
                <p>Status: {{ $message->status }}</p>
                @endforeach
            </table>
            @else
            <p>No messages sented.</p>
            @endif
            <h3>Received</h3>
            @if ($messagesReceived->count() > 0)
            <table>
                @foreach ($messagesSented as $message)
                <p>Sender: {{ $message->sender->userName }}</p>
                <p>Item: {{ $message->item->ItemName }}</p>
                <p>Date: {{ $message->dateSent }}</p>
                <p>Message: {{ $message->content }}</p>
                <p>Status: {{ $message->status }}</p>
                @endforeach
            </table>
            @else
            <p>No messages received.</p>
            @endif

            <!--admin notifications history-->
            <h2>Your Notifications</h2>
            @if ($notifications->count() > 0)
            <table>
                @foreach ($notifications as $notification)
                <p>Notification: {{ optional($notification->typeNotification)->typeNotificationName }}</p>
                <p>Date: {{ $notification->dateSent }}</p>
                <p>Content: {{ $notification->content }}</p>
                <p>Status: {{ $notification->status }}</p>
                @endforeach
            </table>
            @else
            <p>No notifications found.</p>
            @endif
        </div>
    </body>
</html>
</x-layout>