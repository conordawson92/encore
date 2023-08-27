<div id="search-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 md:hidden flex items-center justify-center">
    <form action="{{ route('listings.search') }}" class="flex gap-4 border border-gray-400 rounded px-4 py-3 bg-white h-auto w-4/5 justify-between items-center">
        <input name="query" class="focus:outline-none w-full h-6" type="text" placeholder="Search..." />
        <button type="submit" id="search_button" class="h-6">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
</div>