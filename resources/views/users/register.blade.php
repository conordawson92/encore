<x-layout>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account</p>
        </header>
        <x-form-container>
        <form action="/users" method="POST" enctype="multipart/form-data">
            @csrf {{--don t forget--}}

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
                <label for="userName" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="userName" value="{{old('userName')}}"/>
                @error('userName')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="userLocation" class="inline-block text-lg mb-2">
                    Location
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="userLocation" value="{{old('userLocation')}}"/>
                @error('userLocation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="userPhone" class="inline-block text-lg mb-2">
                    Phone Number
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="userPhone" value="{{old('userPhone')}}"/>
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
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{old('password')}}"/>
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
                <button class="bg-black text-white rounded py-2 px-4 hover:bg-white hover:text-black">
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
        </x-form-container>
 </x-layout>