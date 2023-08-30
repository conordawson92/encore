<head>
    <title>Encore | Reviews Management</title>
</head>


<x-layout>
    <body>
        <!-- Wrapper -->
        <div class="p-8 space-y-6 overflow-y-auto" style="max-height: 90vh;">

            <!-- Back Navigation and Title -->
            <div class="flex items-center justify-between">
                <a href="/adminUser/admin" class="text-laravel hover:underline">Back to Admin Functions</a>
                <div class="flex items-center">
                    <h1 class="text-4xl font-semibold text-orange_logo ml-4">Reviews Management</h1>
                    <div class="text-3xl text-orange-500 ml-4">🛠</div>
                </div>
            </div>

            <!-- Reviews Section -->
            <section class="space-y-4">
                <h3 class="text-4xl font-semibold text-orange-500 mb-8">Reviews</h3>
                
                <div class="overflow-x-auto">
                    @if ($reviews->count() > 0)
                    <table class="min-w-full bg-white border-t border-l rounded-lg">
                        <thead class="bg-gray-100">
                            <tr class="bg-gray-200">
                                <th class="border p-2 text-left">Date</th>
                                <th class="border p-2 text-left">From User</th>
                                <th class="border p-2 text-left">To User</th>
                                <th class="border p-2 text-left">Item</th>
                                <th class="border p-2 text-left">Rating</th>
                                <th class="border p-2 text-left">Comment</th>
                                <th class="border p-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                            <tr class="hover:bg-gray-200">
                                <td class="border p-2">{{ $review->dateReview }}</td>
                                <td class="border p-2">{{ $review->sender->userName }}</td>
                                <td class="border p-2">{{ $review->receiver->userName }}</td>
                                <td class="border p-2">{{ $review->item->itemName }}</td>
                                <td class="border p-2">{{ $review->rating }}</td>
                                <td class="border p-2">{{ $review->comment }}</td>
                                <td class="border p-2">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('reviews.edit', ['review' => $review->id]) }}" class="bg-green-500 text-white py-1 px-4 rounded hover:bg-green-600">Edit</a>
                                        <button onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this review?')) { document.getElementById('delete-form-{{ $review->id }}').submit(); }" class="bg-red-500 text-white py-1 px-4 rounded hover:bg-red-600">Delete</button>
                                    </div>
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
            </section>
        </div>
    </body>
</x-layout>
