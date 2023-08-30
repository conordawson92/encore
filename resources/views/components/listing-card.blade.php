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
            <form action="{{ route('cart.add', $listing->id) }}" method="post">
                @csrf
                <button type="submit" class="bg-orange-500 text-white py-1 px-4 rounded-none hover:bg-orange-600">
                    Add to Cart
                </button>
            </form>
            
            <button class="ml-2 text-red-500 hover:text-red-600 toggle-heart">
                <i class="far fa-heart heart-empty"></i>
                <i class="fas fa-heart heart-full hidden"></i>
            </button>
        </div>
    </div>
</div>

    

