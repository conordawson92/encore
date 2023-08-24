<!--html diaply for the admin complete dashboard with all the informations, history, messages, etc...and the manage options link-->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
</head>
<body>
    <a href="/"> Back
    </a>
    <h1>Welcome to your profile Page, {{ $user->userName }}!</h1>

    <p>Go to the admnistrator page <a href="/adminUser/admin">here</a></p>

    <!--the admin profile informations-->
    <h2>Your Profile</h2>
    <img src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo">
    <p>Email: {{ $user->email }}</p>
    <p>Name: {{ $user->userName }}</p>
    <p>You joined us in {{$user->dateJoined}}</p>
    <p>Location: {{ $user->userLocation }}</p>
    <p>Phone: {{ $user->userPhone }}</p>
    <p>Based on your history, you have a rate of: {{$user->userRating}}</p>
    <p>Your payment preference is: {{$user->paymentInfo}}</p>

    <!--all the admin selling items-->
    <h2>Your Items</h2>
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


    
</body>
</html>