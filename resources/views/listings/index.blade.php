<x-layout>
    <div class="mb-4">
        Sort by: 
        <a href="?sort=priceAsc">Price (Low to High)</a> | 
        <a href="?sort=priceDesc">Price (High to Low)</a> | 
        <a href="?sort=newest">Newest</a> | 
        <a href="?sort=oldest">Oldest</a>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($listings) == 0)
            <p>No listing found</p>
        @endif

        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing"/>
        @endforeach
    </div>

    <div class="mt-6 p-4">
        {{$listings->appends(['search' => request('search'), 'tag' => request('tag'), 'sort' => request('sort')])->links()}}
    </div>
</x-layout>