
        <!-- Start of Desktop Navigation -->
        <nav class="flex justify-between items-center bg-beige_logo text-brown_logo">
            <ul class="hidden md:flex space-x-6 text-lg m-auto">
                @foreach ($parentCategories as $parentCategory)
                    <div class="group relative">
                        <li class="menu_drop hover:bg-beige_logo_hover hover:border-b border-brown_logo ">
                            <a class="flex justify-center items-center text-2xl p-2" href="/listings/{{ $parentCategory->parentcategoryName }}">
                                {{ $parentCategory->parentcategoryName }}
                            </a>
                            @if($parentCategory->categories->count()) <!-- Assuming the relation name is 'categories' -->
                                <div class="hidden absolute top-full left-0 group-hover:flex bg-beige_logo w-full w-max shadow-2xl">
                                    <ul class="grid grid-cols-2">
                                        @foreach ($parentCategory->categories as $category) <!-- Looping through child categories of the current parent category -->
                                            <li class="flex items-center justify-center hover:bg-beige_logo_hover w-full p-2">
                                                <a href="/listings/{{ $category->category_name }}">
                                                    {{ $category->category_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    </div>
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