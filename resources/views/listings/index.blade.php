<x-layout>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($listings) == 0)
            <p>No listing found</p>
        @endif

        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing"/>
        @endforeach
    </div>

    <div class="mt-6 p-4">
        {{$listings->appends(['search' => request('search'), 'tag' => request('tag')])->links()}}
    </div>
</x-layout>