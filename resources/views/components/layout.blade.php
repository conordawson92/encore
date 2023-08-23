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
            <button class="flex md:hidden w-20 justify-center items-center">
                <i class="fa-solid fa-bars text-3xl"></i>
            </button>
        </header>
        <hr class="border border-brown_logo_light w-11/12 mx-auto" />
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
        <nav class="flex flex-col md:hidden bg-beige_logo text-brown_logo">
            <ul>
                <li >
                    <a class="" href="">
                        Sell on Encore
                    </a>
                </li>
                <li>
                    <a href="">
                        Sign In
                    </a>
                </li>
            </ul>
            <hr>
            <ul>
                <h3>
                    Categories
                </h3>
                <li>
                    <a href="">
                        Men
                    </a>
                </li>
                <li>
                    <a href="">
                        Women
                    </a>
                </li>
                <li>
                    <a href="">
                        Kids
                    </a>
                </li>
            </ul>
            <hr>
            <ul>
                <h3>
                    Discover Encore
                </h3>
                <li>
                    <a href="">
                        Our Mission
                    </a>
                </li>
                <li>
                    <a href="">
                        Our Platform
                    </a>
                </li>
                <li>
                    <a href="">
                        Jobs
                    </a>
                </li>
                <li>
                    <a href="">
                        Eco-Friendly
                    </a>
                </li>
                <li>
                    <a href="">
                        Advertising
                    </a>
                </li>
                <li>
                    <a href="">
                        Contact
                    </a>
                </li>
            </ul>
            <hr>
            <ul>
                <h3>
                    Help
                </h3>
                <li>
                    <a href="">
                        Help Center
                    </a>
                </li>
                <li>
                    <a href="">
                        Buying Guide
                    </a>
                </li>
                <li>
                    <a href="">
                        Selling Guide
                    </a>
                </li>
                <li>
                    <a href="">
                        Safety
                    </a>
                </li>
            </ul>
            <hr>
            <ul>
                <h3>
                    Community
                </h3>
                <li>
                    <a href="">
                        Forum
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End of Mobile Navigation -->
        <main class="bg-white pt-4">
              {{$slot}}
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
</body>
</html>