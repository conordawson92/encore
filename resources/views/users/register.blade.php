<head>
    <title>Encore | Sign up</title>
</head>


<x-layout>
    <div class="flex h-screen">

        <!-- Left side for Image -->
        <div class="w-1/2 h-full bg-center bg-cover hidden customLg:flex bg-orange_logo_light">
            <!-- Embedded Image -->
            <img src="{{ asset('/storage/images/Assets/register_tv.png') }}" alt="Description" class="object-contain w-full h-full">
        </div>

        <!-- Right side for Registration Form -->
        <div class="w-full customLg:w-1/2 bg-white flex items-center justify-center">
            
            <div class="flex flex-col p-8 overflow-y-auto" style="max-height: 100vh;">
                <header class="text-center customLg:text-left mb-8">
                    <h2 class="text-5xl font-bold uppercase mb-1 text-orange_logo_light">
                        Sign Up
                    </h2>
                </header>


                <form action="/users" method="POST" enctype="multipart/form-data">
                    @csrf {{-- don't forget --}}

                    <div class="mb-6">
                        <label for="userName" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="userName" value="{{old('userName')}}" />
                        @error('userName')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userImage" class="inline-block text-lg mb-2">
                            Profile Photo
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="userImage" />
                        @error('userImage')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="userLocation" class="inline-block text-lg mb-2">
                            Location
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="userLocation" value="{{old('userLocation')}}" />
                        @error('userLocation')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="userPhone" class="inline-block text-lg mb-2">
                            Phone Number
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="userPhone" value="{{old('userPhone')}}" />
                        @error('userPhone')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
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
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{old('password')}}" />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password2" class="inline-block text-lg mb-2">
                            Confirm Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-orange_logo_light text-white rounded py-2 px-4 hover:bg-white hover:text-black">
                            Sign Up
                        </button>
                    </div>
                    <div class="mt-8">
                        <p>
                            Already have an account?
                            <a href="/login" class="text-laravel">Login</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout>