
<form action="{{ route('listings.search') }}" class="hidden md:flex gap-4 border border-gray-400 rounded w-200 px-4 bg-white h-auto w-1/2 justify-between items-center">
    <input name="query" class="focus:outline-none w-full" type="text" placeholder="Search..." />
    <button type="submit" id="search_button">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>


