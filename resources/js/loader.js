document.onreadystatechange = function () {
    if (document.readyState === "interactive") {
        // When DOM is ready
        showLoadingSpinner();
    } else if (document.readyState === "complete") {
        // When everything is loaded
        hideLoadingSpinner();
    }
};

function showLoadingSpinner() {
    document.getElementById("loadingSpinner").classList.remove("hidden");
}

function hideLoadingSpinner() {
    document.getElementById("loadingSpinner").classList.add("hidden");
}

