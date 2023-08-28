<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>
</head>
<body>
    <a href="/adminUser/reviews">Back to all Reviews</a>

    <h1>Edit Review</h1>

    <form action="{{ route('reviews.update', ['review' => $review->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" value="{{ $review->rating }}" required>
        
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required>{{ $review->comment }}</textarea>
        
        <button type="submit">Update Review</button>
    </form>

</body>
</html>