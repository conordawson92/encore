<x-layout>
    <div class="mb-4">
        Sort by: 
        <a href="?sort=priceAsc">Price (Low to High)</a> | 
        <a href="?sort=priceDesc">Price (High to Low)</a> | 
        <a href="?sort=newest">Newest</a> | 
        <a href="?sort=oldest">Oldest</a>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4 mx-2">
            @if (count($listings) == 0)
                <p>No listing found</p>
            @endif
            
            @foreach ($listings as $listing)
                <div class="col">
                    <x-listing-card :listing="$listing"/>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6 p-4">
        {{$listings->appends(['search' => request('search'), 'tag' => request('tag'), 'sort' => request('sort')])->links()}}
    </div>
</x-layout>