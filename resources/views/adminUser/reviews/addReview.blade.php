<head>
    <title>Encore | Add Review</title>
</head>

<x-layout>


    <form action="{{ route('reviews.store') }}" method="post">
        @csrf

        <!-- Hidden Input for Item ID (Assuming you have this already) -->
        <input type="hidden" name="item_id" value="{{ $item->id }}">

        <!-- Rating Dropdown -->
        <label for="rating">Rating:</label>
        <select name="rating">
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select>

        <!-- Comment Textarea -->
        <label for="comment">Comment:</label>
        <textarea name="comment" rows="4" cols="50"></textarea>


        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Submit Button -->
        <button type="submit">Submit Review</button>
    </form>
</x-layout>