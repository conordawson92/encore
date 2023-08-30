<head>
    <title>Edit Review</title>
</head>
<x-layout>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="flex justify-between items-center mb-4">
            <a href="/adminUser/reviews" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to all Reviews
            </a>
        </div>

        <h1 class="text-2xl font-semibold mb-4">Edit Review</h1>

        <form action="{{ route('reviews.update', ['review' => $review->id]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label for="rating" class="text-lg font-medium">Rating:</label>
                <input type="number" id="rating" name="rating" min="1" max="5" value="{{ $review->rating }}" required class="border rounded p-2">
                @error('rating')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="comment" class="text-lg font-medium">Comment:</label>
                <textarea id="comment" name="comment" rows="4" class="border rounded p-2" required>{{ $review->comment }}</textarea>
                @error('comment')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300">Update Review</button>
            </div>
        </form>
    </div>
</x-layout>