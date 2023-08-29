
<x-layout>

  <div class="container mx-auto mt-10">

    <div class="flex flex-col md:flex-row mt-5 space-y-4 md:space-y-0 md:space-x-4">
      <!-- Image -->
      <div class="flex-1">
        <img src="./images/Contact_us/Encore manifest.png" alt="Image" class="w-full h-auto">
      </div>

      <!-- Form -->
      <div class="flex-1">
        <form>
          <div class="mb-3">
            <label for="name" class="block text-sm font-medium text-gray-600">First Name</label>
            <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
            @error('name')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            @error('email')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="subject" class="block text-sm font-medium text-gray-600">Subject</label>
            <select id="subject" name="subject" class="mt-1 p-2 w-full border rounded-md">
              <option value="">--Select Subject--</option>
              <option value="Project">I'd like to start a project</option>
              <option value="Question">I'd like to ask a question</option>
              <option value="Other">I'd like to make a proposal</option>
            </select>
            @error('subject')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="message" class="block text-sm font-medium text-gray-600">Message</label>
            <textarea id="message" name="message" rows="8" class="mt-1 p-2 w-full border rounded-md"></textarea>
            @error('message')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded">Send Us</button>
        </form>
      </div>
    </div>

    <!-- More content: "The Future is Now" -->
    <div class="my-5 text-center text-4xl mt-16">
      <h1 class="text-8xl font-oglnf text-green-700">The Future is Now</h1>
    </div>

<!-- Images and Descriptions -->
<div class="space-y-4 md:space-y-8 my-8">

  <!-- Left Image and Description -->
  <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-karolina-grabowska-4210850.jpg" alt="Image 1" class="w-full h-auto transform transition-transform hover:scale-105">
    </div>
    <div class="w-full md:w-1/2 text-left pl-6">
      <h2 class="text-4xl py-6">WE SHOULD ALL TAKE CARE OF OUR HOME</h2>
      <p class="text-2xl">
        By choosing to buy or sell on <span class="italic font-bold">Encore</span>, you're making a conscious decision to reduce your 
        environmental footprint. The fashion industry is one of the largest contributors to pollution, with countless garments ending up in 
        landfills each year. By giving clothing a second life, not only are you preventing waste, but you're also reducing the demand for new 
        clothing production. This in turn means less water usage, fewer chemicals released from dyes, and a significant reduction in carbon 
        emissions. Every item you purchase or sell is a step towards a more sustainable planet.
    </p>
    </div>
  </div>

  <!-- Right Image and Description -->
  <div class="flex flex-col md:flex-row-reverse space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-cottonbro-studio-6069552.jpg" alt="Image 2" class="w-full h-auto transform transition-transform hover:scale-105">
    </div>
    <div class="w-full md:w-1/2 text-left pr-6">
      <h2 class="text-4xl py-6">EVERYONE WINS IN A CIRCULAR ECONOMY</h2>
      <p class="text-2xl">
        Economically, <span class="italic font-bold">Encore</span> offers dual advantages. For buyers, you get the opportunity to acquire high-quality clothing 
        at a fraction of the original price, allowing for a refreshed wardrobe without breaking the bank. For sellers, it's an 
        opportunity to declutter, renew space, and earn from items that are no longer in use. Rather than letting unused garments 
        gather dust, they can be turned into extra cash. The cycle of buying and selling not only promotes a circular economy but 
        also ensures that fashion remains affordable and accessible to everyone.
    </p>
    </div>
  </div>

  <!-- Another Left Image and Description -->
  <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-karolina-grabowska-4210850.jpg" alt="Image 3" class="w-full h-auto transform transition-transform hover:scale-105">
    </div>
    <div class="w-full md:w-1/2 text-left pl-6">
      <h2 class="text-4xl py-6">SHOW YOURSELF THE WAY YOU WANT</h2>
      <p class="text-2xl">
        Unlike fast fashion outlets, <span class="italic font-bold">Encore</span> offers a diverse array of unique pieces that often aren't 
        found in mainstream stores. This allows buyers to curate a distinctive personal style. Additionally, we pride ourselves on 
        quality assurance.
      </p>
    </div>
  </div>

  <hr class="w-full md:w-11/12 m-auto border border-brown_logo">


  <div class="my-5 text-center text-4xl">
    
    <h1 class="text-8xl font-oglnf text-green-700">Contact us</h1>
  </div>

  <div class="flex flex-col md:flex-row mt-5 space-y-4 md:space-y-0 md:space-x-4">
    <!-- Image -->
    <div class="flex-1">
      <img src="./images/Contact_us/Encore manifest.png" alt="Image" class="w-full h-auto">
    </div>


    <!-- Form -->
    <div class="flex-1">
      <form>
        <div class="mb-3">
          <label for="name" class="block text-sm font-medium text-gray-600">First Name</label>
          <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
        </div>
        <div class="mb-3">
          <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
          <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
        </div>
        <div class="mb-3">
          <label for="subject" class="block text-sm font-medium text-gray-600">Subject</label>
          <select id="subject" name="subject" class="mt-1 p-2 w-full border rounded-md">
            <option value="">--Select Subject--</option>
            <option value="Project">I'd like to start a project</option>
            <option value="Question">I'd like to ask a question</option>
            <option value="Other">I'd like to make a proposal</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="message" class="block text-sm font-medium text-gray-600">Message</label>
          <textarea id="message" name="message" rows="8" class="mt-1 p-2 w-full border rounded-md"></textarea>
        </div>
        <button type="submit" class="bg-orange_logo hover:bg-orange_logo_hover text-beige_logo font-bold py-2 px-4 rounded">Send Us</button>
      </form>
    </div>
  </div>

</div>
  
</x-layout>
