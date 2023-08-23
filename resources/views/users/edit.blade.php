<a href="/"><i class=""></i> Back
</a>
<header>
    <h2>
        Edit profile
    </h2>
        <p>Edit: {{$user->email}}</p>
</header>
    
<form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="userName" >Name</label>
        <input type="text" name="userName" value="{{$user->userName}}"/>
        @error('userName')
            <p>{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="userImage">
            Profile Photo
        </label>
        <input type="file" name="userImage" />
        <img src="{{$user->userImage ? asset('storage/' . $user->userIamge):asset('images/no-image.jpg')}}" alt="">
        @error('userImage')
            <p>{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="dateJoined">User since: </label>
        <p>{{$user->dateJoined}}</p>
    </div>
            
    <div>
        <label for="userLocation">Location</label>
        <input type="text" name="userLocation"
            placeholder="Location" value="{{$user->userLocation}}" />
        @error('userLocation')
            <p>{{$message}}</p>
        @enderror
    </div>
    
    <div>
        <label for="userPhone" >Phone Number</label>
        <input type="text" name="userPhone" value="{{$user->userPhone}}"/>
        @error('userPhone')
            <p>{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <p>{{$user->email}}</p>
    </div>

    <div>
        <label for="password" >
            Password
        </label>
        <input type="password"  name="password"/>
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
        <button type="submit">
            Update Profile
        </button>
    </div>
</form>