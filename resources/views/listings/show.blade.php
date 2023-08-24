<x-layout>

    {{-- @include('partials._search') --}}

    <a href="/listings" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10 bg-black">
                <div class="flex flex-col items-center justify-center text-center">
                    <img class="w-48 mr-6 mb-6" src="{{$listing->itemImage ? asset('' . $listing->itemImage): asset('images/no-image.png')}}" alt="" />

                    <h3 class="text-2xl mb-2">{{$listing->ItemName}}</h3>
                    <div class="text-xl font-bold mb-4">{{$listing->description}}</div>
                    <x-listing-tags :tagsCsv="$listing->tags" />
                    <div class="text-lg my-4">
                        €{{$listing->price}}
                    </div>
                    <div class="text-lg my-4">
                        Size: {{$listing->size}}
                    </div>
                    <div class="text-lg my-4">
                        Brand: {{$listing->brand}}
                    </div>
                    <div class="text-lg my-4">
                        Condition: {{$listing->condition}}
                    </div>
                    <div class="text-lg my-4">
                        Posted: {{$listing->dateListed}}
                    </div>
                    <div class="text-lg my-4">
                        Quantity: {{$listing->quantity}}
                    </div>
                    <div class="text-lg my-4">
                        Status: {{$listing->status}}
                    </div>
                </div>
                <button>Buy</button>
                <button>Message</button>
        </x-card>
    </div>
</x-layout>