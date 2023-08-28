window.showImage = function () {
    let thumbnail = document.getElementById("thumbnailImage");
    let overlay = document.getElementById("imageOverlay");
    let enlargedImg = document.getElementById("enlargedImage");

    enlargedImg.src = thumbnail.src;
    overlay.classList.remove("hidden");

    setTimeout(() => {
        overlay.classList.remove("opacity-0"); // Remove the opacity-0 class to fade in after a short delay
    }, 10);
};

window.hideImage = function () {
    let overlay = document.getElementById("imageOverlay");

    overlay.classList.add("opacity-0"); // Add the opacity-0 class to fade out

    setTimeout(() => {
        overlay.classList.add("hidden");
    }, 300); // delay of 300ms to hide it after the transition completes
};
