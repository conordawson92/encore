<x-layout>
    <div class="flex items-center justify-between m-8">
        <a href="/adminUser/admin" class="text-laravel hover:underline">Back to Admin Functions</a>
        <div class="flex items-center">
            <h1 class="text-4xl font-semibold text-orange_logo ml-4">View Items</h1>
            <div class="text-6xl text-orange-500 ml-4">
                🛠 
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-md overflow-auto">
        <!-- Display Available Items -->
        <h2 class="text-2xl font-semibold text-orange-500 mb-4">Available Items</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Brand</th>
                        <th>Seller</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        @if ($item->status === 'available')
                            <tr>
                                <td><img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" style="max-width: 100px; max-height: 100px;"></td>
                                <td>{{ $item->ItemName }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->brand }}</td>
                                <td>{{ $item->seller->userName }}</td>
                                <td>
                                    <a href="{{ route('items.edit', ['item' => $item->id]) }}">Edit</a>
                                    <form action="{{ route('items.destroy', ['item' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
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
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Seller</th>
                        <th>Buyer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        @if ($item->status === 'sold')
                            <tr>
                                <td><img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" style="max-width: 100px; max-height: 100px;"></td>
                                <td>{{ $item->ItemName }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->brand }}</td>
                                <td>{{ $item->seller->userName }}</td>
                                <td>{{ $item->buyer->userName }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>