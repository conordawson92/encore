<a href="/adminUser/dashboard">Back to Dashboard</a>

<form action="{{ route('items.storeItem') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="itemImage">Item Image</label>
    <input type="file" id="itemImage" name="itemImage">
    <br>

    <label for="ItemName">Item Name</label>
    <input type="text" id="ItemName" name="ItemName" required>
    <br>

    <label for="description">Item Description</label>
    <input type="text" id="description" name="description" required>
    <br>

    <label for="price">Item Price</label>
    <input type="text" id="price" name="price" required>
    <br>

    <label for="size">Item Size</label>
    <input type="text" id="size" name="size" required>
    <br>

    <label for="brand">Item Brand</label>
    <input type="text" id="brand" name="brand" required>
    <br>

    <label for="tags">Tags</label>
    <input type="text" id="tags" name="tags" required>
    <br>

    <label for="condition">Item Condition</label>
    <input type="text" id="condition" name="condition" required>
    <br>

    <label for="quantity">Items Quantity</label>
    <input type="text" id="quantity" name="quantity"  required>
    <br>

    <label for="parentCategory_id">Main Category</label>
    <select id="parentCategory" name="parentCategory_id">
        @foreach ($parentCategories as $parentCategory)
            <option value="{{ $parentCategory->id }}">
                {{ $parentCategory->parentcategoryName }} 
            </option>
        @endforeach
    </select>

    <label for="category_id">Category</label>
    <select id="category" name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>
    <br>

    <button type="submit">Add Item</button>
</form>
