<head>
    <title>Encore | Cart</title>
</head>


<x-layout>
    <div class="mx-4">
        <x-card class="p-10 bg-white">
            <h2 class="text-2xl mb-4 text-center">Your Cart</h2>
            @if($cartItems->isEmpty())
            <p class="text-center">Your cart is empty.</p>
            @else
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 text-center">Item</th>
                        <th class="py-2 text-center">Price</th>
                        <th class="py-2 text-center">Quantity</th>
                        <th class="py-2 text-center">Total</th>
                        <th class="py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                    <tr class="border-b">
                        <td class="py-2">{{ $cartItem->item->ItemName }}</td>
                        <td class="py-2 text-center">€{{ $cartItem->item->price }}</td>
                        <td class="py-2">
                            <form action="{{ route('cart.update', $cartItem->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="flex items-center justify-center">
                                    <button type="submit" name="quantity" value="{{ max(1, $cartItem->quantity - 1) }}" class="px-2">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <span class="mx-2">{{ $cartItem->quantity }}</span>
                                    <button type="submit" name="quantity" value="{{ $cartItem->quantity + 1 }}" class="px-2">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td class="py-2 text-center">€{{ $cartItem->item->price * $cartItem->quantity }}</td>
                        <td class="py-2">
                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500 hover:underline">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right py-2 font-semibold">Total Purchase:</td>
                        <td class="py-2 font-semibold text-center">€{{ $cartItems->sum(function ($cartItem) { return $cartItem->item->price * $cartItem->quantity; }) }}</td>
                        <td class="py-2"></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 text-center">
                <a href="{{ route('listings.index') }}" class="text-blue-500 hover:underline">Continue Shopping</a>
            </div>
            <div class="text-center mt-6">
                @if($cartItems->sum(function ($cartItem) { return $cartItem->item->price * $cartItem->quantity; }) > 0)
                <a href="{{ route('stripe.checkout') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                    Pay
                </a>
                @else
                <!-- Cart total is 0, display a disabled button -->
                <button class="bg-gray-300 text-white font-bold py-2 px-4 rounded cursor-not-allowed" disabled>
                    Pay
                </button>
                @endif
            </div>
            @endif
        </x-card>
    </div>
</x-layout>