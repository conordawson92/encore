import autoanimate from "@formkit/auto-animate";

const userDetails = `
<ul class="bg-white shadow-custom p-2 flex flex-col gap-2">
                    <h2 class="">User Details:</h2>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        ${ userAuth.email}
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        ${userAuth.userLocation}
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        ${ userAuth.userPhone}
                    </li>
                    <li>
                        Your favorite payment method:    
                        ${ userAuth.paymentInfo }
                    </li>
                </ul>
                `;

const detailsContainer = document.querySelector('#details_container');
autoanimate(detailsContainer);
let details = false;
document.addEventListener("DOMContentLoaded", () => {
    const userDetailsButton = document.querySelector('#user_details_button');
    const userDetailsButtonIcon = document.querySelector('#user_details_button_icon');
    const shadowProfile = document.querySelector('#profile');

    userDetailsButton.addEventListener("click", () => {
        if (!details) {
            detailsContainer.innerHTML = userDetails;
            userDetailsButtonIcon.classList.remove("fa-chevron-up");
            userDetailsButtonIcon.classList.add("fa-chevron-down");
            // shadowProfile.classList.remove("shadow-custom");

        } else {
            detailsContainer.innerHTML = "";
            userDetailsButtonIcon.classList.remove("fa-chevron-down");
            userDetailsButtonIcon.classList.add("fa-chevron-up");
            // shadowProfile.classList.add("shadow-custom");
        }
        details = !details;
    });
});
