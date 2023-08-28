<x-layout>

    {{-- @include('partials._search') --}}

    <a href="/listings" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>

    <div class="mx-4">
        <x-card class="p-10 bg-black">
            <div class="flex flex-col items-center justify-center text-center">

                <!-- Clickable Image -->
                <div onclick="showImage()" class="cursor-pointer">
                    <img id="thumbnailImage" class="w-48 mr-6 mb-6"
                        src="{{ $listing->itemImage ? asset('' . $listing->itemImage) : asset('images/no-image.png') }}"
                        alt="{{ $listing->ItemName }}" />
                </div>

                <h3 class="text-2xl mb-2">{{ $listing->ItemName }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->description }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div class="text-lg my-4">
                    €{{ $listing->price }}
                </div>
                <div class="text-lg my-4">
                    Size: {{ $listing->size }}
                </div>
                <div class="text-lg my-4">
                    Brand: {{ $listing->brand }}
                </div>
                <div class="text-lg my-4">
                    Condition: {{ $listing->condition }}
                </div>
                <div class="text-lg my-4">
                    Posted: {{ $listing->dateListed }}
                </div>
                <div class="text-lg my-4">
                    Quantity: {{ $listing->quantity }}
                </div>
                <div class="text-lg my-4">
                    Status: {{ $listing->status }}
                </div>
                
                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add', ['item' => $listing->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button>
                </form>

                <button>Message</button>
            </div>
        </x-card>
    </div>

    <!-- Image Overlay Structure -->
    <div id="imageOverlay"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 hidden opacity-0 transition-opacity duration-300"
        onclick="hideImage()">
        <img id="enlargedImage" class="max-w-4/5 max-h-4/5" src="" alt="{{ $listing->ItemName }}">
    </div>


</x-layout>
