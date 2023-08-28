document.addEventListener('DOMContentLoaded', function() {
    console.log("Script is running!");

    function filterCategoriesByParent() {
        var parentCategory = document.getElementById('parentCategory').value;
        var allCategories = document.querySelectorAll('#category option');
        
        // Initially hide all category options
        allCategories.forEach(function(categoryOption) {
            categoryOption.style.display = 'none';
        });

        // Show only the categories that match the selected parent category
        var matchingCategories = document.querySelectorAll('#category option[data-parent="' + parentCategory + '"]');
        matchingCategories.forEach(function(categoryOption) {
            categoryOption.style.display = 'block';
        });

        // Reset category selection
        document.getElementById('category').selectedIndex = -1;
    }

    // Attach the filtering to the parent category dropdown's change event
    document.getElementById('parentCategory').addEventListener('change', filterCategoriesByParent);
    
    // Call the function immediately to filter on page load
    filterCategoriesByParent();
});