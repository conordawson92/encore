<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- Include any necessary CSS or other head elements -->
</head>
<body>
    <h1>Welcome to Your Profile and History, {{ $user->userName }}!</h1>

    <h2>Your Profile</h2>
    <img src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo">
    <p>Email: {{ $user->email }}</p>
    <p>Name: {{ $user->userName }}</p>
    <p>You joined us in {{$user->dateJoined}}</p>
    <p>Location: {{ $user->userLocation }}</p>
    <p>Phone: {{ $user->userPhone }}</p>
    <p>Based on your history, you have a rate of: {{$user->userRating}}</p>
    <p>Your payment preference is: {{$user->paymentInfo}}</p>

    <h2>Your Selling Items</h2>
    @foreach ($user->sellerItems as $item)
        <div>
            <h3>{{ $item->itemName }}</h3>
            <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->itemName }} Image">
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

    <h2>Your Wishlist</h2>
@if ($user->wishlist)
    @foreach ($user->wishlist as $item)
        <p>{{ $item->itemName }}</p>
        <img src="{{ asset('storage/' . $item->itemImage) }}" alt="{{ $item->itemName }} Image">
        <p>Description: {{ $item->description }}</p>
        <p>Price: {{ $item->price }}</p>
        <p>Size: {{ $item->size }}</p>
        <p>Brand: {{ $item->brand }}</p>
        <p>Condition: {{$item->condition}}</p>
        <p>Status: {{$item->status}}</p>
        <p>Date was posted: {{$item->dateListed}}</p>
        <p>Quantity available: {{$item->quantity}}</p>
        @endforeach
        @else
            <p>Your wishlist is empty.</p>
        @endif

    <h2>Your Buying Transactions</h2>
    @foreach ($buyingTransactions as $transaction)
        <p>Item bought: {{ $transaction->item_id->itemName }}</p>
        <p>Seller: {{$transaction->item->seller->userName}}</p>
        <p>Date of purchase: {{$transaction->datePurchase}}</p>
        <p>Payment Details: {{$transaction->paymentDetails}}</p>
        <p>Shipment Details: {{$transaction->shippingDetails}}</p>
    @endforeach

    <h2>Your Selling Transactions</h2>
    @foreach ($sellingTransactions as $transaction)
        <p>Item sold: {{ $transaction->item->itemName }}</p>
        <p>Buyer: {{ $transaction->buyer->userName }}</p>
        <p>Date of sale: {{ $transaction->datePurchase }}</p>
        <p>Payment Details: {{ $transaction->paymentDetails }}</p>
        <p>Shipment Details: {{ $transaction->shippingDetails }}</p>
    @endforeach

    <h2>Your Sent Reviews</h2>
    @foreach ($user->reviews as $review)
        @if ($review->reviewer_id == $user->id)
            <div>
                <p>Item: {{ $review->item_id }}</p>
                <p>User Reviewed {{$review->receiver->userName}}</p>
                <p>Comment: {{$review->comment}}</p>
                <p>Rating Gived: {{$review->rating}}</p>
                <p>Date: {{$review->dateReview}}</p>
            </div>
        @endif
    @endforeach

    <h2>Your Received Reviews</h2>
    @foreach ($user->reviews as $review)
        @if ($review->reviewed_id == $user->id)
            <div>
                <p>Item: {{ $review->item_id }}</p>
                <p>Reviewer User: {{$review->sender->userName}}</p>
                <p>Comment: {{$review->comment}}</p>
                <p>Rating Received: {{$review->rating}}</p>
                <p>Date: {{$review->dateReview}}</p>
            </div>
        @endif
    @endforeach

    <h2>Your Received Messages</h2>
    @foreach ($user->messages as $message)
        @if ($message->receiverUser_id == $user->id)
            <div>
                <p>Sender: {{$message->sender->userName}}</p>
                <p>Date: {{$message->dateSent}}</p>
                <p>Item: {{ $message->item_id }}</p>
                <p>Message: {{$message->content}}</p>
                <p>Status: {{$message->status}}</p>
            </div>
        @endif
    @endforeach

    <h2>Your Send Messages</h2>
    @foreach ($user->messages as $message)
        @if ($message->senderUser_id == $user->id)
            <div>
                <p>Receiver: {{$message->receiver->userName}}</p>
                <p>Date: {{$message->dateSent}}</p>
                <p>Item: {{ $message->item_id }}</p>
                <p>Message: {{$message->content}}</p>
                <p>Status: {{$message->status}}</p>
            </div>
        @endif
    @endforeach

    <h2>Your Notifications</h2>
    @foreach ($user->notifications as $notification)
        <p>Notification type: {{ $notification->typeNotification_id }}</p>
        <p>Received from: {{$notification->user_id}}</p>
        <p>Message: {{$notification->content}}</p>
        <p>Date: {{$notification->dateSent}}</p>
        <p>Status: {{$notification->status}}</p>
    @endforeach
    
</body>
</html>