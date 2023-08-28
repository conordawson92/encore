<x-layout>
    <a href="/adminUser/items">Back to Items List</a>

    <form action="{{ route('items.update', ['item' => $item->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <img src="{{ $item->itemImage }}" alt="{{ $item->ItemName }}" style="max-width: 150px; max-height: 150px;">
        <br>

        <label for="itemImage">Item Image</label>
        <input type="file" id="itemImage" name="itemImage" value="{{ $item->itemImage }}">
        <br>

        <label for="ItemName">Item Name</label>
        <input type="text" id="ItemName" name="ItemName" value="{{ $item->ItemName }}" required>
        <br>

        <label for="description">Item Description</label>
        <input type="text" id="description" name="description" value="{{ $item->description }}" required>
        <br>

        <label for="price">Item Price</label>
        <input type="text" id="price" name="price" value="{{ $item->price }}" required>
        <br>

        <label for="size">Item Size</label>
        <input type="text" id="size" name="size" value="{{ $item->size }}" required>
        <br>

        <label for="brand">Item Brand</label>
        <input type="text" id="brand" name="brand" value="{{ $item->brand }}" required>
        <br>

        <label for="condition">Item Condition</label>
        <select id="condition" name="condition" required>
            @foreach ($possibleConditions as $enumValue)
            <option value="{{ $enumValue }}" {{ $enumValue === $item->condition ? 'selected' : '' }}>
                {{ $enumValue }}
            </option>
            @endforeach
        </select>
        <br>

        <label for="quantity">Items Quantity</label>
        <input type="text" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
        <br>

        <label for="parentCategory">Main Category</label>
        <select id="parentCategory" name="parentCategory">
            @foreach ($parentCategories as $parentCategory)
            <option value="{{ $parentCategory->id }}" {{ $parentCategory->id === $item->category->parentCategory_id ? 'selected' : '' }}>
                {{ $parentCategory->parentcategoryName }}
            </option>
            @endforeach
        </select>

        <label for="category">Category</label>
        <select id="category" name="category">
            <!-- This option will be dynamically populated using JavaScript -->
        </select>
        <br>

        <button type="submit">Update Item</button>
    </form>

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