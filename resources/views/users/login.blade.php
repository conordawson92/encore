<x-layout>
<header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
            Login
            </h2>
            <p class="mb-4">Login to your account</p>
        </header>
<x-form-container>   
<form action="/users/authenticate" method="POST" class="space-y-6">
    @csrf 

    <!-- Email -->
    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" name="email" class="border border-gray-200 rounded p-2 w-full" value="{{old('email')}}"/>
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    
    <!-- Password -->
    <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">Password</label>
        <input type="password" name="password" class="border border-gray-200 rounded p-2 w-full" value="{{old('password')}}"/>
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    
    <!-- Button -->
    <div class="mb-6">
        <button class="bg-black text-white rounded py-2 px-4 hover:bg-white hover:text-black">
            Sign In
        </button>
    </div>
    
    <!-- Register Link -->
    <div class="mt-8">
        <p>
            Do not have an account?
            <a href="/register" class="text-laravel">Register</a>
        </p>
    </div>
</form>
</x-form-container>
</x-layout>