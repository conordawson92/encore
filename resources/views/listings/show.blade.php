<head>
    <title>Encore | Item</title>
</head>


<x-layout>

    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <div class="flex flex-col sm:flex-row items-stretch">

                <!-- Responsive mobile -->
                <div id="thumbnail" class="flex justify-center w-full sm:w-1/2 lg:w-3/4 cursor-pointer" onclick="showImage()">
                    <img id="thumbnailImage" class="object-cover h-58 sm:h-158" src="{{$listing->itemImage ? asset('' . $listing->itemImage) : asset('images/no-image.png')}}" alt="" />
                </div>

                <!-- Information -->
                <div class="flex flex-col w-full sm:w-1/2 items-start justify-between sm:justify-start py-4 sm:pl-8">

                   <div class="w-full text-left border bg-gray-50 p-5 rounded-md shadow-sm">
                     
    <!-- Title and Heart Button -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 border-b pb-3">

        <!-- Title -->
        <h3 class="text-3xl font-semibold mb-2 sm:mb-0">{{$listing->ItemName}}</h3>

        <!-- Wishlist Button -->
        <form action="{{ route('wishlist.toggle', $listing) }}" method="POST" class="mt-2 sm:mt-0">
            @csrf
            <button type="submit" class="heart-button focus:outline-none">
                @auth
                @if(auth()->user()->wishlist->contains($listing))
                <i class="fas fa-heart text-red-500 text-3xl"></i> <!-- Filled heart -->
                @else
                <i class="far fa-heart text-red-500 text-3xl"></i> <!-- Empty heart -->
                @endif
                @endauth
            </button>
        </form>
    </div>

    <!-- Description -->
    <div class="text-xl font-medium mt-3 mb-4">{{$listing->description}}</div>

    <!-- Tags -->
    <x-listing-tags :tagsCsv="$listing->tags" />

    <!-- Product Details -->
    <div class="grid grid-cols-2 gap-4 my-4">
        <div class="text-lg font-semibold mb-1">Price:</div>
        <div class="text-lg">€{{$listing->price}}</div>

        <div class="text-lg font-semibold mb-1">Size:</div>
        <div class="text-lg">{{$listing->size}}</div>

        <div class="text-lg font-semibold mb-1">Brand:</div>
        <div class="text-lg">{{$listing->brand}}</div>

        <div class="text-lg font-semibold mb-1">Condition:</div>
        <div class="text-lg">{{$listing->condition}}</div>

        <div class="text-lg font-semibold mb-1">Posted:</div>
        <div class="text-lg">{{$listing->dateListed}}</div>

        <div class="text-lg font-semibold mb-1">Quantity:</div>
        <div class="text-lg">{{$listing->quantity}}</div>

        <div class="text-lg font-semibold mb-1">Status:</div>
        <div class="text-lg">{{$listing->status}}</div>
    </div>
</div>


                    <div class="pl-0 sm:pl-8 w-full text-left sm:text-left p-4 rounded">
                        <div id="profile" class="flex gap-4 flex-col p-2">
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
                            <form action="{{ route('cart.addAndRedirect', $listing) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white ml-4 w-32 h-10 inline-block text-center leading-10 rounded">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
        </x-card>
    </div>




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
        const itemId = {{ $listing->id }}; // Assuming this is the item's ID

        @auth
        @if(auth()->user()->wishlist->contains($listing))
        const heartEmpty = heartButton.querySelector('.far');
        const heartFull = heartButton.querySelector('.fas');
        heartEmpty.classList.add('hidden');
        heartFull.classList.remove('hidden');
        @endif
        @endauth

        heartButton.addEventListener('click', function() {
            const heartEmpty = this.querySelector('.far');
            const heartFull = this.querySelector('.fas');
            heartEmpty.classList.toggle('hidden');
            heartFull.classList.toggle('hidden');

            fetch(`/wishlist/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message); // Display the response message
                    }
                })
                .catch(error => {
                    console.error('An error occurred:', error);
                });
        });
    </script>



</x-layout>