<head>
    <title>Encore | Add Item</title>
</head>

<x-layout>

    <div class="w-full md:w-[60%] mx-auto p-6 bg-white border-1 border-brown_logo shadow-custom-xl my-2">
        <a href="/adminUser/dashboard" class="py-1 px-2 text-laravel hover:underline">Back to Dashboard</a>
        <div class="flex items-center">
            <h1 class="text-4xl font-semibold text-orange_logo py-6">Add Item</h1>
        </div>

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
            <div class="flex flex-wrap gap-4">
                <div class="w-full">
                    <label for="ItemName" class="block text-lg font-medium text-gray-700">Item Name</label>
                    <input type="text" name="ItemName" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                </div>
                <div class="w-full">
                    <label for="itemImage" class="block text-lg font-medium text-gray-700">Item Image:</label>
                    <input type="file" name="itemImage" class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md" id="itemImage" onchange="previewImage(event)">
                </div>
                <div class="w-full">
                    <label class="block text-lg font-medium text-gray-700">Image Preview:</label>
                    <img id="imagePreview" src="#" alt="Image Preview" class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md" />
                </div>
            </div>
            <div class="w-full">
                <label for="description" class="block text-lg font-medium text-gray-700 mt-12">Description:</label>
                <textarea name="description" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md"></textarea>
            </div>
            <div class="flex flex-wrap gap-4">
                <div class="w-full">
                    <label for="brand" class="block text-lg font-medium text-gray-700">Brand:</label>
                    <input type="text" name="brand" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                </div>
                <div class="w-full">
                    <label for="size" class="block text-lg font-medium text-gray-700">Size:</label>
                    <input type="text" name="size" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                </div>
                <div class="w-full">
                    <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity:</label>
                    <input type="number" name="quantity" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                </div>
                <div class="w-full">
                    <label for="tags" class="block text-lg font-medium text-gray-700">Tags:</label>
                    <input type="text" name="tags" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                </div>
            </div>
            <div class="flex flex-wrap gap-4">
                <div class="w-full">
                    <label for="condition" class="block text-lg font-medium text-gray-700">Condition:</label>
                    <select name="condition" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                        <option value="new">New</option>
                        <option value="used">Used</option>
                        <option value="very used">Very Used</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="parentCategory_id" class="block text-lg font-medium text-gray-700">Main Category</label>
                    <select name="parentCategory_id" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                        @foreach ($parentCategories as $parentCategory)
                            <option value="{{ $parentCategory->id }}">
                                {{ $parentCategory->parentcategoryName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="category_id" class="block text-lg font-medium text-gray-700">Category</label>
                    <select name="category_id" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-parent="{{ $category->parentCategory_id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="price" class="block text-lg font-medium text-gray-700">Price:</label>
                    <input type="text" name="price" required class="mt-1 w-full p-2 border-2 border-grey_logo border rounded-md">
                </div>
            </div>
            <div class="mt-4 flex justify-center pb-5">
                <button type="submit" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-900 transition-all duration-300 mt-8">Add Item</button>
            </div> 
        </form>
    </div>
</x-layout>





{{-- <!-- Javascript Code -->
<script type="text/javascript">
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script> --}}






