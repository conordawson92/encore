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
    <input type="text" id="condition" name="condition" value="{{ $item->condition }}" required>
    <br>

    <label for="quantity">Items Quantity</label>
    <input type="text" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
    <br>

    <label for="parentCategory">Main Category</label>
    <select id="parentCategory" name="parentCategory">
        @foreach ($parentCategories as $parentCategory)
            <option value="{{ $parentCategory->id }}"
                {{ $parentCategory->id === $item->category->parentCategory_id ? 'selected' : '' }}>
                {{ $parentCategory->parentcategoryName }} 
            </option>
        @endforeach
    </select>

    <label for="category">Category</label>
    <select id="category" name="category">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ $category->id === $item->category_id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>
    <br>

    <button type="submit">Update Item</button>
</form>
