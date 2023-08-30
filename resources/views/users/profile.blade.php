<!--html diaply for the admin complete dashboard with all the informations, history, messages, etc...and the manage options link-->
<head>
    <title>Encore | Dashboard</title>
</head>
<x-layout>
    <div class="w-[65%] mx-auto">
        <!--the admin profile informations-->
        <div id="profile" class="flex gap-4 flex-col p-2 shadow-custom">
            <div class="flex gap-4 items-center justify-between">
                <div class="flex gap-4 items-center">
                    <img class="w-20 h-20 rounded-full" src="{{ asset('storage/' . $user->userImage) }}" alt="{{ $user->userName }}'s Profile Photo">
                    <div class="font-bold text-2xl">
                        {{ $user->userName }}
                        <div>
                            @for($i = 1; $i <= 5; $i++) @if($i <=floor($user->userRating))
                                <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                                @elseif($i - 0.5 == $user->userRating)
                                <span class="text-yellow-500"><i class="fas fa-star-half-alt"></i></span>
                                @else
                                <span class="text-gray-400"><i class="fas fa-star"></i></span>
                                @endif
                                @endfor
                        </div>
                        <p class="text-gray-400 text-sm font-normal">Member since: {{ $user->created_at }}</p>
                        <p class="text-black text-base font-normal">Location: {{ $user->userLocation }}</p>
                    </div>            
                </div>
            </div>
            
        </div>
        <!--the selling items-->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">{{ $user->userName }}'s Items For Sale</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
                @if(count($user->sellerItems) == 0)
                <p>No items for sale.</p>
                @else
        
                    @foreach ($user->sellerItems as $item)
                    @if($item->status === 'available')
                    <div class="border overflow-hidden shadow-custom relative transition-transform transform hover:scale-105">
                        <a href="/listings/{{$item->id}}" class="block">
                            <img class="w-full h-48 object-cover" src="{{$item->itemImage ? asset('' . $item->itemImage): asset('images/no-image.png')}}" alt="{{ $item->ItemName }} Image">
                            <div class="p-4">
                                <h4 class="text-lg font-semibold mb-2">{{ $item->ItemName }}</h4>
                                <p class="text-gray-600">Description: {{ $item->description }}</p>
                                <p class="text-gray-600">Price: {{ $item->price }}€</p>
                                <p class="text-gray-600">Size: {{ $item->size }}</p>
                                <p class="text-gray-600">Brand: {{ $item->brand }}</p>
                                <p class="text-gray-600">Condition: {{$item->condition}}</p>
                                <p class="text-gray-600">Status: {{$item->status}}</p>
                                <p class="text-gray-600">Created on: {{$item->dateListed}}</p>
                                <p class="text-gray-600">Quantity available: {{$item->quantity}}</p>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
        
                @endif
        
            </div>
        </div>
        <!--all the reviews -->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">{{ $user->userName }}'s Reviews</h2>
            @if ($reviewsReceived->count() > 0)
            <table class="min-w-full bg-white border rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Buyer</th>
                        <th class="py-2 px-4 border-b text-left">Item</th>
                        <th class="py-2 px-4 border-b text-left">Date of Review</th>
                        <th class="py-2 px-4 border-b text-left">Comment</th>
                        <th class="py-2 px-4 border-b text-left">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviewsReceived as $review)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $review->item->buyer->userName }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->item->ItemName }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->dateReview }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->comment }}</td>
                        <td class="py-2 px-4 border-b">{{ $review->rating }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600 mt-2">No reviews received.</p>
            @endif
        </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
</x-layout>