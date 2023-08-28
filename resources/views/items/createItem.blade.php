<x-layout>
    <div class="max-w-md mx-auto p-6 bg-white border-1 border-brown_logo shadow-custom-xl">
        <a href="/adminUser/dashboard" class="py-1 px-2 border-2 border-brown_logo hover:bg-beige_logo_hover inline-block mb-6 text-brown_logo transition-all">Back to Dashboard</a>

        <form action="{{ route('items.storeItem') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="ItemName" class="block text-brown_logo font-medium">Item Name:</label>
                <input type="text" name="ItemName" required class="mt-1 w-full p-2 border border-2 border-brown_logo">
            </div>

            <div>
                <label for="itemImage" class="block text-brown_logo font-medium bg-">Item Image:</label>
                <input type="file" name="itemImage" class="mt-1">
            </div>

            <div>
                <label for="description" class="block text-brown_logo font-medium">Description:</label>
                <textarea name="description" required class="mt-1 w-full p-2 border border-2 border-brown_logo"></textarea>
            </div>

            <label for="price" class="block text-brown_logo font-medium bg-">Price:</label>
            <input type="text" name="price" class="mt-1" required>
            <!-- ... [Repeat the above pattern for each input field] ... -->

            <div>
                <label for="condition" class="block text-brown_logo font-medium">Condition:</label>
                <select name="condition" required class="mt-1 w-full p-2 border border-2 border-brown_logo">
                    <option value="new">New</option>
                    <option value="used">Used</option>
                    <option value="very used">Very Used</option>
                </select>
            </div>
            <label class="block text-brown_logo font-medium" for="tags">Tags:</label>
            <input class="mt-1 w-full p-2 border border-2 border-brown_logo" type="text" name="tags" required>
            <br>
            <label class="block text-brown_logo font-medium" for="quantity">Quantity:</label>
            <input class="mt-1 w-full p-2 border border-2 border-brown_logo" type="number" name="quantity" required>
            <br>
            <label class="block text-brown_logo font-medium" for="parentCategory_id">Main Category</label>
            <select class="mt-1 w-full p-2 border border-2 border-brown_logo" id="parentCategory" name="parentCategory_id">
                @foreach ($parentCategories as $parentCategory)
                <option value="{{ $parentCategory->id }}">
                    {{ $parentCategory->parentcategoryName }}
                </option>
                @endforeach
            </select>
            <br>
            <label class="block text-brown_logo font-medium" for="category_id">Category</label>
            <select class="mt-1 w-full p-2 border border-2 border-brown_logo" id="category" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" data-parent="{{ $category->parentCategory_id }}">
                    {{ $category->category_name }}
                </option>
                @endforeach
            </select>

            <div>
                <button type="submit" class="uppercase font-bold w-full text-brown_logo p-2 border-2 border-brown_logo hover:bg-beige_logo_hover focus:outline-none transition:all">
                    Add Item
                </button>
            </div>
        </form>
    </div>



</x-layout>