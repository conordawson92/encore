{{-- Convert the list to an array --}}
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
            {{ $listing->ItemName }}
        </h3>
        <div class="text-xl font-bold mb-4">
            €{{ $listing->price }}
        </div>
        <div class="flex justify-end">

            <!-- Use class names for heart buttons -->
            <form action="{{ route('wishlist.toggle', $listing->id) }}" method="post">
                @csrf
                <button type="submit" class="heartButton text-red-500 hover:text-red-600 text-3xl px-4 py-2">
                    @auth
                    @if(auth()->user()->wishlist->contains($listing))
                    <i class="fas fa-heart mt-[-14px]"></i>
                    @else
                    <i class="far fa-heart mt-[-14px]"></i>
                    @endif
                    @endauth
                </button>
            </form>

            <form action="{{ route('cart.add', $listing->id) }}" method="post">
                @csrf
                <button type="submit" class="bg-orange-500 text-white py-1 px-4 rounded-none hover:bg-orange-600">
                    Add to Cart
                </button>
            </form>

        </div>
    </div>
</div>

<script>
    const heartButtons = document.querySelectorAll('.heartButton');

    heartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const heartEmpty = button.querySelector('.far');
            const heartFull = button.querySelector('.fas');
            heartEmpty.classList.toggle('hidden');
            heartFull.classList.toggle('hidden');

            const itemId = {
                {
                    $listing - > id
                }
            };
            fetch(`/wishlist/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('An error occurred:', error);
                });
        });
    });
</script>