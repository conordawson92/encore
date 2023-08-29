<head>
    <title>Encore | Sign In</title>
</head>


<x-layout>

    <div class="flex h-screen">

        <!-- Left side for Image -->
        <div class="w-1/2 h-full bg-center bg-cover hidden customLg:flex bg-orange_logo_light">
            <!-- If you want to embed an image instead of using a background -->
            <img src="http://encore.test/storage/images/assets/register_tv.png" alt="Description" class="object-contain w-full h-full">
        </div>

        <!-- Right side for Form -->

        <div class="w-full customLg:w-1/2 bg-white flex items-center justify-center">

            <div class="flex flex-col p-8 overflow-y-auto" style="max-height: 100vh;">
                <header class="mb-8">
                    <h1 class="text-5xl font-bold uppercase mb-1 text-orange_logo_light">
                        Sign in
                    </h1>
                    <p>Sign in your account</p>
                </header>


                <form action="/users/authenticate" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email" name="email" class="border border-gray-200 rounded p-2 w-full" value="{{old('email')}}" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">Password</label>
                        <input type="password" name="password" class="border border-gray-200 rounded p-2 w-full" value="{{old('password')}}" />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Button -->
                    <div class="mb-6">
                        <button class="bg-orange_logo_light text-white rounded py-2 px-4 hover:bg-white hover:text-black">
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

            </div>

        </div>

    </div>

</x-layout>