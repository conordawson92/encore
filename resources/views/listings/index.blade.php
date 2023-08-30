<head>
    <title>Encore | Items</title>
</head>


<x-layout>
  <div class="flex flex-col md:flex-row">
    <!-- Sidebar  -->
    <div class="h-auto md:w-1/4 md:mr-4 mb-4 md:mb-0 p-2 relative"> 
      <div class="text-center md:text-left mb-2 font-bold text-lg">
        Sort by:
      </div>
      <div class="flex flex-wrap -m-2">
       
        <div class="p-2 w-1/2 md:w-full">
          <a href="?sort=priceAsc" class="block bg-orange-500 text-white rounded-none px-4 py-2 hover:bg-orange-600 w-full text-left">Price (Low to High)</a>
        </div>
        <div class="p-2 w-1/2 md:w-full">
          <a href="?sort=priceDesc" class="block bg-orange-500 text-white rounded-none px-4 py-2 hover:bg-orange-600 w-full text-left">Price (High to Low)</a>
        </div>
        <div class="p-2 w-1/2 md:w-full">
          <a href="?sort=newest" class="block bg-orange-500 text-white rounded-none px-4 py-2 hover:bg-orange-600 w-full text-left">Newest</a>
        </div>
        <div class="p-2 w-1/2 md:w-full">
          <a href="?sort=oldest" class="block bg-orange-500 text-white rounded-none px-4 py-2 hover:bg-orange-600 w-full text-left">Oldest</a>
        </div>
      </div>
    </div>

    <!-- Listing grid -->
    <div class="flex justify-center w-full md:w-3/4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 w-full">
        @if (count($listings) == 0)
          <p>No listing found</p>
        @endif
        @foreach ($listings as $listing)
          <div class="w-full">
            <x-listing-card :listing="$listing" />
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="mt-6 p-4">
    {{$listings->appends(['sort' => request('sort')])->links()}}
  </div>
</x-layout>

