{{--Convert the list to an array--}}
<head>
    <title>Encore | Item</title>
</head>

@props(['listing'])
<div class="w-full">
    <a href="/listings/{{$listing->id}}" class="text-black hover:text-gray-700">
        <!-- Image -->
        <div class="relative w-full h-96 overflow-hidden">
            <img src="{{$listing->itemImage ? asset('' . $listing->itemImage): asset('images/no-image.png')}}" class="absolute top-0 left-0 w-full h-full object-cover filter blur-lg" alt="{{ $listing->ItemName }} Background Image">
            <img src="{{$listing->itemImage ? asset('' . $listing->itemImage): asset('images/no-image.png')}}" class="absolute top-0 left-0 w-full h-full object-contain" alt="{{ $listing->ItemName }} Image">
        </div>
    </a>
    <!-- Information -->
    
    <div class="p-4">
        <h3 class="text-xl">
            {{ $listing->ItemName }}</a>
        </h3>
        <div class="text-xl font-bold mb-4">
            €{{ $listing->price }}
        </div>
        <div class="flex justify-end">
            <!-- Moved the heart button above the form -->
            <button id="heartButton" class="text-red-500 hover:text-red-600 text-3xl mr-4">
                <i class="far fa-heart"></i>  
                <i class="fas fa-heart hidden"></i>  
            </button>

            <form action="{{ route('cart.add', $listing->id) }}" method="post">
                @csrf
                <button type="submit" class="bg-orange-500 text-white py-1 px-4 rounded-none hover:bg-orange-600">
                    Add to Cart
                </button>
            </form>

            {{-- <form action="{{ route('wishlist.add', $listing->id) }}" method="post">
                @csrf
                <button type="submit" class="ml-2 bg-blue-500 text-white py-1 px-4 rounded-none hover:bg-blue-600">
                    Add Wishlist
                </button>
            </form> --}}

            <form action="{{ route('wishlist.add', $listing->id) }}" method="post">
                @csrf
                <button type="submit" id="heartButton" class="text-red-500 hover:text-red-600 text-3xl mr-4">
                    <i class="far fa-heart"></i>  
                    <i class="fas fa-heart hidden"></i>  
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    const heartButton = document.getElementById('heartButton');

    heartButton.addEventListener('click', function() {
        const heartEmpty = this.querySelector('.far');
        const heartFull = this.querySelector('.fas');
        heartEmpty.classList.toggle('hidden');
        heartFull.classList.toggle('hidden');
    });
</script>

    

