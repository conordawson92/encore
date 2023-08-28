<x-layout>
    <div class="container mx-auto">

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
</x-layout>