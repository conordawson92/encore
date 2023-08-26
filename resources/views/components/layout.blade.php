<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        var navMenu = @json($parentCategories);
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/css/svg.css'])
    <title>Encore</title>
</head>

<body class="flex flex-col min-h-screen font-abel text-lg bg-beige_logo">
    <div class="grow shrink basis-0">
        <header
            class="flex justify-between md:justify-evenly gap-4 bg-beige_logo p-2 border-bottom-solid border-bottom-2 border-gray-400 text-brown_logo">
            <a class="flex justify-center items-center" href="/">
                <img class="w-40" src="{{ asset('images/logo.svg') }}" alt="" />
            </a>

            @include('partials._search')

            @auth
                <ul class="flex gap-4 justify-center items-center hidden md:flex inline">
                    <li>
                        <h2 class="text-xl flex items-center whitespace-nowrap">
                            <i class="fa-solid fa-user mr-1"></i>
                            {{ auth()->user()->userName }}
                        </h2>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa-regular fa-bell"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            @else
                <div class="hidden md:flex gap-4 justify-center items-center">
                    <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo whitespace-nowrap"
                        href="/register">
                        Sign Up
                    </a>
                    <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo whitespace-nowrap" href="/login">
                        Sign In
                    </a>
                    <a href="">
                        <i class='fa-solid fa-circle-question text-2xl'></i>
                    </a>
                </div>
            @endauth
            <button id="menu_mobile_button" class="flex md:hidden w-20 justify-center items-center">
                <i id="menu_mobile_icon" class="fa-solid fa-bars text-3xl"></i>
            </button>

        </header>
        <hr class="border border-brown_logo_light w-11/12 mx-auto mb-4" />

        @include('partials._nav')

        <main class="bg-white">
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
        <hr class="my-4 border-solid border border-brown_logo_light">
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
        <hr class="my-4 border-solid border border-brown_logo_light">
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

        <body>

            <button id="backToTop" class="fixed bottom-0 right-0 transform translate-x-6">
                <svg width="120" height="100" viewBox="0 0 120 100" fill="none"
                    xmlns="http://www.w3.org/2000/svg" style="transform: rotate(-90deg);">>
                    <g id="triangles">
                        <g id="darkGroup">
                            <path id="dark2" opacity="0.7"
                                d="M51 46.268C52.3333 47.0378 52.3333 48.9623 51 49.7321L16.5 69.6506C15.1667 70.4204 13.5 69.4582 13.5 67.9186V28.0814C13.5 26.5418 15.1667 25.5796 16.5 26.3494L51 46.268Z" />
                            <path id="dark1" opacity="0.7"
                                d="M66 46.268C67.3333 47.0378 67.3333 48.9623 66 49.7321L31.5 69.6506C30.1667 70.4204 28.5 69.4582 28.5 67.9186V28.0814C28.5 26.5418 30.1667 25.5796 31.5 26.3494L66 46.268Z" />
                        </g>
                        <path id="light1" opacity="0.7"
                            d="M51 46.268C52.3333 47.0378 52.3333 48.9623 51 49.7321L16.5 69.6506C15.1667 70.4204 13.5 69.4582 13.5 67.9186V28.0814C13.5 26.5418 15.1667 25.5796 16.5 26.3494L51 46.268Z" />
                    </g>
                </svg>
            </button>
            
    </footer>
</body>

</html>
