<head>
    <title>Encore | Edit User</title>
</head>

<x-layout>
    <div class="flex h-screen">

        <!-- Left side for Image -->
        <div class="w-1/2 h-full bg-center bg-cover hidden customLg:flex bg-orange_logo_light">
            <!-- Embedded Image -->
            <img src="http://encore.test/storage/images/assets/register_tv.png" alt="Description" class="object-contain w-full h-full">
        </div>

        <!-- Right side for Edit Profile Form -->
        <div class="w-full customLg:w-1/2 bg-white flex items-center justify-center">
            <div class="flex flex-col p-8 overflow-y-auto" style="max-height: 100vh;">
                <header class="mb-8">
                    <h2 class="text-5xl font-bold uppercase mb-1 text-orange_logo_light">
                        Edit User
                    </h2>
                </header>

                <form action="{{ route('users.updateUser', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="userName" class="inline-block text-lg mb-2">Name</label>
                        <input type="text" class="border rounded p-2 w-full" name="userName" value="{{ $user->userName }}" required>
                        @error('userName')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userImage" class="inline-block text-lg mb-2">Profile Photo</label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="userImage">
                        @if($user->userImage)
                        <img class="w-48 mt-2" src="{{ asset('storage/' . $user->userImage) }}" alt="Profile Photo">
                        @endif
                        @error('userImage')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email" class="border rounded p-2 w-full" name="email" value="{{ $user->email }}" required>
                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userLocation" class="inline-block text-lg mb-2">Location</label>
                        <input type="text" class="border rounded p-2 w-full" name="userLocation" value="{{ $user->userLocation }}" required>
                        @error('userLocation')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userPhone" class="inline-block text-lg mb-2">Phone Number</label>
                        <input type="text" class="border rounded p-2 w-full" name="userPhone" value="{{ $user->userPhone }}" required>
                        @error('userPhone')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="paymentInfo">Payment Method</label>

                        <select name="paymentInfo" id="paymentInfo" required class="border border-gray-300 rounded-md p-2 w-full focus:ring focus:ring-blue-200">
                            <option value="Card">Card (VISA, MasterCard, etc...)</option>
                        </select>
                        @error('paymentInfo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-orange_logo_light text-white rounded-xl py-2 px-4 hover:bg-white hover:text-black transition duration-300">
                            Update User
                        </button>
                        <a href="{{ route('adminUser.users') }}" class="mb-8 text-blue-500 hover:underline">Back to User List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>