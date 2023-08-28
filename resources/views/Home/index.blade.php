
<x-layout>

 <!-- Main Content -->
 <div class="overflow-hidden h-[600px]">
  <div class="bg-center bg-no-repeat bg-cover hover:scale-105 transition-transform duration-300 ease-in-out flex items-center justify-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/Homepage/pexels-rachel-claire-4992652.jpg'); height: 600px;">
    <div class="relative text-center space-y-12">
      <h1 class="text-[112px] font-bold text-white mb-28">Encore</h1>
      <a href="/listings" class="bg-orange-500 text-white py-5 px-10 text-lg">Shop Now</a>
    </div>
  </div>
</div>

  <!-- End Cover Image Section -->
  
  <!-- Our Concept Section -->
  <div class="container mx-auto my-5">
    <!-- Title -->
    <h2 class="text-center text-[50px] text-green-600 mb-5">OUR CONCEPT</h2>
    <!-- Content -->
    <div class="flex flex-col lg:flex-row justify-center items-center mb-4 mx-auto" style="max-width: 80%;">
      <div class="mx-2 lg:mx-5 flex justify-center flex-none w-[40%]">
        <img src="/images/Homepage/CHOOSE ENCORE.png" alt="Immagine 1" class="w-[80%] h-auto" />
      </div>
      <div class="text-center lg:text-left flex flex-col items-center lg:items-start">
        <h3>OUR MESSAGE</h3>
        <p>Bla bla bla bla bla bla</p>
        <a href="/about" class="mt-3 bg-orange-500 text-white rounded-full py-2 px-5 text-lg">About Us</a>
      </div>
    </div>
  </div>
  <!-- End Our Concept Section -->

  <!-- Section Men/Women -->
  <div class="flex flex-wrap">
    <!-- Men -->
    <div class="relative flex-1 text-right">
      <img src="/images/Homepage/full-shot-smiley-man-posing-outdoors.jpg" alt="Description" class="w-full h-full object-cover">
      <a href="/parent-category/1" class="absolute bottom-2 left-[50%] transform-[-50%,0] bg-orange-500 text-white py-2 px-5 text-lg">Men</a>
    </div>
    <!-- Women -->
    <div class="relative flex-1 text-center">
      <img src="/images/Homepage/pexels-airam-datoon-9158467.jpg" alt="Description" class="w-full h-full object-cover">
      <a href="/parent-category/2" class="absolute bottom-2 left-[50%] transform-[-50%,0] bg-orange-500 text-white py-2 px-5 text-lg">Women</a>
    </div>
  </div>
  <!-- End Section Men/Women -->

  <!-- Best Sellers -->
  <div class="container mx-auto my-10 text-green-600">
    <h2 class="text-center mb-5 text-[50px]">BEST SELLERS</h2>
    <div class="flex flex-wrap justify-center">
      <!-- Left Image -->
      <div class="relative w-[50%]">
        <img src="/images/Homepage/pexels-airam-datoon-9158466.jpg" alt="Big Image" class="w-full h-full object-cover">
        <a href="/category/12" class="absolute top-8 right-8 bg-orange-500 text-white py-2 px-5 text-lg">Jackets</a>
      </div>
      <!-- Right Images -->
      <div class="w-[50%] flex flex-col">
        <div class="relative mb-4">
          <img src="/images/Homepage/pexels-stephanie-lima-15749010.jpg" alt="Right Image 1" class="w-full h-full object-cover">
          <a href="/category/2" class="absolute top-8 right-8 bg-orange-500 text-white py-2 px-5 text-lg">Bags</a>
        </div>
        <div class="relative">
          <img src="/images/Homepage/two-beautiful-girls-pastel.jpg" alt="Right Image 2" class="w-full h-full object-cover">
          <a href="/parent-category/4" class="absolute top-8 right-8 bg-orange-500 text-white py-2 px-5 text-lg">Kids</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Best Sellers -->

  <!-- Image Section -->
  <div class="container mx-auto my-5 text-center">
    <div class="flex justify-center">
      <div class="w-[600px] h-[300px]">
        <img src="/images/Homepage/mot.png" alt="Your Image Description" class="object-cover w-full h-full transition-opacity duration-200 ease-in-out hover:opacity-70">
      </div>
    </div>
  </div>
  <!-- End Image Section -->


<!-- Contact Us -->
<div class="bg-center bg-no-repeat bg-cover relative" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/About_us/aboutus.png'); height: 300px;">
  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
    <h1 class="text-4xl">Know the team</h1>
    <a href="/about" class="bg-orange-500 text-white py-2 px-5 text-lg mt-4 inline-block">About Us</a>
  </div>
</div>
<!-- End Contact Us -->

</x-layout>