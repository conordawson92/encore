import autoanimate from "@formkit/auto-animate";

const userDetails = `
<ul class="bg-white shadow-custom p-2 flex flex-col gap-2">
                    <h2 class="">User Details:</h2>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        ${userAuth.email}
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        ${userAuth.userLocation}
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        ${userAuth.userPhone}
                    </li>
                    <li>
                        Your favorite payment method:    
                        ${userAuth.paymentInfo}
                    </li>
                    <li>
                        
                    <a href="/user/edit" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
    <i class="fas fa-edit mr-2"></i> Edit my Information
</a>

                    </li>
                </ul>
                `;

const detailsContainer = document.querySelector('#details_container');

if (detailsContainer) {
    autoanimate(detailsContainer);
    let details = false;
        document.addEventListener("DOMContentLoaded", () => {
        const userDetailsButton = document.querySelector('#user_details_button');
        const userDetailsButtonIcon = document.querySelector('#user_details_button_icon');

        userDetailsButton.addEventListener("click", () => {
            if (!details) {
                detailsContainer.innerHTML = userDetails;
                userDetailsButtonIcon.classList.remove("fa-chevron-up");
                userDetailsButtonIcon.classList.add("fa-chevron-down");

            } else {
                detailsContainer.innerHTML = "";
                userDetailsButtonIcon.classList.remove("fa-chevron-down");
                userDetailsButtonIcon.classList.add("fa-chevron-up");
            }
            details = !details;
        });
    });
}

