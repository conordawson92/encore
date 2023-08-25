<!-- Start of Desktop Navigation -->
<nav class="flex justify-between items-center bg-beige_logo text-brown_logo">
    <ul class="hidden md:flex space-x-6 text-lg m-auto relative">
        @foreach ($parentCategories as $parentCategory)
                <li class="relative menu_drop hover:bg-beige_logo_hover hover:border-b border-brown_logo ">
                    <a class="flex justify-center items-center text-2xl p-2" href="/parent-category/{{ $parentCategory->id }}">
                        {{ $parentCategory->parentcategoryName }}
                    </a>
                    @if($parentCategory->categories->count())
                        <div class="sub_menu absolute top-full left-0 group-hover:flex bg-beige_logo w-full w-max shadow-2xl">
    
                        </div>
                    @endif
                </li>
        @endforeach
        <li class="hover:bg-beige_logo_hover p-2">
            <a class="text-2xl" href="/about">
                Our Mission
            </a>
        </li>
        <li class="hover:bg-beige_logo_hover p-2">
            <a class="text-2xl" href="/platform">
                Our Platform
            </a>
        </li>
    </ul>
</nav>
<!-- End of Desktop Navigation -->
<!-- Start of Mobile Navigation -->
<div id="menu_mobile_container">
 
</div>
<!-- End of Mobile Navigation -->