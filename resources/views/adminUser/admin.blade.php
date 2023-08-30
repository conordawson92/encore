<x-layout>

    <head>
        <title>Encore | Administrator</title>
    </head>
    <div class="w-[60%] mx-auto p-6 bg-white border-1 border-brown_logo shadow-custom-xl my-2">

        <div class="mt-4 pb-5">
            <a href="/adminUser/dashboard" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                <i class="fas fa-user-cog mr-2"></i> Back to Dashboard
            </a>
        </div>

        <h1 class="text-brown_logo text-2xl font-bold mb-4">Admin Functions</h1>

        <!-- the admin options -->
        <div class="space-y-4">
            <a href="/adminUser/users" class="block text-brown_logo hover:underline">
                View All Users
            </a>

            <a href="/adminUser/items" class="block text-brown_logo hover:underline">
                View All Items
            </a>

            <a href="/adminUser/reviews" class="block text-brown_logo hover:underline">
                View All Reviews
            </a>

            <a href="/adminUser/transactions" class="block text-brown_logo hover:underline">
                View All Transactions
            </a>
        </div>

    </div>

</x-layout>
