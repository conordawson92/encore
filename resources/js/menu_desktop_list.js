import autoanimate from '@formkit/auto-animate';

const menuDesktopList = `<div class="overflow-auto flex-col columns-2 bg-beige_logo top-full left-0">
<ul class="flex flex-col gap-2 mb-5">
@foreach ($categories as $category)
<li class="flex justify-center items-center">
    <a class="w-10/12 border-solid border-brown_logo border-2 text-center font-bold py-3 hover:bg-beige_logo_hover" href="">{{ $category->name }}</a>
</li>
@endforeach
</ul>
</div>`;

const menuDesktopListContainers = document.querySelectorAll('.menu_desktop_list_container');
for (const menuDesktopListContainer of menuDesktopListContainers) {
    autoanimate(menuDesktopListContainer);
}

document.addEventListener('DOMContentLoaded', () => {
    const menuTrigger = document.querySelectorAll('.menu_drop');
    for (const trigger of menuTrigger) {
        trigger.addEventListener('mouseenter', () => {
            trigger.querySelector('.menu_desktop_list_container').innerHTML = menuDesktopList;
        });
        trigger.addEventListener('mouseleave', () => {
            trigger.querySelector('.menu_desktop_list_container').innerHTML = '';
        })
    }
    
})
