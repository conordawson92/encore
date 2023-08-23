<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encore | Vintage Store</title>
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    abel: ['Abel', 'sans-serif'],
                },
                extend: {
                    colors: {
                        // colorName: 'colorValue',
                        orange_logo: '#f5804d',
                        beige_logo: '#fff4e0',
                        beige_logo_hover: '#e6d2b1',
                        brown_logo: '#6d3114',
                        brown_logo_light: '#a04a20'
                    },
                    keyframes: {
                        dropMenu : {
                            '0%': {
                                top: '-100%'
                            },
                            '100%': {
                                top: '0'
                            }

                        }
                    }
                },
            },
        };
    </script>
</head>
<body class="flex flex-col min-h-screen font-abel text-lg bg-beige_logo">
    <div class="grow shrink basis-0">
        <header class="flex justify-between md:justify-evenly gap-4 bg-beige_logo p-2 border-bottom-solid border-bottom-2 border-gray-400 text-brown_logo">
            <a href="/">
                <img class="w-20" src="{{ asset('images/logo_old.svg') }}" alt="" />
            </a>
            <form action="" class="hidden md:flex gap-4 border border-gray-400 rounded w-200 px-4 bg-white h-11 w-1/2 justify-between mt-4">
                <input class="focus:outline-none w-full" type="text" placeholder="Search..." />
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div class="hidden md:flex gap-4 justify-center items-center">
                <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo" href="/register">
                    Sign Up
                </a>
                <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo" href="/login">
                    Sign In
                </a>
                <a href="">
                    <i class='fa-solid fa-circle-question text-2xl'></i>
                </a>
            </div>
            <button id="menu_mobile_button" class="flex md:hidden w-20 justify-center items-center">
                <i id="menu_mobile_icon" class="fa-solid fa-bars text-3xl"></i>
            </button>
        </header>
        <hr class="border border-brown_logo_light w-11/12 mx-auto mb-4" />
        <!-- Start of Desktop Navigation -->
        <nav class="flex justify-between items-center bg-beige_logo text-brown_logo">
            <ul class="hidden md:flex space-x-6 text-lg m-auto">
                <li class="hover:bg-beige_logo_hover p-2">
                    <a class="text-2xl" href="/men">
                        Men
                    </a>
                </li>
                <li class="hover:bg-beige_logo_hover p-2">
                    <a class="text-2xl" href="/women">
                        Women
                    </a>
                </li>
                <li class="hover:bg-beige_logo_hover p-2">
                    <a class="text-2xl" href="/kids">
                        Kids
                    </a>
                </li>
                <li class="hover:bg-beige_logo_hover p-2">
                    <a class="text-2xl" href="/about">
                        Our Mission
                    </a>
                </li>
                <li class="hover:bg-beige_logo_hover p-2">
                    <a class="text-2xl" href="/platform">
                        Our Platform
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End of Desktop Navigation -->
        <!-- Start of Mobile Navigation -->
        <nav id="menu_mobile" class="w-full shadow-md animate-dropMenu flex flex-col hidden md:hidden bg-beige_logo text-brown_logo pb-4 pt-2">
            <ul class="flex flex-col gap-2 mb-5">
                <li class="flex justify-center items-center">
                    <a class="w-10/12 border-solid border-brown_logo border-2 text-center font-bold py-3 hover:bg-beige_logo_hover" href="">
                        Sell on Encore
                    </a>
                </li>
                <li class="flex justify-center items-center">
                    <a class="w-10/12 border-solid border-brown_logo border-2 text-center font-bold py-3 hover:bg-beige_logo_hover" href="">
                        Sign In
                    </a>
                </li>
            </ul>
            <ul class="flex flex-col mt-8">
                <h3 class="ml-8 underline">
                    Categories
                </h3>
                <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                    <a class="text-2xl font-medium w-full" href="">
                        <i class="fa-solid fa-person mr-2"></i>
                        Men
                    </a>
                </li>
                <li class="hover:bg-beige_logo_hover flex p-4 border-solid border-gray-400 border-b">
                    <a class="text-2xl font-medium w-full" href="">
                        <i class="fa-solid fa-person-dress mr-2"></i>
                        Women
                    </a>
                </li>
                <li class="hover:bg-beige_logo_hover flex p-4">
                    <a class="text-2xl font-medium w-full" href="">
                        <i class="fa-solid fa-children mr-2"></i>
                        Kids
                    </a>
                </li>
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
        <!-- End of Mobile Navigation -->
        <main class="bg-white pt-4">
            <div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo laboriosam quas optio voluptatibus repudiandae sunt exercitationem, nesciunt, consequatur autem, ipsa quis facilis culpa. Perspiciatis modi ipsam a doloremque eligendi voluptate quia minima ut aliquam, aut consequatur molestiae mollitia eaque earum officia atque eos beatae ex pariatur. At ducimus odio repellat! Dolores quia accusantium quis voluptas porro laboriosam debitis enim nesciunt iure, amet pariatur illo animi odit, autem omnis, sed culpa at recusandae atque! Repudiandae tenetur officia culpa similique? Ab, deserunt totam iure obcaecati nobis eaque nihil a? Ex, optio nam! Asperiores, odio suscipit. Alias obcaecati amet fugiat provident accusantium molestias explicabo inventore quisquam, quasi quis, quae possimus ipsa repellendus aspernatur, delectus exercitationem laudantium modi? Distinctio quod dolore odio blanditiis autem quidem atque accusantium molestiae molestias, ut illum commodi! Aliquam quas odio at autem, numquam pariatur porro eaque, vitae doloribus quae esse quam deserunt molestiae amet sunt? Similique excepturi perferendis corrupti eius nisi vero, delectus aspernatur totam. Reiciendis laudantium facere recusandae quasi enim ullam a quis sunt aspernatur qui! Distinctio, corrupti molestias impedit obcaecati debitis, asperiores nemo neque soluta quos ad recusandae tenetur tempora quod odio quibusdam labore sequi explicabo laudantium ab nobis! Omnis, voluptate est? Quam quod nobis sed quae hic, et deleniti aut alias necessitatibus dolores, labore enim doloremque suscipit quia corrupti impedit magni ratione praesentium vel dicta a iure nostrum possimus unde. Odit provident libero necessitatibus, minus, culpa explicabo non amet praesentium tempora quas enim laboriosam molestiae placeat repellendus perferendis cupiditate voluptatum veritatis quidem quis quisquam magnam hic. Fuga harum ad quidem labore alias corporis, voluptatibus eos soluta quia excepturi doloribus quas repellendus nesciunt atque rerum numquam consequuntur sequi voluptate est veritatis nostrum obcaecati. Sapiente animi tempora laudantium maiores dolorum? A odit minus quo, inventore, suscipit illo, delectus vitae quam temporibus ducimus nisi placeat? Atque in mollitia hic quidem dolor ex quas, rerum dicta modi ducimus ipsa vitae beatae quo autem explicabo facere consectetur fuga aspernatur numquam deleniti blanditiis? Quam fuga consequatur accusamus nam optio, iste itaque libero ea est provident ipsam deleniti incidunt rerum atque odio minima fugiat ad voluptatum? Enim praesentium eveniet doloremque, repellat obcaecati culpa nesciunt libero quisquam iure, dolor aperiam, alias laboriosam? Tempora repellendus fugit quis laborum, eligendi praesentium commodi obcaecati optio itaque blanditiis eius laboriosam tempore voluptatem sequi dolores vero facere cupiditate! Officiis iure, sapiente minus nemo repellendus natus doloremque modi expedita dolor tempore temporibus nam id libero, nulla fuga voluptas facere voluptatibus obcaecati autem officia unde doloribus! Eum quaerat voluptates laudantium. Neque possimus fuga voluptatum atque dolor. In hic odio temporibus mollitia voluptates asperiores fugit laborum delectus, repellendus alias recusandae commodi non. Deleniti veniam incidunt consequuntur dolore exercitationem quo ad fugit? Id ipsum quae, ipsa, officiis, dolore ea amet a fugit cum rem officia distinctio animi nesciunt atque praesentium itaque blanditiis rerum. Tempora sed alias, minima ducimus quos quam magni asperiores nihil facere, nostrum sint ut provident. Inventore enim laboriosam nesciunt quo sequi voluptatum facere excepturi eos esse voluptas porro voluptates nostrum tempora nemo delectus rerum, eveniet debitis perspiciatis aliquid accusamus officiis illum aspernatur ipsa! Ipsam cumque, illo fuga architecto ex praesentium ullam repellendus necessitatibus, molestias quae consequuntur, expedita eius harum incidunt ratione! Veniam, est et? Doloribus pariatur, voluptates praesentium rerum sunt omnis beatae qui nobis sapiente provident deleniti molestiae nemo inventore? Possimus, tenetur illo unde nobis nam explicabo, dignissimos pariatur doloribus consequuntur, provident molestiae maxime iste quos dolorem? Non recusandae sint, adipisci fugit dolorem ab ea delectus neque optio repellat saepe deleniti libero! Ullam ipsum earum explicabo ut aliquam, adipisci numquam nisi, dolores facilis eum magnam natus? Provident, maxime accusantium. Inventore a molestias enim, cumque quasi quisquam praesentium magnam officiis maxime modi ea sint ipsa doloremque! Expedita animi mollitia doloremque! Reprehenderit excepturi tenetur quo nihil quod repellat rerum tempore esse, accusantium velit culpa facilis molestias, eos facere hic, cupiditate similique eligendi! Quo nulla dolorum, deleniti architecto, laudantium iure laborum quae libero officia mollitia porro molestias non, esse numquam quis debitis quam magnam quod magni explicabo quia tempore voluptate assumenda repudiandae? Expedita perspiciatis porro, molestias, totam sed nihil repellendus ullam sit a possimus error voluptatibus nesciunt doloremque enim veritatis nostrum. Voluptatem expedita, rerum blanditiis aliquid quidem ipsum quisquam veniam aspernatur velit iusto excepturi recusandae quae repellat. Delectus, in? Provident, praesentium nemo. Recusandae nostrum placeat aut facere incidunt corporis, natus minima et. Officia, explicabo? Officiis atque maiores beatae deleniti repudiandae quaerat nisi repellat vitae! Excepturi molestias harum dolores magnam adipisci assumenda nemo est exercitationem quae voluptatum. Porro voluptatibus veniam obcaecati facere nesciunt, asperiores tempora architecto? Perferendis ex iste ea incidunt nihil, iusto corrupti excepturi adipisci labore quas. Quae similique ducimus nulla cum minima at adipisci assumenda recusandae iure voluptatibus expedita nobis sequi obcaecati eveniet, sapiente esse placeat reprehenderit ab, molestias saepe corrupti maxime. Laborum soluta quam neque accusamus veniam ab fugit distinctio harum voluptate! Dolorum, officia possimus? Impedit aliquam assumenda modi exercitationem voluptates veniam nisi fugit quod sequi! Sit voluptas in accusamus excepturi non error illum aliquid pariatur earum! Atque iste dolorem nisi aspernatur neque, suscipit voluptatum cupiditate magnam accusantium tempora adipisci vel molestiae. Ut suscipit debitis molestiae, molestias, soluta possimus quasi, itaque nulla consequuntur quae asperiores nemo harum cumque ipsa. Cum, assumenda quasi in possimus dolorem dolores unde voluptatem voluptates vel nisi, sequi similique? Eligendi magni aliquam dolore ut laudantium illum ipsum obcaecati saepe dolor corporis, amet tempora non veritatis quam, optio modi enim perspiciatis repudiandae suscipit quis iste autem praesentium facilis. Laudantium pariatur voluptatem deleniti nihil necessitatibus aperiam adipisci, omnis nemo sequi vel! Quam officiis totam eaque laborum possimus optio excepturi rem dolorum fuga explicabo maiores minima, atque facilis aliquid culpa aperiam? Pariatur sint veritatis minus id voluptatem amet, debitis fugit eligendi molestias, neque repellendus perspiciatis saepe ipsum nostrum velit sunt, consectetur incidunt earum? Deserunt debitis consequatur, quidem optio error tenetur recusandae sint officia delectus labore repudiandae quo nobis alias vel in similique itaque aspernatur ducimus explicabo quos odio. Aspernatur reprehenderit debitis excepturi libero repudiandae nobis sapiente, in autem voluptatem accusamus qui laborum vel mollitia exercitationem beatae consectetur quaerat dignissimos maxime tempora hic, asperiores totam alias? Ratione minus nobis provident atque!
                </p>
            </div>
        </main>
    </div>
    <footer class="mt-auto w-full bg-orange_logo block p-2">
        <div class="p-2 flex flex-col gap-3 md:flex-row md:justify-between md:justify-evenly">
            <div class="flex flex-col gap-3">
                <h3 class="text-xl font-semibold">
                    Encore
                </h3>
                <ul class="flex flex-col gap-2"> 
                    <li>
                        <a class="hover:underline" href="/about">
                            About
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/jobs">
                            Jobs
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/ecology">
                            Eco-friendly
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/advertising">
                            Advertising
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-3">
                <h3 class="text-xl font-semibold">
                    Help
                </h3>
                <ul class="flex flex-col gap-2">
                    <li>
                        <a class="hover:underline" href="/help_center">
                            Help Center
                        </a>    
                    </li>
                    <li>
                        <a class="hover:underline" href="/help_center#buying">
                            Buying Guide
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/help_center#selling">
                            Selling Guide
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/safety">
                            Safety
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-3">
                <h3 class="text-xl font-semibold">
                    Community
                </h3>
                <ul class="flex flex-col gap-2">
                    <li>
                        <a class="hover:underline" href="/forum">
                            Forum
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-4 border-gray-800">
        <div class="p-2">
            <ul class="flex justify-center gap-8 flex-wrap">
                <li>
                    <a href="">
                        <i class="fa-brands fa-square-facebook text-3xl"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-brands fa-x-twitter text-3xl"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-brands fa-linkedin text-3xl"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-brands fa-instagram text-3xl"></i>
                    </a>
                </li>
            </ul>
        </div>
        <hr class="my-4 border-gray-800">
        <div class="p-2">
            <ul class="flex justify-center gap-4 flex-wrap">
                <li>
                    <a class="hover:underline" href="">
                        Privacy Policy
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="">
                        Cookie Policy
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="">
                        Cookie Settings
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="">
                        Terms & Conditions
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="">
                        Our Platform
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="{{ asset('js/menu_mobile.js') }}"></script>
</body>
</html>