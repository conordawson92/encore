<head>
    <title>Edit Review</title>
</head>
<x-layout>
    <body>
        <!-- Wrapper -->
        <div class="p-8 space-y-6 overflow-y-auto" style="max-height: 90vh;">

            <!-- Back Navigation and Title -->
        <div class="flex items-center justify-between">
            <a href="/adminUser/admin" class="text-laravel hover:underline">Back to Admin Reviews</a>
            <div class="flex items-center">
                <h1 class="text-4xl font-semibold text-orange_logo ml-4">Manage Review</h1>
                <div class="text-3xl text-orange-500 ml-4">
                    🛠 
                </div>
            </div>
        </div>

            <!-- Edit Review Section -->
            <section class="space-y-4">
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
            </section>
        </div>
    </body>
</x-layout>
