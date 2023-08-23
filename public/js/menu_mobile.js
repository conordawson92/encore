document.addEventListener('DOMContentLoaded', () => {
    const mobileMenu = document.querySelector('#menu_mobile');
    const mobileMenuButton = document.querySelector('#menu_mobile_button');
    const mobileMenuIcon = mobileMenuButton.querySelector('menu_mobile_icon');

    mobileMenuButton.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            mobileMenuIcon.classList.remove('fa-bars');
            mobileMenuIcon.classList.add('fa-times');
        } else {
            mobileMenu.classList.add('hidden');
            mobileMenuIcon.classList.remove('fa-times');
            mobileMenuIcon.classList.add('fa-bars');
        }
    });
});