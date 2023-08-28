<x-layout>
    <a href="/listings" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <div class="flex flex-col md:flex-row">
                <!-- Immagine a sinistra -->
                <div class="w-full md:w-1/2 flex justify-center cursor-pointer" onclick="showImage()">
                    <img id="thumbnailImage" class="object-cover md:w-full h-full" src="{{$listing->itemImage ? asset('' . $listing->itemImage) : asset('images/no-image.png')}}" alt="" />
                </div>
                <!-- Informazioni a destra -->
                <div class="w-full md:w-1/2 flex flex-col">
                    <div class="pl-0 md:pl-8">
                        <h3 class="text-2xl mb-2">{{$listing->ItemName}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->description}}</div>
                        <x-listing-tags :tagsCsv="$listing->tags" />
                        <div class="text-lg my-4">€{{$listing->price}}</div>
                        <div class="text-lg my-4">Size: {{$listing->size}}</div>
                        <div class="text-lg my-4">Brand: {{$listing->brand}}</div>
                        <div class="text-lg my-4">Condition: {{$listing->condition}}</div>
                        <div class="text-lg my-4">Posted: {{$listing->dateListed}}</div>
                        <div class="text-lg my-4">Quantity: {{$listing->quantity}}</div>
                        <div class="text-lg my-4">Status: {{$listing->status}}</div>
                    </div>
                    <div class="mt-auto flex justify-end md:mr-8">
                        <form action="{{ route('cart.add', $listing) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-orange-500 text-white w-32 h-10 rounded">Add to Cart</button>
                        </form>
                        <a href="{{ route('stripe.checkout') }}" class="bg-green-500 text-white ml-4 w-32 h-10 rounded">Buy</a>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <!-- "Featured Products" -->
    <div class="mx-4 mt-5">
        <x-card class="p-10 bg-white">
            <div class="flex flex-wrap text-center">
                <!-- Titolo al centro -->
                <div class="w-full">
                    <h2 class="text-2xl mb-4">Featured Products</h2>
                </div>

                <!-- Prima immagine -->
                <div class="w-full md:w-1/3">
                    <img class="w-full h-full object-cover" src="{{ asset('path/to/first/image') }}" alt="First Product" />
                    <p>Product 1</p>
                </div>

                <!-- Seconda immagine -->
                <div class="w-full md:w-1/3">
                    <img class="w-full h-full object-cover" src="{{ asset('path/to/second/image') }}" alt="Second Product" />
                    <p>Product 2</p>
                </div>

                <!-- Terza immagine -->
                <div class="w-full md:w-1/3">
                    <img class="w-full h-full object-cover" src="{{ asset('path/to/third/image') }}" alt="Third Product" />
                    <p>Product 3</p>
                </div>
            </div>
        </x-card>
    </div>

    <a href="/listings" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <!-- Image Overlay Structure -->
    <div id="imageOverlay" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 hidden opacity-0 transition-opacity duration-300" onclick="hideImage()">
        <img id="enlargedImage" class="max-w-4/5 max-h-4/5" src="" alt="{{ $listing->ItemName }}">
    </div>
</x-layout>