<x-layout>
    <div class="mb-4">
        Sort by: 
        <a href="?sort=priceAsc">Price (Low to High)</a> | 
        <a href="?sort=priceDesc">Price (High to Low)</a> | 
        <a href="?sort=newest">Newest</a> | 
        <a href="?sort=oldest">Oldest</a>
    </div>

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