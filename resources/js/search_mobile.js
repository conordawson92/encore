document.addEventListener("DOMContentLoaded", function() {
    const searchOverlay = document.getElementById("search-overlay");
    const showSearchBtn = document.getElementById("show-search");

    showSearchBtn.addEventListener("click", function() {
        searchOverlay.classList.remove("hidden");
    });

    searchOverlay.addEventListener("click", function(e) {
        // Check if the clicked element is the overlay itself (not the form or its children)
        if (e.target === searchOverlay) {
            searchOverlay.classList.add("hidden");
        }
    });
});