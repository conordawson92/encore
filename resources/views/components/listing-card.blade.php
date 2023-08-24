{{--Convert the list to an array--}}
@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" 
        src="{{$listing->itemImage ? asset('' . $listing->itemImage): asset('images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{ $listing->ItemName }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->description }}</div>
            <div class="text-xl font-bold mb-4">
                €{{ $listing->price }}</div>
            <div class="text-xl font-bold mb-4">
                Size: {{ $listing->size }}</div>
            <div class="text-xl font-bold mb-4">
                Brand: {{ $listing->description }}</div>

            {{-- <x-listing-tags :tagsCsv="$listing->tags" /> --}}
        </div>
    </div>
</x-card>