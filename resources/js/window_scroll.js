// Function to handle the smooth scroll to the top
document.getElementById("backToTop").addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// Show the button after the user has scrolled down a certain distance
window.addEventListener("scroll", function () {
    const scrollPosition = window.pageYOffset;
    const backToTopButton = document.getElementById("backToTop");

    if (scrollPosition > 300) {
        backToTopButton.classList.add("visible");
    } else {
        backToTopButton.classList.remove("visible");
    }
});

// Define a constant variable `svg` and set it to the HTML element with the ID "triangles"
const svg = document.getElementById('triangles');
// Add a click event listener to the `svg` element
svg.onclick = (e) => {
    // Define an array variable `colors` with hex color values
    const colors = ['#fff4e0', '#e6d2b1', '#6d3114', '#a04a20', '#DCBC6C', 'f5804d',]
    // Define a function variable `rando` that returns a random item from the `colors` array
    const rando = () => colors[Math.floor(Math.random() * colors.length)];
    // Set the CSS custom properties (variables) `--dark-color` and `--light-color` to random colors from the `colors` array
    // This adds some randomization to the colors of the HTML elements on the webpage
    document.documentElement.style.cssText = `
    --dark-color: ${rando()};
    --light-color: ${rando()};
  `;
};

window.addEventListener('resize', function() {
    const scrollTopButton = document.getElementById('backToTop');
    
    if (window.innerWidth <= 768) { // Assuming 768px as the mobile breakpoint
        scrollTopButton.style.display = 'none';
    } else {
        scrollTopButton.style.display = 'block';
    }
});

// Trigger the function initially to set the correct state
window.dispatchEvent(new Event('resize'));