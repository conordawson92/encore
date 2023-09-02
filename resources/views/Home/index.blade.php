<head>
  <title>Encore | Home Page</title>
</head>


<x-layout>

  <!-- Main Content -->
  <div class="overflow-hidden h-[600px]">
    <div class="bg-center bg-no-repeat bg-cover hover:scale-105 transition-transform duration-300 ease-in-out flex items-center justify-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/images/assets/homepage/pexels-rachel-claire-4992652.jpg') }}'); height: 600px;">
      <div class="relative text-center space-y-12">
        <h1 class="text-9xl font-oglnf text-white mb-28">Encore</h1>
        <a href="/listings" class="bg-orange-500 text-white py-5 px-10 text-lg">Shop Now</a>
      </div>
    </div>
  </div>

  <!-- End Cover Image Section -->

  <!-- Our Concept Section -->
<div class="container mx-auto my-5">
  <!-- Title -->
  <h2 class="text-center text-green-700 mb-5 text-8xl font-oglnf">OUR CONCEPT</h2>
  <!-- Content -->
  <div class="flex flex-col lg:flex-row justify-center items-center mb-4 mx-auto" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex justify-center flex-none w-full md:w-[40%]">
      <img src="{{ asset('storage/images/assets/homepage/CHOOSE ENCORE.png') }}" alt="Immagine 1" class="w-[100%] md:w-[80%] h-auto" />
    </div>

    <div class="text-center lg:text-left flex flex-col items-center lg:items-start mt-5 lg:mt-0">
      <h3 class="text-2xl md:text-lg-4xl">Dear Users,

        We're thrilled to introduce Encore, your go-to platform for ethical fashion. Give your clothes a second act and help us revolutionize fashion by choosing sustainability.
        
        With Encore, each purchase or sale is more than a transaction it's a step toward a greener future. Create a free account today and join us in making fashion a force for good.
        
        Best regards,
        Encore.</h3>
      <a href="/about" class="mt-3 bg-orange-500 text-white py-3 md:py-2 px-8 md:px-5 text-lg md:text-base">About Us</a>
    </div>
  </div>
</div>
<!-- End Our Concept Section -->


 <!-- Section Men/Women -->
<div class="flex flex-wrap">
  <!-- Men -->
  <div class="relative flex-1 text-right">
    <img src="{{ asset('storage/images/assets/homepage/full-shot-smiley-man-posing-outdoors.jpg') }}" alt="Description" class="w-full h-full object-cover">
    <a href="/parent-category/1" class="absolute bottom-2 left-[50%] transform-[-50%,0] bg-orange-500 hover:bg-white active:bg-orange-700 text-white hover:text-orange-500 active:text-white py-2 px-5 md:py-4 md:px-10 text-lg md:text-2xl">
      Men
    </a>
  </div>
  <!-- Women -->
  <div class="relative flex-1 text-center">
    <img src="{{ asset('storage/images/assets/homepage/pexels-airam-datoon-9158467.jpg') }}" alt="Description" class="w-full h-full object-cover">
    <a href="/parent-category/2" class="absolute bottom-2 left-[50%] transform-[-50%,0] bg-orange-500 hover:bg-white active:bg-orange-700 text-white hover:text-orange-500 active:text-white py-2 px-5 md:py-4 md:px-10 text-lg md:text-2xl">
      Women
    </a>
  </div>
</div>
<!-- End Section Men/Women -->



  <!-- Best Sellers -->
<div class="container mx-auto my-10 ">
  <h2 class="text-center text-green-700 mb-5 text-8xl font-oglnf">BEST SELLERS</h2>
  <div class="flex flex-wrap justify-center">
    <!-- Left Image -->
    <div class="relative w-[49%] md:mr-1 p-0 m-0">
      <img src="{{ asset('storage/images/assets/homepage/pexels-airam-datoon-9158466.jpg') }}" alt="Big Image" class="w-full h-full object-cover m-0 p-0">
      <a href="/category/12" class="absolute top-8 right-8 bg-orange-500 text-white py-2 px-5 text-lg">Jackets</a>
    </div>
    <!-- Right Images -->
    <div class="w-[49%] flex flex-col md:ml-1 p-0 m-0">
      <div class="relative mb-0 p-0 md:mb-1">
        <img src="{{ asset('storage/images/assets/homepage/pexels-stephanie-lima-15749010.jpg') }}" alt="Right Image 1" class="w-full h-full object-cover m-0 p-0">
        <a href="/category/2" class="absolute top-8 right-8 bg-orange-500 text-white py-2 px-5 text-lg">Bags</a>
      </div>
      <div class="relative p-0 m-0 md:mt-1">
        <img src="{{ asset('storage/images/assets/homepage/two-beautiful-girls-pastel.jpg') }}" alt="Right Image 2" class="w-full h-full object-cover m-0 p-0">
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
        <img src="{{ asset('storage/images/assets/Homepage/mot.png') }}" alt="Your Image Description" class="object-cover w-full h-full transition-opacity duration-200 ease-in-out hover:opacity-70">

      </div>
    </div>
  </div>
  <!-- End Image Section -->


  <!-- Contact Us -->
  <div class="bg-center bg-no-repeat bg-cover relative" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/images/assets/About_us/aboutus.png') }}'); height: 300px;">

    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
      <h1 class="text-6xl">Know the team</h1>
      <a href="/about" class="bg-orange-500 text-white py-2 px-5 text-lg mt-4 inline-block">About Us</a>
    </div>
  </div>
  <!-- End Contact Us -->

</x-layout>