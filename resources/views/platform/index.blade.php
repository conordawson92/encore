<head>
  <title>Encore | Contact Us</title>
</head>

<x-layout>
<!-- More content: "The Future is Now" -->
<div class="container mx-auto my-16">
  <h1 class="text-center text-8xl font-oglnf text-green-700 mb-10">The Future is Now</h1>
</div>

  <!-- Images left -->
  <div class="flex flex-col md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-left" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
      <img src="{{ asset('/storage/images/Assets/Contact_us/pexels-karolina-grabowska-4210850.jpg') }}" alt="Description" class="img-hover-effect w-9/10 md:w-4/5"></div>
    <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
      <h2 class="text-4xl md:text-7xl text-green-700 md:text-left">WE SHOULD ALL TAKE CARE OF OUR HOME</h2>
      <p class="text-lg md:text-base md:text-left">            By choosing to buy or sell on <span class="italic font-bold">Encore</span>, you're making a conscious decision to reduce your 
        environmental footprint. The fashion industry is one of the largest contributors to pollution, with countless garments ending up in 
        landfills each year. By giving clothing a second life, not only are you preventing waste, but you're also reducing the demand for new 
        clothing production. This in turn means less water usage, fewer chemicals released from dyes, and a significant reduction in carbon 
        emissions. Every item you purchase or sell is a step towards a more sustainable planet.
      </p>
    </div>
  </div>

<!-- Images right -->
<div class="flex flex-col-reverse md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-right" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
      <h2 class="text-4xl md:text-7xl  text-orange_logo md:text-right">EVERYONE WINS IN A CIRCULAR ECONOMY</h2>
      <p class="text-lg md:text-base">
        Economically, <span class="italic font-bold">Encore</span> offers dual advantages. For buyers, you get the opportunity to acquire high-quality clothing 
        at a fraction of the original price, allowing for a refreshed wardrobe without breaking the bank. For sellers, it's an 
        opportunity to declutter, renew space, and earn from items that are no longer in use. Rather than letting unused garments 
        gather dust, they can be turned into extra cash. The cycle of buying and selling not only promotes a circular economy but 
        also ensures that fashion remains affordable and accessible to everyone.
      </p>
    </div>
    <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
      <img src="{{ asset('/storage/images/Assets/Contact_us/pexels-cottonbro-studio-6069552.jpg') }}" alt="Description" class="img-hover-effect w-9/10 md:w-4/5"></div>
    </div>
  </div>
  
<!-- Images left -->
  <div class="flex flex-col md:flex-row items-center justify-center mb-4 mx-auto text-center md:text-left" style="max-width: 80%;">
    <div class="mx-2 lg:mx-5 flex justify-center w-full md:w-2/5">
      <img src="{{ asset('/storage/images/Assets/Contact_us/Clothes-box-1024x1024.jpg') }}" alt="Description" class="img-hover-effect w-9/10 md:w-4/5"></div>
    <div class="mx-2 lg:mx-5 flex-none w-full md:w-2/5">
      <h2 class="text-4xl md:text-7xl text-green-700 md:text-left">SHOW YOURSELF THE WAY YOU WANT</h2>
      <p class="text-lg md:text-base md:text-left">           
         One of the most compelling reasons to buy from our second-hand clothing website is the opportunity it offers 
        for unique self-expression. Unlike mainstream fast fashion outlets that produce garments en masse, leading to everyone 
        sporting similar styles, <span class="italic font-bold">Encore</span> boasts a diverse range of distinctive pieces often not found elsewhere. This diversity 
        allows you to curate a wardrobe that truly stands out and represents your individual taste and personality. By choosing 
        <span class="italic font-bold">Encore</span>, you're not just purchasing clothes; you're investing in a style that is uniquely yours, setting you apart from the crowd.
      </p>
    </div>
  </div>

 
  <!-- Contact Us Section -->
  <h1 class="text-center text-8xl font-oglnf text-green-700 my-10" id="contact-us">Contact us</h1>
  <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
      <!-- Contact Us Image -->
      <div class="w-full md:w-1/2">
          <img src="./images/Contact_us/Encore manifest.png" alt="Image" class="w-full h-auto">
      </div>

      <!-- Contact Us Form -->
      <div class="w-full px-4 md:w-1/2">
          <form>
              <div class="mb-4">
                  <label for="name" class="block text-sm font-medium text-gray-600">First Name</label>
                  <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
              </div>
              <div class="mb-4">
                  <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                  <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
              </div>
              <div class="mb-4">
                  <label for="message" class="block text-sm font-medium text-gray-600">Message</label>
                  <textarea id="message" name="message" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
              </div>
              <button type="submit" class="bg-orange_logo hover:bg-orange_logo_hover text-white font-bold py-2 px-4 rounded">Send Us</button>
          </form>
      </div>
  </div>


</x-layout>
