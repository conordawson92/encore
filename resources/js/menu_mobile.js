import autoanimate from '@formkit/auto-animate';


const icons = [
    'person-solid', 
    'person-dress-solid', 
    'child-solid', 
    'child-dress-solid'
]

const menuMobile = `
            <nav id="menu_mobile" class="w-full shadow-md animate-dropMenu flex flex-col md:hidden bg-beige_logo text-brown_logo pb-4 pt-2">
                <ul class="flex flex-col gap-2 mb-5">
                    ${userAuth ? `
                    <li class="flex justify-center items-center">
                        <a class="w-10/12 border-solid border-brown_logo border-2 text-center font-bold py-3 hover:bg-beige_logo_hover" href="">
                            <img class="w-8 h-8 mr-2" src="/storage/${userAuth.userImage}" alt="">
                            ${userAuth.userName}                       
                        </a>
                    </li>
                    <li class="flex justify-center items-center">
                    <form method="POST" action="/logout">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <button class="">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                    </li>

                    
                    
                    `: `<li class="flex justify-center items-center">
                    <a class="w-10/12 border-solid border-brown_logo border-2 text-center font-bold py-3 hover:bg-beige_logo_hover" href="">
                        Sell on Encore
                    </a>
                </li>
                <li class="flex justify-center items-center">
                    <a class="w-10/12 border-solid border-brown_logo border-2 text-center font-bold py-3 hover:bg-beige_logo_hover" href="">
                        Sign In
                    </a>
                </li>`}
                    
                </ul>
                <ul class="flex flex-col mt-8">
                    <h3 class="ml-8 underline">
                        Categories
                    </h3>
                    ${navMenu.map((parentCategory, index)  => {
                        return `
                        <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                            <a class="text-2xl font-medium w-full flex justify-left items-center" href="">
                                <img class="w-7 h-7 mr-2" src="/images/${icons[index]}.svg" alt="">
                                ${parentCategory.parentcategoryName}
                            </a>
                        </li>
                        `
                    }).join('')}
                    
                </ul>
                <ul class="flex flex-col mt-8">
                    <h3 class="ml-8 underline">
                        Discover Encore
                    </h3>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Our Mission
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Our Platform
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Jobs
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Eco-Friendly
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Advertising
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4">
                        <a class="text-2xl font-medium w-full" href="">
                            Contact
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col mt-8">
                    <h3 class="ml-8 underline">
                        Help
                    </h3>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Help Center
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Buying Guide
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                        <a class="text-2xl font-medium w-full" href="">
                            Selling Guide
                        </a>
                    </li>
                    <li class="hover:bg-beige_logo_hover flex p-4">
                        <a class="text-2xl font-medium w-full" href="">
                            Safety
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col mt-8">
                    <h3 class="ml-8 underline">
                        Community
                    </h3>
                    <li class="hover:bg-beige_logo_hover flex p-4">
                        <a class="text-2xl font-medium w-full" href="">
                            Forum
                        </a>
                    </li>
                </ul>
            </nav>
            `;
const menuMobileContainer = document.querySelector('#menu_mobile_container');
autoanimate(menuMobileContainer);
let menu = false;
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuButton = document.querySelector('#menu_mobile_button');
    const mobileMenuIcon = document.querySelector('#menu_mobile_icon');

    mobileMenuButton.addEventListener('click', () => {
        if (!menu) {
            menuMobileContainer.innerHTML = menuMobile;
            mobileMenuIcon.classList.remove('fa-bars');
            mobileMenuIcon.classList.add('fa-times');
        } else {
            menuMobileContainer.innerHTML = '';
            mobileMenuIcon.classList.remove('fa-times');
            mobileMenuIcon.classList.add('fa-bars');
        }
        menu = !menu;
    })
});