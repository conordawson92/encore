<x-layout>

        <header class="text-center rounded-xl">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit profile
            </h2>
            <p class="mb-4"> {{$user->userName}}</p>
        </header>
        <x-form-container> 
        <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

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
                <label for="userName" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border rounded p-2 w-full" name="userName" value="{{$user->userName}}"/>
                @error('userName')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="userLocation" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border rounded p-2 w-full" name="userLocation"
                    placeholder="Location" value="{{$user->userLocation}}" />
                @error('userLocation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="userPhone" class="inline-block text-lg mb-2">Phone Number</label>
                <input type="text" class="border rounded p-2 w-full" name="userPhone" value="{{$user->userPhone}}"/>
                @error('userPhone')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="paymentInfo">Payment Method</label>
                <select name="paymentInfo" id="paymentInfo" required>
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
                <input type="password" class="border rounded p-2 w-full" name="password"/>
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
    <button type="submit" class="bg-black text-white rounded-xl py-2 px-4 hover:bg-white hover:text-black transition duration-300">
        Update Profile
    </button>
</div>
        </form>
        </x-form-container>
</x-layout>