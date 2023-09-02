<head>
    <title>Encore | Add Review</title>
</head>

<x-layout>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 space-y-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="flex items-center justify-between m-8">
                <a href="/adminUser/dashboard" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">Back to dashboard</a>
                <div class="flex items-center">
                    <h1 class="text-4xl font-semibold text-orange_logo ml-4">Add Review</h1>
                    <div class="text-3xl text-orange-500 ml-4">🛠</div>
                </div>
                
            </div>

    <form action="{{ route('reviews.store') }}" method="post" class="space-y-4">
        @csrf

        <!-- Hidden Input for Item ID (Assuming you have this already) -->
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <div>
        <!-- Rating Dropdown -->
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
            <select name="rating" class="mt-1 p-2 w-full border rounded-md">
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            @error('rating')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <!-- Comment Textarea -->
            <label for="comment" class="block text-sm font-medium text-gray-700">Comment:</label>
            <textarea name="comment" rows="4" cols="50" class="mt-1 p-2 w-full border rounded-md"></textarea>
            @error('itemImage')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>


        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mt-4 flex justify-center pb-5">
        <!-- Submit Button -->
            <button type="submit" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 mt-8">Submit Review</button>
        </div>
    </form>
</x-layout>