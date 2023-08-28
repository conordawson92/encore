<x-layout>

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

    {{-- <div class="mt-6 p-4">
        {{$listings->links()}}
    </div> --}}

</x-layout>