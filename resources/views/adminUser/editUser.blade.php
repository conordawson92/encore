<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <a href="{{ route('adminUser.users') }}">Back to User List</a>
    <h1>Edit User</h1>

    <h2>User Information</h2>
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->
        <label for="userName">Name:</label>
        <input type="text" name="userName" value="{{ $user->userName }}" required>
        <br>
        <label for="userImage">Email:</label>
        <input type="file" name="userImage" value="{{ $user->userImage }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <br>
        <label for="userLocation">Location:</label>
        <input type="text" name="userLocation" value="{{ $user->userLocation }}" required>
        <br>
        <label for="userPhone">User Phone:</label>
        <input type="text" name="userPhone" value="{{ $user->userPhone }}" required>
        <br>
        <label for="paymentInfo">Email:</label>
        <input type="text" name="paymentInfo" value="{{ $user->paymentInfo }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
