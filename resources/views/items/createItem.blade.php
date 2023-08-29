<x-layout>

    <div class="max-w-md mx-auto p-6 bg-white border-1 border-brown_logo shadow-custom-xl">
        <a href="/adminUser/dashboard" class="py-1 px-2 border-2 border-brown_logo hover:bg-beige_logo_hover inline-block mb-6 text-brown_logo transition-all">Back to Dashboard</a>

        <!-- Display validation errors if they exist -->
        @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('items.storeItem') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="ItemName" class="block text-brown_logo font-medium">Item Name:</label>
                <input type="text" name="ItemName" required class="mt-1 w-full p-2 border-2 border-brown_logo">
                @error('ItemName')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="itemImage" class="block text-brown_logo font-medium bg-">Item Image:</label>
                <input type="file" name="itemImage" class="mt-1">
                @error('itemImage')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-brown_logo font-medium">Description:</label>
                <textarea name="description" required class="mt-1 w-full p-2 border-2 border-brown_logo"></textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-brown_logo font-medium">Price:</label>
                <input type="text" name="price" class="mt-1 w-full p-2 border-2 border-brown_logo" required>
                @error('price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="brand" class="block text-brown_logo font-medium">Brand:</label>
                <input type="text" name="brand" class="mt-1 w-full p-2 border-2 border-brown_logo" required>
                @error('brand')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="size" class="block text-brown_logo font-medium">Size:</label>
                <input type="text" name="size" class="mt-1 w-full p-2 border-2 border-brown_logo" required>
                @error('size')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="condition" class="block text-brown_logo font-medium">Condition:</label>
                <select name="condition" required class="mt-1 w-full p-2 border-2 border-brown_logo">
                    <option value="new">New</option>
                    <option value="used">Used</option>
                    <option value="very used">Very Used</option>
                </select>
                @error('condition')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <label class="block text-brown_logo font-medium" for="tags">Tags:</label>
            <input class="mt-1 w-full p-2 border-2 border-brown_logo" type="text" name="tags" required>
            @error('tags')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <br>
            <label class="block text-brown_logo font-medium" for="quantity">Quantity:</label>
            <input class="mt-1 w-full p-2 border-2 border-brown_logo" type="number" name="quantity" required>
            @error('quantity')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <br>
            <label class="block text-brown_logo font-medium" for="parentCategory_id">Main Category</label>
            <select class="mt-1 w-full p-2 border-2 border-brown_logo" id="parentCategory" name="parentCategory_id">
                @foreach ($parentCategories as $parentCategory)
                <option value="{{ $parentCategory->id }}">
                    {{ $parentCategory->parentcategoryName }}
                </option>
                @endforeach
            </select>
            @error('parentCategory_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <br>
            <label class="block text-brown_logo font-medium" for="category_id">Category</label>
            <select class="mt-1 w-full p-2 border-2 border-brown_logo" id="category" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" data-parent="{{ $category->parentCategory_id }}">
                    {{ $category->category_name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <div>
                <button type="submit" class="uppercase font-bold w-full text-brown_logo p-2 border-2 border-brown_logo hover:bg-beige_logo_hover focus:outline-none transition:all">
                    Add Item
                </button>
            </div>
        </form>
    </div>



</x-layout>