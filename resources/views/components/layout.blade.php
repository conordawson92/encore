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
    <script>
        var navMenu = @json($parentCategories);
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex flex-col min-h-screen font-abel text-lg bg-beige_logo">
    <div class="grow shrink basis-0">
        <header class="flex justify-between md:justify-evenly gap-4 bg-beige_logo p-2 border-bottom-solid border-bottom-2 border-gray-400 text-brown_logo">
            <a class="flex justify-center items-center" href="/">
                <img class="w-40" src="{{ asset('images/logo.svg') }}" alt="" />
            </a>

            @include('partials._search')

            <div class="hidden md:flex gap-4 justify-center items-center">
                <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo whitespace-nowrap" href="/register">
                    Sign Up
                </a>
                <a class="border border-brown_logo rounded px-2 py-1 text-brown_logo whitespace-nowrap" href="/login">
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

        @include('partials._nav')

        <main class="bg-white pt-4">
            {{$slot}}
        </main>
    </div>
    <footer class="mt-auto w-full bg-orange_logo_light block p-2 flex flex-col">
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
</body>

</html>