
<x-layout>

  <div class="container mx-auto mt-10">
    <div class="my-5 text-center text-4xl">
      <h1>Contact us</h1>
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
          <button type="submit" class="bg-blue-500 text-white p-2 rounded">Send Us</button>
        </form>
      </div>
    </div>

    <!-- More content: "The Future is Now" -->
    <div class="my-5 text-center text-4xl mt-16">
      <h1>The Future is Now</h1>
    </div>

<!-- Images and Descriptions -->
<div class="space-y-4 md:space-y-8 my-8">

  <!-- Left Image and Description -->
  <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-karolina-grabowska-4210850.jpg" alt="Image 1" class="w-full h-auto transform transition-transform hover:scale-110">
    </div>
    <div class="w-full md:w-1/2 text-left">
      <h2 class="text-2xl">ENCORE EXCHANGE</h2>
      <p>Description</p>
    </div>
  </div>

  <!-- Right Image and Description -->
  <div class="flex flex-col md:flex-row-reverse space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-cottonbro-studio-6069552.jpg" alt="Image 2" class="w-full h-auto transform transition-transform hover:scale-110">
    </div>
    <div class="w-full md:w-1/2 text-right">
      <h2 class="text-2xl">CLOTHES FROM CLOTHES</h2>
      <p>Description</p>
    </div>
  </div>

  <!-- Another Left Image and Description -->
  <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <img src="./images/Contact_us/pexels-karolina-grabowska-4210850.jpg" alt="Image 3" class="w-full h-auto transform transition-transform hover:scale-110">
    </div>
    <div class="w-full md:w-1/2 text-left">
      <h2 class="text-2xl">ANOTHER ENCORE EXCHANGE</h2>
      <p>Description</p>
    </div>
  </div>

</div>
  
</x-layout>
