{{--Convert the list to an array--}}

@props(['listing'])
<x-card>
    <div class="bg-white shadow-lg rounded-lg">
        <!-- Image -->
        <img src="{{$listing->itemImage ? asset('' . $listing->itemImage): asset('images/no-image.png')}}" class="w-full h-60 object-cover rounded-t-lg" alt="...">
        <!-- Information -->
        <div class="p-4">
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}" class="text-black hover:text-gray-700">{{ $listing->ItemName }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->description }}</div>
            <div class="text-xl font-bold mb-4">€{{ $listing->price }}</div>
            <div class="text-xl font-bold mb-4">Size: {{ $listing->size }}</div>
            <div class="text-xl font-bold mb-4">Brand: {{ $listing->brand }}</div>
        </div>
    </div>
</x-card>

