<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        test: '#ff0000'
                        test2: '#00ff00'
                        test3: '#0000ff'
                    },
                },
            },
        };
    </script>
</head>
<body>
    <header class="flex justify-between gap-4 bg-green-300 p-2">
        <a href="/">
            <img class="w-18" src="{{ asset('images/logo_test.svg') }}" alt="" />
        </a>
        <form action="" class="hidden md:flex gap-4">
            <input class="border border-gray-400 rounded py-1 px-2 my-3" type="text" placeholder="Search..." />
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <div class="hidden md:flex gap-4 justify-center items-center">
            <a href="/login">
                Sign Up | Sign In
            </a>
            <a href="">
                <i class='fa-solid fa-circle-question '></i>
            </a>
        </div>
        <button class="flex md:hidden w-20 justify-center items-center">
            <i class="fa-solid fa-bars text-3xl"></i>
        </button>
    </header>
    <nav class="flex justify-between items-center bg-blue-300">
        <ul class="hidden md:flex space-x-6 text-lg m-auto p-2">
            <li>
                <a href="/men">Men</a>
            </li>
            <li>
                <a href="/women">Women</a>
            </li>
            <li>
                <a href="/kids">Kids</a>
            </li>
            <li>
                <a href="/about">Our Mission</a>
            </li>
            <li>
                <a href="/platform">Our Platform</a>
            </li>
        </ul>
    </nav>
    <main>
    </main>
    <footer class="fixed bottom-0 w-full bg-red-300 block p-2 md:flex">
        <div class="p-2 flex flex-col gap-3">
            <div class="flex flex-col gap-2">
                <h3 class="text-xl">
                    Encore
                </h3>
                <ul> 
                    <li>
                        <a href="/about">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="/jobs">
                            Jobs
                        </a>
                    </li>
                    <li>
                        <a href="/ecology">
                            Eco-friendly
                        </a>
                    </li>
                    <li>
                        <a href="/advertising">
                            Advertising
                        </a>
                    </li>
                    <li>
                        <a href="/contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl">
                    Help
                </h3>
                <ul>
                    <li>
                        <a href="/help_center">
                            Help Center
                        </a>    
                    </li>
                    <li>
                        <a href="/help_center#buying">
                            Buying Guide
                        </a>
                    </li>
                    <li>
                        <a href="/help_center#selling">
                            Selling Guide
                        </a>
                    </li>
                    <li>
                        <a href="/safety">
                            Safety
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl">
                    Community
                </h3>
                <ul>
                    <li>
                        <a href="/forum">
                            Forum
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="p-2 my-4">
            <ul class="flex justify-center gap-8">
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
        <hr>
        <div class="p-2">
            <ul class="flex justify-center gap-4">
                <li>
                    <a class="hover:underline" href="">Privacy Policy</a>
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