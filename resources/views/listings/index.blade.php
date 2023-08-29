<x-layout>
    <div class="mb-4">
        Sort by:
        <a href="?search={{ request('search') }}&sort=priceAsc">Price (Low to High)</a> |
        <a href="?search={{ request('search') }}&sort=priceDesc">Price (High to Low)</a> |
        <a href="?search={{ request('search') }}&sort=newest">Newest</a> |
        <a href="?search={{ request('search') }}&sort=oldest">Oldest</a>
    </div>
    <div class="flex flex-col md:flex-row">

        <!-- Sidebar with sort filters for desktop -->
        <div class="md:w-1/4 md:mr-4 mb-4 md:mb-0 p-2 bg-gray-100 rounded">
            <div class="text-center md:text-left mb-2 font-bold text-lg">
                Sort by:
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2 md:w-full">
                    <a href="?sort=priceAsc" class="block bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600 w-full text-center">Price (Low to High)</a>
                </div>
                <div class="p-2 w-1/2 md:w-full">
                    <a href="?sort=priceDesc" class="block bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600 w-full text-center">Price (High to Low)</a>
                </div>
                <div class="p-2 w-1/2 md:w-full">
                    <a href="?sort=newest" class="block bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600 w-full text-center">Newest</a>
                </div>
                <div class="p-2 w-1/2 md:w-full">
                    <a href="?sort=oldest" class="block bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600 w-full text-center">Oldest</a>
                </div>
            </div>
        </div>

        <!-- Listing Grid -->
        <div class="flex justify-center md:w-3/4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full">
                @if (count($listings) == 0)
                    <p>No listing found</p>
                @endif

    <!-- Listing Grid -->
    <div class="flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full md:w-4/5">
            @if (count($listings) == 0)
            <p>No listing found</p>
            @endif

            @foreach ($listings as $listing)
            <div>
                <x-listing-card :listing="$listing" />
            </div>
            @endforeach
        </div>
    </div>
    </div>

    <div class="mt-6 p-4">
        {{$listings->appends(['search' => request('search'), 'tag' => request('tag'), 'sort' => request('sort')])->links()}}
    </div>
</x-layout>



