    // Get references to the select elements
    const parentCategorySelect = document.getElementById('parentCategory');
    const categorySelect = document.getElementById('category');

    // A map of parent category IDs to their corresponding categories
    const categoryMap = {!! json_encode($categoryMap) !!};

    // Update the category options based on the selected parent category
    parentCategorySelect.addEventListener('change', function () {
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