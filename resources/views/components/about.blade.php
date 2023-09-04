<head>
    <title>Encore | About Us</title>
</head>


<x-layout>

    <div class="overflow-hidden h-[400px] md:h-[400px]">
        <div class="bg-center bg-no-repeat bg-cover hover:scale-105 transition-transform duration-300 ease-in-out flex items-center justify-center"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/About_us/join.png'); height: 400px;">
            <div class="relative text-center md:space-y-12 space-y-4">
                <h1 class="text-8xl md:text-[60xl] font-oglnf text-white">About Us</h1>
            </div>
        </div>
    </div>


    <!-- End Cover Image Section -->


    <!-- Spacing -->
    <div class="my-12">
        <h1
            class="text-4xl text-center  text-orange-600 hover:text-green-600 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            Join The Team
        </h1>
    </div>
    <!-- Effect Image Hover -->
    <style>
        .img-hover-effect {
            transition: opacity 0.5s, transform 0.5s;
        }

        .img-hover-effect:hover {
            opacity: 0.7;
            transform: scale(1.1);
        }
    </style>

    <!-- Images left -->
    <div class="flex flex-col md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-left"
        style="max-width: 80%;">
        <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
            <img src="{{ asset('/storage/images/assets/About_us/conor (1).png') }}" alt="Description"
                class="img-hover-effect w-9/10 md:w-4/5">
        </div>
        <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
            <h2 class="text-8xl md:text-7xl font-oglnf text-green-700 md:text-left">CONOR</h2>
            <p class="text-lg md:text-base md:text-left">Git users live by the mantra: 'Commit early, commit often, and
                may the merge conflicts be ever in your favor!'</p>
        </div>
    </div>

    <!-- Images right -->
    <div class="flex flex-col-reverse md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-right"
        style="max-width: 80%;">
        <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
            <h2 class="text-8xl md:text-7xl font-oglnf text-orange_logo md:text-right">TELMA</h2>
            <p class="text-lg md:text-base">Back-end developers' idea of a three-course meal? An appetizer, a main, and
                a dessert... all served in different tables.</p>
        </div>
        <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
            <img src="{{ asset('/storage/images/assets/About_us/Telma cartoon.png') }}" alt="Description"
                class="img-hover-effect w-9/10 md:w-4/5">
        </div>
    </div>
    </div>

    <!-- Images left -->
    <div class="flex flex-col md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-left"
        style="max-width: 80%;">
        <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
            <img src="{{ asset('/storage/images/assets/About_us/louis.png') }}" alt="Description"
                class="img-hover-effect w-9/10 md:w-4/5">
        </div>
        <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
            <h2 class="text-8xl md:text-7xl font-oglnf text-green-700 md:text-left">ARTHUR</h2>
            <p class="text-lg md:text-base md:text-left">CSS developers always look good on the outside, even if they're
                a mess of !important rules on the inside.</p>
        </div>
    </div>

    <!-- Images right -->
    <div class="flex flex-col-reverse md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-right"
        style="max-width: 80%;">
        <div class="w-full md:w-1/2 ">
            <h2 class="text-8xl md:text-7xl font-oglnf text-orange_logo md:text-right">LUCAS</h2>
            <p class="text-lg md:text-base">Ask a back-end developer about relationships; they'll probably start with
                'one-to-one' and 'many-to-many'.</p>
        </div>
        <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
            <img src="{{ asset('/storage/images/assets/About_us/Lucas cartoon.png') }}" alt="Description"
                class="img-hover-effect w-9/10 md:w-4/5">
        </div>
    </div>
    </div>

    <!-- Images left -->
    <div class="flex flex-col md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-left"
        style="max-width: 80%;">
        <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
            <img src="{{ asset('/storage/images/assets/About_us/cristian cartoon.png') }}" alt="Description"
                class="img-hover-effect w-9/10 md:w-4/5">
        </div>
        <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
            <h2 class="text-7xl md:text-7xl font-oglnf text-green-700 md:text-left">CRISTIAN</h2>
            <p class="text-lg md:text-base md:text-left">"Our greatest glory is not in never falling, but in rising
                every time we run the server."</p>
        </div>
    </div>

    <!-- Contact Us -->
    <div class="bg-center bg-no-repeat bg-cover relative"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/About_us/aboutus.png'); height: 300px;">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
            <h1 class="text-6xl">Join in the team</h1>
            <a href="/platform" class="bg-orange-500 text-white py-2 px-5 text-lg mt-4 inline-block">Contact Us</a>
        </div>
    </div>

</x-layout>
