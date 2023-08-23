<x-layout>
<a href="/"><i></i> Back
</a>
<header>
    <h2>
        Login
    </h2>
    <p>Login to your account</p>
</header>
    
<form action="/users/authenticate" method="POST">
    @csrf {{--don t forget--}}
            
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{old('email')}}"/>
        @error('email')
            <p>{{$message}}</p>
        @enderror
    </div>
    
    <div>
        <label for="password" >
            Password
        </label>
        <input type="password" name="password" value="{{old('password')}}"/>
        @error('password')
            <p>{{$message}}</p>
        @enderror
    </div>
    
    <div>
        <button>
            Sign In
        </button>
    </div>
    
    <div>
        <p>
            Do not have an account?
            <a href="/register">Register</a>
        </p>
    </div>
</form>
</x-layout>