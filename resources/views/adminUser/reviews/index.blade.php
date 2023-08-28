<!DOCTYPE html>
<html>
<head>
    <title>Reviews Management</title>
</head>
<body>

    <a href="{{ route('admin') }}">Back to Reviews List</a>

    <h1>Reviews Management</h1>

    <!-- List of reviews -->
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>From User</th>
                <th>To User</th>
                <th>Item</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->dateReview }}</td>
                <td>{{ $review->sender->userName }}</td>
                <td>{{ $review->receiver->userName }}</td>
                <td>{{ $review->item->itemName }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->comment }}</td>
                <td>
                    <a href="{{ route('reviews.edit', ['review' => $review->id]) }}">Edit</a>
                    <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this review?')) { document.getElementById('delete-form-{{ $review->id }}').submit(); }">Delete</a>
                    <form id="delete-form-{{ $review->id }}" action="{{ route('reviews.destroy', ['review' => $review->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
