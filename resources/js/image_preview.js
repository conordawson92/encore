export function previewImage(event) {
    console.log("function previewImage");
    const reader = new FileReader();
    const imageField = document.getElementById("imagePreview");

    reader.onload = function() {
        if (reader.readyState === 2) {
            imageField.src = reader.result;
            imageField.classList.remove('hidden');
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}
