<!--html diaply for the admin complete dashboard with all the informations, history, messages, etc...and the manage options link-->

<head>
    <title>Encore | Dashboard</title>
</head>
<x-layout>

    <body>
        <div class="w-[65%] mx-auto pt-2">

            @auth
            @if(auth()->user()->role === 'admin')
            <div class="mt-4 pb-5">
                <a href="/adminUser/admin" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300  items-center">
                    <i class="fas fa-user-cog mr-2"></i> Admin Panel
                </a>
            </div>

            @endif
            @endauth

            <!--the admin profile information-->
            <div id="profile" class="flex gap-4 flex-col p-2 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex gap-4 items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <img class="w-20 h-20 rounded-full" src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo">
                        <div class="font-bold text-2xl">
                            {{ $user->userName }}
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($user->userRating))
                                        <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                                    @elseif($i - 0.5 == $user->userRating)
                                        <span class="text-yellow-500"><i class="fas fa-star-half-alt"></i></span>
                                    @else
                                        <span class="text-gray-400"><i class="fas fa-star"></i></span>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-gray-400 text-sm font-normal">Member since: {{ $user->created_at }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-full hover:bg-orange-500">
                        <button id="user_details_button" class="focus:outline-none">
                            <i id="user_details_button_icon" class="fa-solid fa-chevron-up text-2xl hover:text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="details_container">

            </div>
            <!--all the admin selling items-->
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Your Items For Sale</h2>

                @if($user->sellerItems->where('status', 'available')->isEmpty())
                <a href="{{ route('items.createItem') }}">
                    <div class="border overflow-hidden shadow-custom relative transition-transform transform hover:scale-105 cursor-pointer">
                        <div class="flex items-center justify-center w-full h-48 bg-gray-200">
                            <i class="fas fa-plus text-3xl"></i> <!-- Icon class based on the icon library you're using -->
                        </div>
                        <div class="p-4 text-center">
                            <h4 class="text-lg font-semibold mb-2">Add Item</h4>
                            <p class="text-gray-600">Click to add a new item to your listings</p>
                        </div>
                    </div>
                </a>
                @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($user->sellerItems as $item)
                    @if($item->status === 'available')
                    <div class="border overflow-hidden shadow-custom relative transition-transform transform hover:scale-105">
                        <!-- Delete Button -->
                        <form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="POST" class="absolute bottom-2 right-3 z-10">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="far fa-trash-can"></i>
                            </button>
                        </form>

                        <a href="/listings/{{$item->id}}" class="block relative">
                            <div class="relative w-full h-48 overflow-hidden">
                                <img class="absolute top-0 left-0 w-full h-full object-cover filter blur-lg" src="{{$item->itemImage ? asset('' . $item->itemImage): asset('images/no-image.png')}}" alt="{{ $item->ItemName }} Background Image">
                                <img class="absolute top-0 left-0 w-full h-full object-contain" src="{{$item->itemImage ? asset('' . $item->itemImage): asset('images/no-image.png')}}" alt="{{ $item->ItemName }} Image">
                            </div>
                            <div class="p-4">
                                <h4 class="text-lg font-semibold mb-2">{{ $item->ItemName }}</h4>
                                <p class="text-gray-600">Description: {{ $item->description }}</p>
                                <p class="text-gray-600">Price: {{ $item->price }}€</p>
                                <p class="text-gray-600">Size: {{ $item->size }}</p>
                                <p class="text-gray-600">Brand: {{ $item->brand }}</p>
                                <p class="text-gray-600">Condition: {{$item->condition}}</p>
                                <p class="text-gray-600">Status: {{$item->status}}</p>
                                <p class="text-gray-600">Created on: {{$item->dateListed}}</p>
                                <p class="text-gray-600">Quantity available: {{$item->quantity}}</p>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                    <a href="{{ route('items.createItem') }}">
                        <div class="border overflow-hidden shadow-custom relative transition-transform transform hover:scale-105 cursor-pointer">
                            <div class="flex items-center justify-center w-full h-48 bg-gray-200">
                                <i class="fas fa-plus text-3xl"></i> <!-- Icon class based on the icon library you're using -->
                            </div>
                            <div class="p-4 text-center">
                                <h4 class="text-lg font-semibold mb-2">Add Item</h4>
                                <p class="text-gray-600">Click to add a new item to your listings</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>




            <!--the items in the admin wishlist-->
            <h2 class="text-2xl font-bold mb-4">Your wishlist</h2>
            @if ($user->wishlist->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($user->wishlist as $item)
                @if($item->status === 'available')
                <div class="border overflow-hidden shadow-custom relative transition-transform transform hover:scale-105">

                    <!-- Delete Button -->
                    <form action="{{ route('wishlist.remove', ['itemId' => $item->id]) }}" method="POST" class="absolute bottom-2 right-3 z-10">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="far fa-trash-can"></i>
                        </button>
                    </form>

                    <a href="/listings/{{$item->id}}" class="block relative">
                        <div class="relative w-full h-48 overflow-hidden">
                            <img class="absolute top-0 left-0 w-full h-full object-cover filter blur-lg" src="{{$item->itemImage ? asset('' . $item->itemImage): asset('images/no-image.png')}}" alt="{{ $item->ItemName }} Background Image">
                            <img class="absolute top-0 left-0 w-full h-full object-contain" src="{{$item->itemImage ? asset('' . $item->itemImage): asset('images/no-image.png')}}" alt="{{ $item->ItemName }} Image">
                        </div>
                        <div class="p-4">
                            <h4 class="text-lg font-semibold mb-2">{{ $item->ItemName }}</h4>
                            <p class="text-gray-600">Description: {{ $item->description }}</p>
                            <p class="text-gray-600">Price: {{ $item->price }}€</p>
                            <p class="text-gray-600">Size: {{ $item->size }}</p>
                            <p class="text-gray-600">Brand: {{ $item->brand }}</p>
                            <p class="text-gray-600">Condition: {{$item->condition}}</p>
                            <p class="text-gray-600">Quantity available: {{$item->quantity}}</p>
                        </div>
                </div>
                @endif
                @endforeach
            </div>
            @else
            <p class="text-gray-600">Your wishlist is empty.</p>
            @endif
        </div> --}}





        <!--all the items bought for the admin logged in with the transaction history-->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Purchase History</h2>

            @if ($buyingTransactions->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Seller</th>
                        <th class="py-2 px-4 border-b text-left">Date of Purchase</th>
                        <th class="py-2 px-4 border-b text-left">Payment Details</th>
                        <th class="py-2 px-4 border-b text-left">Shipment Details</th>
                        <th class="py-2 px-4 border-b text-left">Status</th>
                        <th class="py-2 px-4 border-b text-left">Review</th> <!-- New Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buyingTransactions as $transaction)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $transaction->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->item->seller->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->datePurchase }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->paymentDetails }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->shippingDetails }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->status }}</td>
                        <td class="py-2 px-4 border-b">
                            @php
                            $userReview = $transaction->item->reviews->where('user_id', auth()->id())->first();
                            @endphp
                            @if ($transaction->status == 'finished' && !$userReview)
                            <a href="{{ route('review.create', ['item' => $transaction->item->id]) }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 flex items-center"">Add Review</a>
                                @elseif($userReview)
                                <span class=" text-gray-600">Reviewed</span>
                                @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <p class="text-gray-600">No purchase history found.</p>
            @endif
        </div>

        <!--all the items sell for the admin logged in with the transaction history-->

        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Sales History</h2>

            @if ($sellingTransactions->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Buyer</th>
                        <th class="py-2 px-4 border-b text-left">Date of Purchase</th>
                        <th class="py-2 px-4 border-b text-left">Payment Details</th>
                        <th class="py-2 px-4 border-b text-left">Shipment Details</th>
                        <th class="py-2 px-4 border-b text-left">Status</th>
                        <th class="py-2 px-4 border-b text-left">Review</th> <!-- New Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellingTransactions as $transaction)

                    <tr>
                        <td class="py-2 px-4 border-b">{{ $transaction->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->item->buyer->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->datePurchase }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->paymentDetails }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->shippingDetails }}</td>
                        <td class="py-2 px-4 border-b">{{ $transaction->status }}</td>
                        <td class="py-2 px-4 border-b">
                            @php
                            $userReview = $transaction->item->reviews->where('user_id', auth()->id())->first();
                            @endphp
                            @if ($transaction->status == 'finished' && !$userReview)
                            <a href="{{ route('review.create', ['item' => $transaction->item->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Review</a>
                            @elseif($userReview)
                            <span class="text-gray-600">Reviewed</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600">No sales history found.</p>
            @endif
        </div>
        <!--all the reviews made by the admin logged in-->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Your Reviews</h2>

            <h3 class="text-xl font-semibold mt-6">Sent</h3>
            @if ($reviewsGiven->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Seller</th>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Date of Review</th>
                        <th class="py-2 px-4 border-b text-left">Comment</th>
                        <th class="py-2 px-4 border-b text-left">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviewsGiven as $review)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $review->item->seller->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->dateReview }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->comment }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->rating }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600 mt-2">No reviews sent.</p>
            @endif

            <h3 class="text-xl font-semibold mt-6">Received</h3>
            @if ($reviewsReceived->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Buyer</th>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Date of Review</th>
                        <th class="py-2 px-4 border-b text-left">Comment</th>
                        <th class="py-2 px-4 border-b text-left">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviewsReceived as $review)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $review->item->buyer->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->dateReview }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->comment }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->rating }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600 mt-2">No reviews received.</p>
            @endif
        </div>
       

        <!--all the admin messages history-->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Your Messages</h2>

            <h3 class="text-xl font-semibold mt-6">Sent</h3>
            @if ($messagesSent->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Receiver</th>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Date</th>
                        <th class="py-2 px-4 border-b text-left">Message</th>
                        <th class="py-2 px-4 border-b text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messagesSent as $message)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $message->receiver->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->dateSent }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->content }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600 mt-2">No messages sent.</p>
            @endif

            <h3 class="text-xl font-semibold mt-6">Received</h3>
            @if ($messagesReceived->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Sender</th>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Date</th>
                        <th class="py-2 px-4 border-b text-left">Message</th>
                        <th class="py-2 px-4 border-b text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messagesReceived as $message) <!-- I've adjusted the loop variable -->
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $message->sender->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->dateSent }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->content }}</td>
                        <td class="py-2 px-4 border-b">{{ $message->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600 mt-2">No messages received.</p>
            @endif
        </div>

        <!--admin notifications history-->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Your Notifications</h2>

            @if ($notifications->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Notification Type</th>
                        <th class="py-2 px-4 border-b text-left">Date</th>
                        <th class="py-2 px-4 border-b text-left">Content</th>
                        <th class="py-2 px-4 border-b text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ optional($notification->typeNotification)->typeNotificationName }}</td>
                        <td class="py-2 px-4 border-b">{{ $notification->dateSent }}</td>
                        <td class="py-2 px-4 border-b">{{ $notification->content }}</td>
                        <td class="py-2 px-4 border-b">{{ $notification->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600 mt-2">No notifications found.</p>
            @endif
        </div>
        </div>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </body>

    </html>
</x-layout>