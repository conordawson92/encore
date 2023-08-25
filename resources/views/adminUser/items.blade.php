<a href="{{ route('admin') }}">Back to Admin functions</a>

<h1>Manage Items</h1>

<!-- Display Available Items -->
<h2>Available Items</h2>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
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
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->seller->userName }}</td>
                    <td>
                        <a href="/adminUser/items/{{ $item->id }}/edit">Edit</a>
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

<!-- Display Sold Items -->
<h2>Sold Items</h2>
<table>
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
