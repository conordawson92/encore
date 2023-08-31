<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Encore | Edit Item</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css">
</head>
<body>
<x-layout>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 space-y-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="flex items-center justify-between m-8">
                <a href="/adminUser/items" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">Back to items list</a>
                <div class="flex items-center">
                    <h1 class="text-4xl font-semibold text-orange_logo ml-4">Edit Item</h1>
                    <div class="text-3xl text-orange-500 ml-4">
                        🛠 
                    </div>
                </div>
            </div>

            <form action="{{ route('items.update', ['item' => $item->id]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" class="h-40 w-40 object-contain block mx-auto">

                <div>
                    <label for="itemImage" class="block text-sm font-medium text-gray-700">Item Image</label>
                    <input type="file" id="itemImage" name="itemImage" value="{{ $item->itemImage }}" class="mt-1 p-2 w-full border rounded-md">
                    @error('itemImage')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="ItemName" class="block text-sm font-medium text-gray-700">Item Name</label>
                    <input type="text" id="ItemName" name="ItemName" value="{{ $item->ItemName }}" required class="mt-1 p-2 w-full border rounded-md">
                    @error('ItemName')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Item Description</label>
                    <input type="text" id="description" name="description" value="{{ $item->description }}" required class="mt-1 p-2 w-full border rounded-md">
                    @error('description')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Item Price</label>
                    <input type="text" id="price" name="price" value="{{ $item->price }}" required class="mt-1 p-2 w-full border rounded-md">
                    @error('price')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="size" class="block text-sm font-medium text-gray-700">Item Size</label>
                    <input type="text" id="size" name="size" value="{{ $item->size }}" required class="mt-1 p-2 w-full border rounded-md">
                    @error('size')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700">Item Brand</label>
                    <input type="text" id="brand" name="brand" value="{{ $item->brand }}" required class="mt-1 p-2 w-full border rounded-md">
                    @error('brand')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700">Item Condition</label>
                    <select id="condition" name="condition" required class="mt-1 p-2 w-full border rounded-md">
                        @foreach ($possibleConditions as $enumValue)
                        <option value="{{ $enumValue }}" {{ $enumValue === $item->condition ? 'selected' : '' }}>
                            {{ $enumValue }}
                        </option>
                        @endforeach
                    </select>
                    @error('condition')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Items Quantity</label>
                    <input type="text" id="quantity" name="quantity" value="{{ $item->quantity }}" required class="mt-1 p-2 w-full border rounded-md">
                    @error('quantity')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
    
                <div>
                    <label for="parentCategory" class="block text-sm font-medium text-gray-700">Main Category</label>
                    <select id="parentCategory" name="parentCategory" class="mt-1 p-2 w-full border rounded-md">
                        @foreach ($parentCategories as $parentCategory)
                        <option value="{{ $parentCategory->id }}" {{ $parentCategory->id === $item->category->parentCategory_id ? 'selected' : '' }}>
                            {{ $parentCategory->parentcategoryName }}
                        </option>
                        @endforeach
                    </select>
                    @error('parentCategory')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select class="mt-1 p-2 w-full border rounded-md" id="category" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-parent="{{ $category->parentCategory_id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mt-4 flex justify-center pb-5">
                    <button type="submit" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 mt-8">Update Item</button>
                </div>

            </form>
        </div>
    </div>


    <script>
        // Get references to the select elements
        const parentCategorySelect = document.getElementById('parentCategoryEdit');
        const categorySelect = document.getElementById('categoryEdit');

        // A map of parent category IDs to their corresponding categories
        const categoryMap = {
            !!json_encode($categoryMap) !!
        };

        // Update the category options based on the selected parent category
        parentCategorySelect.addEventListener('change', function() {
            const selectedCategoryId = parentCategorySelect.value;
            const categoryOptions = categoryMap[selectedCategoryId] || [];

            categorySelect.innerHTML = ''; // Clear existing options

            categoryOptions.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option.id;
                optionElement.textContent = option.category_name;
                categorySelect.appendChild(optionElement);
            });
        });

        // Initialize the category options based on the default selected parent category
        const initialParentCategoryId = parentCategorySelect.value;
        const initialCategoryOptions = categoryMap[initialParentCategoryId] || [];

        initialCategoryOptions.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.textContent = option.category_name;
            categorySelect.appendChild(optionElement);
        });
    </script>
</x-layout>




