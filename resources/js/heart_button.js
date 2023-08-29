document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.toggle-heart').forEach(button => {
        button.addEventListener('click', function() {
            this.querySelector('.heart-empty').classList.toggle('hidden');
            this.querySelector('.heart-full').classList.toggle('hidden');
        });
    });
});

