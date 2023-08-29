<x-layout>
    <a href="/listings" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <div class="flex flex-col sm:flex-row items-stretch">

                <!-- Responsive mobile -->

                <div id="thumbnail" class="flex justify-center w-78 sm:w-1/2 lg:w-3/4 cursor-pointer" onclick="showImage()">
                    <img id="thumbnailImage" class="object-cover h-58 sm:h-158" src="{{$listing->itemImage ? asset('' . $listing->itemImage) : asset('images/no-image.png')}}" alt="" />
                </div>

                <!-- Information -->
                <div class="flex flex-col w-full sm:w-1/2 items-center sm:items-start justify-between">

                    <div class="pl-0 sm:pl-8 w-full text-center sm:text-left">
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
                        <form action="{{ route('cart.addAndRedirect', $listing) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white ml-4 w-32 h-10 rounded">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <!-- "Featured Products" -->
    <div class="mx-4 mt-5">
        <x-card class="p-10 bg-white">
            <div class="flex flex-wrap">
                <!-- Title -->
                <div class="w-full text-center">
                    <h2 class="text-2xl mb-4">Featured Products</h2>
                </div>

                <!-- Image -->
                <div class="w-full sm:w-1/3 text-center">
                    <img class="object-cover w-full h-full" src="{{ asset('path/to/first/image') }}" alt="First Product" />
                    <p>Product 1</p>
                </div>
                <div class="w-full sm:w-1/3 text-center">
                    <img class="object-cover w-full h-full" src="{{ asset('path/to/second/image') }}" alt="Second Product" />
                    <p>Product 2</p>
                </div>
                <div class="w-full sm:w-1/3 text-center">
                    <img class="object-cover w-full h-full" src="{{ asset('path/to/third/image') }}" alt="Third Product" />
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
    <script>
        window.showImage = function() {
            let thumbnail = document.getElementById("thumbnailImage");
            let overlay = document.getElementById("imageOverlay");
            let enlargedImg = document.getElementById("enlargedImage");

            enlargedImg.src = thumbnail.src;
            overlay.classList.remove("hidden");

            setTimeout(() => {
                overlay.classList.remove("opacity-0"); // Remove the opacity-0 class to fade in after a short delay
            }, 10);
        };

        window.hideImage = function() {
            let overlay = document.getElementById("imageOverlay");

            overlay.classList.add("opacity-0"); // Add the opacity-0 class to fade out

            setTimeout(() => {
                overlay.classList.add("hidden");
            }, 300); // delay of 300ms to hide it after the transition completes
        };
    </script>

</x-layout>