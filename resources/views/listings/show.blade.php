<head>
    <title>Encore | Item</title>
</head>


<x-layout>

    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <div class="flex flex-col sm:flex-row items-stretch">

                <!-- Responsive mobile -->

                <div id="thumbnail" class="flex justify-center w-78 sm:w-1/2 lg:w-3/4 cursor-pointer" onclick="showImage()">
                    <img id="thumbnailImage" class="object-cover h-58 sm:h-158" src="{{$listing->itemImage ? asset('' . $listing->itemImage) : asset('images/no-image.png')}}" alt="" />
                </div>

                <!-- Information -->
                <div class="flex flex-col w-full sm:w-1/2 items-start justify-between sm:justify-start">
                    <div class="pl-0 sm:pl-8 w-full text-left">

                        <!-- Title and button-->
                        <div class="flex justify-between items-center mb-2 mt-[14px]">
                            <h3 class="text-2xl">{{$listing->ItemName}}</h3>
                            <button id="heartButton" class="text-red-500 hover:text-red-600 text-3xl mr-4">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-heart hidden"></i>
                            </button>
                        </div>

                        <!-- Content -->
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

                    <div class="pl-0 sm:pl-8 w-full text-left sm:text-left bg-gray-200 p-4 rounded">
                        <div id="profile" class="flex gap-4 flex-col p-2 shadow-custom">
                            <div class="flex gap-4 items-center justify-between">
                                <a href="/user/{{$listingUser->id}}">
                                    <div class="flex gap-4 items-center">
                                        <img class="w-20 h-20 rounded-full" src="{{ asset('storage/' . $listingUser->userImage) }}" alt="{{ $listingUser->userName }}'s Profile Photo">
                                        <div class="font-bold text-2xl">
                                            {{$listingUser->userName}}
                                            <div>
                                                @for($i = 1; $i <= 5; $i++) @if($i <=floor($listingUser->userRating))
                                                    <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                                                    @elseif($i - 0.5 == $listingUser->userRating)
                                                    <span class="text-yellow-500"><i class="fas fa-star-half-alt"></i></span>
                                                    @else
                                                    <span class="text-gray-400"><i class="fas fa-star"></i></span>
                                                    @endif
                                                    @endfor
                                            </div>
                                            <p class="text-gray-400 text-sm font-normal">Member since: {{ $listingUser->created_at }}</p>
                                            <p class="text-black text-base font-normal">Location: {{ $listingUser->userLocation }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mt-4 sm:ml-auto flex justify-center sm:justify-start">
                            <form action="{{ route('cart.add', $listing) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-orange-500 text-white w-32 h-10">Add to Cart</button>
                            </form>
                            <a href="{{ route('stripe.checkout') }}" class="bg-green-500 text-white ml-4 w-32 h-10 inline-block text-center leading-10 rounded">Buy</a>
                        </div>
                    </div>
                </div>
        </x-card>
    </div>

    <!-- "Featured Products" -->
    <div class="mx-4 mt-5">
        <x-card class="p-10 bg-white">
            <div class="flex flex-wrap justify-center">
                <!-- Title -->
                <div class="w-full text-center">
                    <h2 class="text-2xl mb-4">Featured Products</h2>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    @foreach($listing as $CategoryID)
                    <div class="text-center flex flex-col items-center">
                        <img class="object-cover w-full h-auto mb-2 md:max-w-md md:max-h-72" src="{{ asset($listing->itemImage) }}" alt="{{ $listing->ItemName }}" />
                        <p class="text-base">{{ $listing->ItemName }}</p>
                        <p class="text-sm text-gray-600">${{ $listing->price }}</p>
                    </div>
                    @endforeach
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

    <script>
        const heartButton = document.getElementById('heartButton');

        heartButton.addEventListener('click', function() {
            const heartEmpty = this.querySelector('.far');
            const heartFull = this.querySelector('.fas');
            heartEmpty.classList.toggle('hidden');
            heartFull.classList.toggle('hidden');
        });
    </script>


</x-layout>