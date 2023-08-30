<head>
    <title>Encore | Items</title>
</head>

<x-layout>
    <div class="flex items-center justify-between m-8">
        <a href="{{ route('admin') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
            <i class="fas fa-user-cog mr-2"></i> Back to Admin Functions
        </a>
        <div class="flex items-center">
            <h1 class="text-4xl font-semibold text-orange_logo ml-4">View Items</h1>
            <div class="text-3xl text-orange-500 ml-4">🛠</div>
        </div>
    </div>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-md overflow-auto">
        <!-- Display Available Items -->
        <h2 class="text-4xl font-semibold text-orange-500 mb-8">Available Items</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-t border-l rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2 text-left">Image</th>
                        <th class="border p-2 text-left">Name</th>
                        <th class="border p-2 text-left">Description</th>
                        <th class="border p-2 text-left">Price</th>
                        <th class="border p-2 text-left">Size</th>
                        <th class="border p-2 text-left">Quantity</th>
                        <th class="border p-2 text-left">Brand</th>
                        <th class="border p-2 text-left">Seller</th>
                        <th class="border p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    @if ($item->status === 'available')
                    <tr class="hover:bg-gray-200">
                        <td class="p-2 border"><img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" style="max-width: 100px; max-height: 100px;"></td>
                        <td class="p-2 border">{{ $item->ItemName }}</td>
                        <td class="p-2 border">{{ $item->description }}</td>
                        <td class="p-2 border">{{ $item->price }}</td>
                        <td class="p-2 border">{{ $item->size }}</td>
                        <td class="p-2 border">{{ $item->quantity }}</td>
                        <td class="p-2 border">{{ $item->brand }}</td>
                        <td class="p-2 border">{{ $item->seller->userName }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('items.edit', ['item' => $item->id]) }}" class="bg-green-500 text-white rounded px-2 py-1 mr-2 ml-4">Edit</a>
                            <form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded px-2 py-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr class="my-8">
        <!-- Display Sold Items -->
        <h2 class="text-2xl font-semibold text-orange-500 mb-4">Sold Items</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-t border-l rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2 text-left">Image</th>
                        <th class="border p-2 text-left">Name</th>
                        <th class="border p-2 text-left">Description</th>
                        <th class="border p-2 text-left">Price</th>
                        <th class="border p-2 text-left">Brand</th>
                        <th class="border p-2 text-left">Seller</th>
                        <th class="border p-2 text-left">Buyer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    @if ($item->status === 'sold')
                    <tr class="hover:bg-gray-200">
                        <td class="p-2 border"><img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" style="max-width: 100px; max-height: 100px;"></td>
                        <td class="p-2 border">{{ $item->ItemName }}</td>
                        <td class="p-2 border">{{ $item->description }}</td>
                        <td class="p-2 border">{{ $item->price }}</td>
                        <td class="p-2 border">{{ $item->brand }}</td>
                        <td class="p-2 border">{{ $item->seller->userName }}</td>
                        <td class="p-2 border">{{ $item->buyer->userName }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>