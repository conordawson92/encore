<x-layout>
    <a href="/adminUser/dashboard">Back to Dashboard</a>

    <form action="{{ route('items.storeItem') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="ItemName">Item Name:</label>
        <input type="text" name="ItemName" required>
        <br>
        <label for="itemImage">Item Image:</label>
        <input type="file" name="itemImage">
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="size">Size:</label>
        <input type="text" name="size" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <br>
        <label for="brand">Brand:</label>
        <input type="text" name="brand" required>
        <br>
        <label for="condition">Condition:</label>
        <select name="condition" required>
            <option value="new">New</option>
            <option value="used">Used</option>
            <option value="very used">Very Used</option>
        </select>
        <br>
        <label for="tags">Tags:</label>
        <input type="text" name="tags" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <label for="parentCategory_id">Main Category</label>
        <select id="parentCategory" name="parentCategory_id">
            @foreach ($parentCategories as $parentCategory)
            <option value="{{ $parentCategory->id }}">
                {{ $parentCategory->parentcategoryName }}
            </option>
            @endforeach
        </select>
        <br>
        <label for="category_id">Category</label>
        <select id="category" name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" data-parent="{{ $category->parentCategory_id }}">
                {{ $category->category_name }}
            </option>
            @endforeach
        </select>
        <br>

        <button type="submit">Add Item</button>

    </form>



</x-layout>