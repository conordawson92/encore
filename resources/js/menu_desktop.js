import autoanimate from '@formkit/auto-animate';

function getHTMTCategories({categories}) {
    return `
    <ul class="hover-scroll-prevent grid grid-cols-2 min-w-[227px] min-h-[132px] fixed z-[9999] bg-beige_logo">
        ${categories.map(category => {
            return `
                <li class="flex items-center justify-center hover:bg-beige_logo_hover w-full p-2">
                    <a href="/category/${category.id}">
                        ${category.category_name}
                    </a>
                </li>
            `;
        }).join('')}
    </ul>
    `;
}

const subMenus = document.querySelectorAll('.sub_menu');
for (const subMenu of subMenus) {
    autoanimate(subMenu);
}


const menuDrops = document.querySelectorAll('.menu_drop');
for (let i = 0; i < menuDrops.length; i++) {
    const menuDrop = menuDrops[i];
    const subMenu = navMenu[i];

    menuDrop.addEventListener('mouseenter', () => {
        const subMenuHTML = getHTMTCategories(subMenu);
        subMenus[i].innerHTML = subMenuHTML;
        document.body.classList.add('overflow-hidden');

        // Attach event listeners to the newly created <ul>
        const hoverScrollPreventUL = subMenus[i].querySelector('.hover-scroll-prevent');
        if (hoverScrollPreventUL) {
            hoverScrollPreventUL.addEventListener('mouseenter', function() {
                document.body.classList.add('overflow-hidden');
            });

            hoverScrollPreventUL.addEventListener('mouseleave', function() {
                document.body.classList.remove('overflow-hidden');
            });
        }
    });

    menuDrop.addEventListener('mouseleave', () => {
        subMenus[i].innerHTML = '';
        document.body.classList.remove('overflow-hidden');
    });
}