<a href="/"><i></i> Back
</a>
<header>
    <h2>
        Register
    </h2>
    <p>Create an account</p>
</header>
    
<form action="/users" method="POST" enctype="multipart/form-data">
    @csrf {{--don t forget--}}
    <div>
        <label for="userName" >
            Name
        </label>
        <input type="text" name="userName" value="{{old('userName')}}"/>
        @error('userName')
            <p>{{$message}}</p>
        @enderror
    </div>

     <div>
        <label for="userImage">
            Profile photo
        </label>
        <input type="file" name="userImage"/>
        @error('userImage')
            <p>{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="userLocation" >
            Location
        </label>
        <input type="text" name="userLocation" value="{{old('userLocation')}}"/>
        @error('userLocation')
            <p>{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="userPhone">
            Phone Number
        </label>
        <input type="text" name="userPhone" value="{{old('userPhone')}}"/>
        @error('userPhone')
            <p>{{$message}}</p>
        @enderror
    </div>
    
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
        <label for="password_confirmation" >
            Confirm Password
        </label>
        <input type="password" name="password_confirmation" />
        @error('password_confirmation')
            <p>{{$message}}</p>
        @enderror
    </div>
    
    <div>
        <button>
            Sign Up
        </button>
    </div>
    
    <div>
        <p>
            Already have an account?
            <a href="/login">Login</a>
        </p>
    </div>
</form>