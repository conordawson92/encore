
<x-layout>

  <div class="container mx-auto mt-10">

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
      <h2 class="text-5xl py-6">ENCORE EXCHANGE</h2>
      <p>
        Every piece of clothing has a footprint, from the water and pesticides used in growing cotton, to the energy consumed in manufacturing 
        and shipping. By choosing second-hand, you are actively reducing the demand for new production, 
        decreasing your carbon footprint, and ensuring fewer items end up in landfills. It's a sustainable choice 
        for the planet.
    </p>
    </div>
  </div>

  <!-- Right Image and Description -->
  <div class="flex flex-col md:flex-row-reverse space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-cottonbro-studio-6069552.jpg" alt="Image 2" class="w-full h-auto transform transition-transform hover:scale-105">
    </div>
    <div class="w-full md:w-1/2 text-left pr-6">
      <h2 class="text-5xl py-6">CLOTHES FROM CLOTHES</h2>
      <p>
        By buying and selling on our platform, you're not just participating in commerce—you're actively supporting a circular economy. 
        This means we're moving away from the traditional "buy, use, dispose" model and towards an approach that values reuse and repurposing.
        Dive into a world where fashion meets affordability. Second-hand doesn't mean second-best. Find premium brands and quality pieces at 
        a fraction of the original price, giving your wardrobe a makeover without breaking the bank.
    </p>
    </div>
  </div>

  <!-- Another Left Image and Description -->
  <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-karolina-grabowska-4210850.jpg" alt="Image 3" class="w-full h-auto transform transition-transform hover:scale-105">
    </div>
    <div class="w-full md:w-1/2 text-left pl-6">
      <h2 class="text-5xl py-6">ANOTHER ENCORE EXCHANGE</h2>
      <p>Description</p>
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
