<x-layout>

  <head>
    <title>Encore | Administrator</title>
  </head>

  <div class="bg-cover bg-center backdrop-blur-md bg-fixed flex items-center justify-center h-screen" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/images/assets/About_us/aboutus.png') }}'); height: 600px;">


    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md m-4 transform hover:shadow-2xl transition-shadow duration-200 filter hover:drop-shadow-orange">
      <div class="mb-4 flex justify-between items-center">

        <a href="/adminUser/dashboard" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
          <i class="fas fa-user-cog mr-2"></i> Back to Dashboard
        </a>
        <div class="text-6xl text-orange-500">
          🛠
        </div>

      </div>
      <h1 class="text-2xl mb-4">Admin Functions</h1>
      <ul class="space-y-2">
        <li class="hover:bg-orange-500 hover:text-white px-2 rounded-lg">
          <a href="/adminUser/users" class="text-black-500 hover:text-white transform hover:scale-180 transition-transform duration-200 rad">View All Users</a>
        </li>
        <li class="hover:bg-orange-500 hover:text-white px-2 rounded-lg">
          <a href="/adminUser/items" class="text-black-500 hover:text-white transform hover:scale-180 transition-transform duration-200">View All Items</a>
        </li>
        <li class="hover:bg-orange-500 hover:text-white px-2 rounded-lg">
          <a href="/adminUser/reviews" class="text-black-500 hover:text-white transform hover:scale-180 transition-transform duration-200">View All Reviews</a>
        </li>
        <li class="hover:bg-orange-500 hover:text-white px-2 rounded-lg">
          <a href="/adminUser/transactions" class="text-black-500 hover:text-white transform hover:scale-180 transition-transform duration-200">View All Transactions</a>
        </li>
      </ul>
    </div>
  </div>
</x-layout>