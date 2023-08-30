<head>
    <title>Encore | Items</title>
</head>

<x-layout>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-4xl font-semibold text-orange_logo_light">Available Items</h2>
            <a href="{{ route('admin') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Admin functions
            </a>

        </div>

        <!-- Display Available Items -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-b border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-3">Image</th>
                        <th class="py-2 px-3">Name</th>
                        <th class="py-2 px-3">Description</th>
                        <th class="py-2 px-3">Price</th>
                        <th class="py-2 px-3">Size</th>
                        <th class="py-2 px-3">Quantity</th>
                        <th class="py-2 px-3">Brand</th>
                        <th class="py-2 px-3">Seller</th>
                        <th class="py-2 px-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    @if ($item->status === 'available')
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-3"><img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" class="h-24 w-24 object-contain"></td>
                        <td class="py-2 px-3">{{ $item->ItemName }}</td>
                        <td class="py-2 px-3">{{ $item->description }}</td>
                        <td class="py-2 px-3">{{ $item->price }}</td>
                        <td class="py-2 px-3">{{ $item->size }}</td>
                        <td class="py-2 px-3">{{ $item->quantity }}</td>
                        <td class="py-2 px-3">{{ $item->brand }}</td>
                        <td class="py-2 px-3">{{ $item->seller->userName }}</td>
                        <td class="py-2 px-3">
                            <a href="{{ route('items.edit', ['item' => $item->id]) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Display Sold Items -->
        <h2 class="text-2xl font-semibold text-brown_logo mt-8">Sold Items</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border-b border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-3">Image</th>
                        <th class="py-2 px-3">Name</th>
                        <th class="py-2 px-3">Description</th>
                        <th class="py-2 px-3">Price</th>
                        <th class="py-2 px-3">Brand</th>
                        <th class="py-2 px-3">Seller</th>
                        <th class="py-2 px-3">Buyer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    @if ($item->status === 'sold')
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-3"><img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" class="h-24 w-24 object-contain"></td>
                        <td class="py-2 px-3">{{ $item->ItemName }}</td>
                        <td class="py-2 px-3">{{ $item->description }}</td>
                        <td class="py-2 px-3">{{ $item->price }}</td>
                        <td class="py-2 px-3">{{ $item->brand }}</td>
                        <td class="py-2 px-3">{{ $item->seller->userName }}</td>
                        <td class="py-2 px-3">{{ $item->buyer->userName }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>