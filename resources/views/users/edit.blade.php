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
                        Manage profile
                    </h2>
                </header>

                <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="userName" class="inline-block text-lg mb-2">Name</label>
                        <input type="text" class="border rounded p-2 w-full" name="userName" value="{{$user->userName}}" />
                        @error('userName')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userImage" class="inline-block text-lg mb-2">
                            Profile Photo
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="userImage" />
                        <img class="w-48 mr-6" src="{{$user->userImage ? asset('storage/' . $user->userImage):asset('images/no-image.png')}}" alt="Profile Photo">
                        @error('userImage')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userLocation" class="inline-block text-lg mb-2">Location</label>
                        <input type="text" class="border rounded p-2 w-full" name="userLocation" placeholder="Location" value="{{$user->userLocation}}" />
                        @error('userLocation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userPhone" class="inline-block text-lg mb-2">Phone Number</label>
                        <input type="text" class="border rounded p-2 w-full" name="userPhone" value="{{$user->userPhone}}" />
                        @error('userPhone')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="paymentInfo">Payment Method</label>
                        <select name="paymentInfo" id="paymentInfo" required class="border border-gray-300 rounded-md p-2 w-full focus:ring focus:ring-blue-200">
                            <option value="Card">Card (VISA, MasterCard, etc...)</option>
                            <option value="PayPal">PayPal</option>
                            <option value="GooglePay">Google Pay</option>
                            <option value="ApplePay">Apple Pay</option>
                        </select>
                        @error('paymentInfo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password" class="border rounded p-2 w-full" name="password" />
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="inline-block text-lg mb-2">
                            Confirm Password
                        </label>
                        <input type="password" class="border rounded p-2 w-full" name="password_confirmation" />
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-orange_logo_light text-white rounded-xl py-2 px-4 hover:bg-white hover:text-black transition duration-300">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>