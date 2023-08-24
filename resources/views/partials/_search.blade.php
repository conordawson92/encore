
<form action="{{ route('listings.search') }}" class="hidden md:flex gap-4 border border-gray-400 rounded w-200 px-4 bg-white h-11 w-1/2 justify-between mt-4">
    <input name="query" class="focus:outline-none w-full" type="text" placeholder="Search..." />
    <button type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>



