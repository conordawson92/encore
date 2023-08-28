
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
      <h2 class="text-3xl">TELMA</h2>
      <p>Descrizione 1</p>
    </div>
  </div>

  <!-- Images right -->
  <div class="flex flex-col-reverse lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 text-center lg:text-right flex-none w-2/5">
      <h2 class="text-3xl">CONOR</h2>
      <p>Descrizione 2</p>
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
      <h2 class="text-3xl">LOUIS-ARTHUR</h2>
      <p>Descrizione 3</p>
    </div>
  </div>

  <!-- Images right -->
  <div class="flex flex-col-reverse lg:flex-row items-center justify-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 text-center lg:text-right flex-none w-2/5">
      <h2 class="text-3xl">LUCAS</h2>
      <p>Descrizione 4</p>
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
      <h2 class="text-3xl">CRISTIAN</h2>
      <p>Descrizione 5</p>
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

