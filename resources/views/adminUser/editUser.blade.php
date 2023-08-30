<head>
    <title>Encore | Edit User</title>
</head>

<x-layout>
    <div class="flex overflow-y-auto h-screen bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/images/assets/Contact_us/Encore manifest.png') }}');">
        <div class="m-auto bg-white rounded-lg shadow-lg w-full lg:w-3/4 xl:w-1/2 p-8 overflow-y-auto" style="max-height: calc(100vh - 2rem);">
            <header class="mb-8">
                <h2 class="text-5xl font-bold uppercase mb-1 text-orange_logo">
                    Edit User
                </h2>
            </header>

            <form action="{{ route('users.updateUser', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6 flex flex-wrap">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="lg:w-1/2 w-full p-2">
                    <label for="userName" class="block text-lg mb-2">Name</label>
                    <input type="text" class="border rounded p-2 w-full" name="userName" value="{{ $user->userName }}" required>
                </div>

                <!-- Email Field -->
                <div class="lg:w-1/2 w-full p-2">
                    <label for="email" class="block text-lg mb-2">Email</label>
                    <input type="email" class="border rounded p-2 w-full" name="email" value="{{ $user->email }}" required>
                </div>

                <!-- Profile Photo Field -->
                <div class="lg:w-1/2 w-full p-2">
                    <label for="userImage" class="block text-lg mb-2">Profile Photo</label>
                    <input type="file" class="border rounded p-2 w-full" name="userImage">
                </div>

                <!-- Location Field -->
                <div class="lg:w-1/2 w-full p-2">
                    <label for="userLocation" class="block text-lg mb-2">Location</label>
                    <input type="text" class="border rounded p-2 w-full" name="userLocation" value="{{ $user->userLocation }}" required>
                </div>

                <!-- Phone Number Field -->
                <div class="lg:w-1/2 w-full p-2">
                    <label for="userPhone" class="block text-lg mb-2">Phone Number</label>
                    <input type="text" class="border rounded p-2 w-full" name="userPhone" value="{{ $user->userPhone }}" required>
                </div>

                <!-- Payment Method Field -->
                <div class="lg:w-1/2 w-full p-2">
                    <label for="paymentInfo" class="block text-lg mb-2">Payment Method</label>
                    <input type="text" class="border rounded p-2 w-full" name="paymentInfo" value="{{ $user->paymentInfo }}" required>
                </div>

                <!-- Submit Button -->
                <div class="w-full flex justify-between items-center mt-6">

                    <a href="{{ route('adminUser.users') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                        <i class="fas fa-user-cog mr-2"></i> Back to User List
                    </a>
                    <button type="submit" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>