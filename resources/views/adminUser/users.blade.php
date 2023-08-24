<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
    <a href="/adminUser/admin">Back to Admin Functions</a>
    <h1>Manage Users</h1>

    <!-- Display list of users -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->userName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->dateJoined }}</td>
                    <td>
                        <a href="/adminUser/users/{{ $user->id }}">View</a>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a>
                        <a href="{{ route('users.ban', ['user' => $user->id]) }}">Ban</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
