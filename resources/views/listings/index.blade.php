<head>
  <title>Encore | Items</title>
</head>

<x-layout class="flex-col">
  <div class="flex flex-col md:flex-row">
    <!-- Sidebar  -->
    <div class="h-auto w-full md:w-1/4 md:mr-4 mb-4 md:mb-0 p-2 relative" style="background-image: url('{{ asset('storage/images/assets/homepage/pattern-7258598_1920.png') }}'); background-size: cover; background-position: center;">
 
      <div class="text-center mb-2 font-bold text-lg ">
        Sort by:
      </div>

      <!-- Sort by Card -->
      <div class="rounded-lg p-4 md:p-6">
        <div class="flex flex-wrap -m-2">
          @php
          $sortOptions = [
          'priceAsc' => 'Price (Low to High)',
          'priceDesc' => 'Price (High to Low)',
          'newest' => 'Newest',
          'oldest' => 'Oldest'
          ];
          @endphp

          @foreach ($sortOptions as $key => $value)
          <div class="p-2 w-1/2 md:w-full">
            <a href="?sort={{ $key }}" class="block bg-orange-500 text-white rounded-md px-4 py-2 hover:bg-orange-600 w-full text-center md:text-left">{{ $value }}</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Listing grid -->
    <div class="flex justify-center w-full md:w-3/4 p-4 md:p-0"> <!-- Added padding for mobile -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 md:gap-8 w-full">
        @if (count($listings) == 0)
        <p>No listing found</p>
        @endif

        @foreach ($listings as $listing)
        <div class="w-full p-2"> <!-- Added padding around each listing -->
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