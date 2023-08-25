
<form action="{{ route('listings.search') }}" method="GET" class="hidden md:flex gap-4 border border-gray-400 rounded w-200 px-4 bg-white h-11 w-1/2 justify-between mt-4">
    <input name="search" class="focus:outline-none w-full" type="text" placeholder="Search..." />
    <button type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>



