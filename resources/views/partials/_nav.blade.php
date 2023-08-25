        <!-- Start of Desktop Navigation -->
        <nav class="flex justify-between items-center bg-beige_logo text-brown_logo">
            <ul class="hidden md:flex space-x-6 text-lg m-auto">
                @foreach ($parentCategories as $parentCategory)
                    <li class="hover:bg-beige_logo_hover p-2">
                        <a class="text-2xl" href="{{ route('showItemsByParentCategory', ['parentCategory' => $parentCategory->id]) }}">
                            {{ $parentCategory->parentcategoryName }}
                        </a>
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