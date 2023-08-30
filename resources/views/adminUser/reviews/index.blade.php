<head>
    <title>Encore | Reviews Management</title>
</head>


<x-layout>

    <body>


        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-4xl font-semibold text-orange_logo_light">Reviews Management</h1>
                <a href="{{ route('admin') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                    <i class="fas fa-user-cog mr-2"></i> Back to Admin Functions
                </a>
            </div>

            @if ($reviews->count() > 0)
            <table class="w-full border-collapse border border-gray-300 mb-5">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Date</th>
                        <th class="border p-2">From User</th>
                        <th class="border p-2">To User</th>
                        <th class="border p-2">Item</th>
                        <th class="border p-2">Rating</th>
                        <th class="border p-2">Comment</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                        <td class="border p-2">{{ $review->dateReview }}</td>
                        <td class="border p-2">{{ $review->sender->userName }}</td>
                        <td class="border p-2">{{ $review->receiver->userName }}</td>
                        <td class="border p-2">{{ $review->item->itemName }}</td>
                        <td class="border p-2">{{ $review->rating }}</td>
                        <td class="border p-2">{{ $review->comment }}</td>
                        <td class="border p-2">
                            <a href="{{ route('reviews.edit', ['review' => $review->id]) }}" class="text-orange-500 hover:text-orange-600 transition-all duration-300">Edit</a> |
                            <a href="#" class="text-red-500 hover:text-red-600 transition-all duration-300" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this review?')) { document.getElementById('delete-form-{{ $review->id }}').submit(); }">Delete</a>
                            <form id="delete-form-{{ $review->id }}" action="{{ route('reviews.destroy', ['review' => $review->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No reviews found.</p>
            @endif
        </div>
</x-layout>