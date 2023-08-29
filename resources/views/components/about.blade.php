
<x-layout>

  <div class="overflow-hidden h-[600px] md:h-[600px]">
    <div class="bg-center bg-no-repeat bg-cover hover:scale-105 transition-transform duration-300 ease-in-out flex items-center justify-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/About_us/join.png'); height: 600px;">
      <div class="relative text-center md:space-y-12 space-y-4">
        <h1 class="text-4xl md:text-[182px] font-bold text-white md:mb-42 mb-8">About Us</h1>
      </div>
    </div>
  </div>
  
  <!-- End Cover Image Section -->
  

  <!-- Spacing -->
  <div class="my-12">
    <h1 class="text-4xl text-center">Join The Team</h1>
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
  <div class="flex flex-col lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex justify-center flex-none w-2/5">
      <img src="./images/About_us/Conor.png" alt="Immagine 1" class="img-hover-effect w-4/5" />
    </div>
    <div class="mx-2 lg:mx-5 text-center lg:text-left flex-none w-2/5">
      <h2 class="text-7xl font-oglnf text-green-700">TELMA</h2>
      <p>Back-end developers' idea of a three-course meal? An appetizer, a main, and a dessert... all served in different tables.</p>
    </div>
  </div>

  <!-- Images right -->
  <div class="flex flex-col-reverse lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 text-center lg:text-right flex-none w-2/5">
      <h2 class="text-7xl font-oglnf text-orange_logo">CONOR</h2>
      <p>Git users live by the mantra: 'Commit early, commit often, and may the merge conflicts be ever in your favor!'</p>
    </div>
    <div class="mx-2 lg:mx-5 flex justify-center flex-none w-2/5">
      <img src="./images/About_us/Conor.png" alt="Immagine 2" class="img-hover-effect w-4/5" />
    </div>
  </div>

  <!-- Images left -->
  <div class="flex flex-col lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex justify-center flex-none w-2/5">
      <img src="./images/About_us/Conor.png" alt="Immagine 3" class="img-hover-effect w-4/5" />
    </div>
    <div class="mx-2 lg:mx-5 text-center lg:text-left flex-none w-2/5">
      <h2 class="text-7xl font-oglnf text-green-700">ARTHUR</h2>
      <p>CSS developers always look good on the outside, even if they're a mess of !important rules on the inside.</p>
    </div>
  </div>

  <!-- Images right -->
  <div class="flex flex-col-reverse lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 text-center lg:text-right flex-none w-2/5">
      <h2 class="text-7xl font-oglnf text-orange_logo">LUCAS</h2>
      <p>Ask a back-end developer about relationships; they'll probably start with 'one-to-one' and 'many-to-many'.</p>
    </div>
    <div class="mx-2 lg:mx-5 flex justify-center flex-none w-2/5">
      <img src="./images/About_us/Conor.png" alt="Immagine 4" class="img-hover-effect w-4/5" />
    </div>
  </div>

  <!-- Images left -->
  <div class="flex flex-col lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex justify-center flex-none w-2/5">
      <img src="./images/About_us/Conor.png" alt="Immagine 5" class="img-hover-effect w-4/5" />
    </div>
    <div class="mx-2 lg:mx-5 text-center lg:text-left flex-none w-2/5">
      <h2 class="text-7xl font-oglnf text-green-700">CRISTIAN</h2>
      <p>"Our greatest glory is not in never falling, but in rising every time we run the server." - Confucio</p>
    </div>
  </div>

  <!-- Contact Us -->
  <div class="bg-center bg-no-repeat bg-cover relative" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/About_us/aboutus.png'); height: 300px;">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
      <h1 class="text-4xl">Join in the team</h1>
      <a href="/platform" class="bg-orange-500 text-white py-2 px-5 text-lg mt-4 inline-block">Contact Us</a>
    </div>
  </div>

</x-layout>

