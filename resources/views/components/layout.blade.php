<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
        />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        var navMenu = @json($parentCategories);
        var userAuth = @json($userAuth);
        var csrfToken = @json(csrf_token());
    </script>
    @vite(['resources/css/app.css', 'resources/css/svg.css'])
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <title>Encore | Home Page</title>


    <style>
        @media (min-width: 768px) {
            body::-webkit-scrollbar {
                width: 0;
                /* Remove scrollbar space */
                background: transparent;
                /* Make scrollbar invisible */
            }

            html {
                scrollbar-width: none;
                /* Firefox 64+ */
            }
        }
        @font-face {
            font-family: 'Oglnf';
            src: url('{{ asset('fonts/oldgatelaneoutline.regular.otf') }}') format('truetype');
        }
        @font-face {
            font-family: 'abel';
            src: url('{{ asset('fonts/Abel-Regular.ttf') }}') format('truetype');
        }
    </style>
</head>

<body class="flex flex-col min-h-screen font-abel text-lg">
    <x-flash-message />
    <div class="grow shrink basis-0">
        <div class="bg-beige_logo">
            <header class="flex justify-between md:justify-evenly gap-4 bg-beige_logo p-2 border-bottom-solid border-bottom-2 border-gray-400 text-brown_logo">
                <a class="flex justify-center items-center" href="/">
                    <img class="w-40" src="{{ asset('images/logo.svg') }}" alt="" />
                </a>

                @include('partials._search_desktop')

                @auth
                <ul class="flex gap-4 justify-center items-center hidden md:flex inline">
                    <li>
                        <h2 class="text-xl flex items-center whitespace-nowrap">
                            <i class="fa-solid fa-user mr-1 text-2xl"></i>
                            {{ auth()->user()->userName }}
                        </h2>
                    </li>
                    <li>
                        <a href="{{ route('cart.cart') }}" alt="My cart">
                            <span class="relative inline-block">
                                <i class="fa-solid fa-cart-shopping text-2xl"></i>

                                @if(auth()->user() && auth()->user()->cartCount() > 0)
                                <span class="absolute top-[-5px] right-[-5px] px-1.5 py-0.5 bg-red-500 text-white rounded-full text-xs">
                                    {{ auth()->user()->cartCount() }}
                                </span>
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}#wishlist" alt="My wishlist">
                            <span class="relative inline-block">
                                <i class="fa-regular fa-heart text-2xl"></i>
                                @if(auth()->user() && auth()->user()->wishlistCount() > 0)
                                <span class="absolute top-[-5px] right-[-5px] px-1.5 py-0.5 bg-red-500 text-white rounded-full text-xs">
                                    {{ auth()->user()->wishlistCount() }}
                                </span>
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}#your-notifications" alt="My notifications">
                            <i class="fa-regular fa-bell text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" alt="My dashboard">
                            <i class="fa-solid fa-gear text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="/logout" class="m-0">
                            @csrf
                            <button type="submit" name="logout" title="Logout" class="" alt="Logout">
                                <i class="fa-solid fa-right-from-bracket text-2xl"></i>
                            </button>
                        </form>
                    </li>
                </ul>

                @else
                <div class="hidden md:flex gap-4 justify-center items-center">
                    <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo whitespace-nowrap" href="/register" alt="Sign Up">
                        Sign Up
                    </a>
                    <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo whitespace-nowrap" href="/login" alt="Sign In">
                        Sign In
                    </a>
                    <a href="/faq">
                        <i class='fa-solid fa-circle-question text-2xl' alt="Faq"></i>
                    </a>
                </div>
                @endauth
                @auth
                @csrf
                <ul class="flex gap-6 justify-right items-center md:hidden">
                    <li>
                        <a href="{{ route('cart.cart') }}" alt="My cart">
                            <span class="relative inline-block">
                                <i class="fa-solid fa-cart-shopping text-2xl"></i>

                                @if(auth()->user() && auth()->user()->cartCount() > 0)
                                <span class="absolute top-[-5px] right-[-5px] px-1.5 py-0.5 bg-red-500 text-white rounded-full text-xs">
                                    {{ auth()->user()->cartCount() }}
                                </span>
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}#wishlist" alt="My wishlist">
                            <span class="relative inline-block">
                                <i class="fa-regular fa-heart text-2xl"></i>
                                @if(auth()->user() && auth()->user()->wishlistCount() > 0)
                                <span class="absolute top-[-5px] right-[-5px] px-1.5 py-0.5 bg-red-500 text-white rounded-full text-xs">
                                    {{ auth()->user()->wishlistCount() }}
                                </span>
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}#your-notifications" alt="My notifications">
                            <i class="fa-regular fa-bell text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" alt="My dashboard">
                            <i class="fa-solid fa-gear text-2xl"></i>
                        </a>
                    </li>
                </ul>
                @endauth
                @include('partials._search_mobile')
                <div class="flex md:hidden gap-6 m-2">
                    <button id="show-search" class="" alt="Search">
                        <i class="fa-solid fa-magnifying-glass text-3xl"></i>
                    </button>
                    <button id="menu_mobile_button" class="" alt="Menu">
                        <i id="menu_mobile_icon" class="fa-solid fa-bars text-3xl"></i>
                    </button>
                </div>
            </header>
            <hr class="border border-brown_logo_light w-11/12 mx-auto my-2" />

            @include('partials._nav')
        </div>
        <main class="">
            {{ $slot }}
        </main>
    </div>
    <footer class="mt-auto w-full bg-orange_logo_light block p-2 flex flex-col border-brown_logo_light border-t-2">
        <div class="p-2 flex flex-col gap-3 md:flex-row md:justify-between md:justify-evenly text-center md:text-left">
            <div class="flex flex-col gap-3">
                <h3 class="text-xl font-semibold">
                    Encore
                </h3>
                <ul class="flex flex-col gap-2">
                    <li>
                        <a class="hover:underline" href="/platform">
                            Our Platform
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/platform#eco-friendly">
                            Eco-friendly
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/platform#circular-economy">
                            Circular Economy
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/platform#express-yourself">
                            Express Yourself
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/platform#contact-us">
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
                        <a class="hover:underline" href="/faq#general">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/faq#buyer">
                            Buyer
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/faq#seller">
                            Seller
                        </a>
                    </li>
                    <li>
                        <a class="hover:underline" href="/faq#safety">
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
                        <a class="hover:underline" href="/future">
                            Forum
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-4 border-solid border border-brown_logo_light">
        <div class="p-2">
            <ul class="flex justify-center gap-8 flex-wrap">
                <li>
                    <a href="/future">
                        <i class="fa-brands fa-square-facebook text-3xl"></i>
                    </a>
                </li>
                <li>
                    <a href="/future">
                        <i class="fa-brands fa-x-twitter text-3xl"></i>
                    </a>
                </li>
                <li>
                    <a href="/future">
                        <i class="fa-brands fa-linkedin text-3xl"></i>
                    </a>
                </li>
                <li>
                    <a href="/future">
                        <i class="fa-brands fa-instagram text-3xl"></i>
                    </a>
                </li>
            </ul>
        </div>
        <hr class="my-4 border-solid border border-brown_logo_light">
        <div class="p-2">
            <ul class="flex justify-center gap-4 flex-wrap">
                <li>
                    <a class="hover:underline" href="/future">
                        Privacy Policy
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="/future">
                        Cookie Policy
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="/future">
                        Cookie Settings
                    </a>
                </li>
                <li>
                    <a class="hover:underline" href="/future">
                        Terms & Conditions
                    </a>
                </li>
            </ul>
        </div>

        <body>

            <button id="backToTop" class="fixed bottom-0 right-0 transform translate-x-6">
                <svg width="120" height="100" viewBox="0 0 120 100" fill="none" xmlns="https://www.w3.org/2000/svg" style="transform: rotate(-90deg);">>
                    <g id="triangles">
                        <g id="darkGroup">
                            <path id="dark2" opacity="0.7" d="M51 46.268C52.3333 47.0378 52.3333 48.9623 51 49.7321L16.5 69.6506C15.1667 70.4204 13.5 69.4582 13.5 67.9186V28.0814C13.5 26.5418 15.1667 25.5796 16.5 26.3494L51 46.268Z" />
                            <path id="dark1" opacity="0.7" d="M66 46.268C67.3333 47.0378 67.3333 48.9623 66 49.7321L31.5 69.6506C30.1667 70.4204 28.5 69.4582 28.5 67.9186V28.0814C28.5 26.5418 30.1667 25.5796 31.5 26.3494L66 46.268Z" />
                        </g>
                        <path id="light1" opacity="0.7" d="M51 46.268C52.3333 47.0378 52.3333 48.9623 51 49.7321L16.5 69.6506C15.1667 70.4204 13.5 69.4582 13.5 67.9186V28.0814C13.5 26.5418 15.1667 25.5796 16.5 26.3494L51 46.268Z" />
                    </g>
                </svg>
            </button>

    </footer>

    <div id="loadingSpinner" class="fixed top-0 left-0 w-screen h-screen flex justify-center items-center bg-black bg-opacity-50 z-50 hidden">
        <div class="border-t-4 border-transparent rounded-full w-16 h-16 border-brown_logo animate-spin"></div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>