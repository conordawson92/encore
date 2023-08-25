@if ($items->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-t border-l rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b border-r">Item Name</th>
                    <th class="p-3 border-b border-r">Price</th>
                    <th class="p-3 border-b border-r">Date Posted</th>
                    <th class="p-3 border-b border-r">Category</th>
                    <th class="p-3 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }} hover:bg-gray-200">
                        <td class="p-2 border">{{ $item->itemName }}</td>
                        <td class="p-2 border">${{ $item->price }}</td>
                        <td class="p-2 border">{{ $item->datePosted->format('M d, Y') }}</td>
                        <td class="p-2 border">{{ $item->category }}</td>
                        <td class="p-2 border">{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>{{ $emptyMessage }}</p>
@endif