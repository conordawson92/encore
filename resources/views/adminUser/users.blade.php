<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
    <a href="/adminUser/admin">Back to Admin Functions</a>
    <h1>Manage Users</h1>

    <!-- Display list of users -->

    {{-- active users --}}
    <h3>Active Users</h3>
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
            @foreach ($activeUsers as $user)
                <tr>
                    <td>{{ $user->userName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->dateJoined }}</td>
                    <td>
                        <a href="/adminUser/users/{{ $user->id }}">View</a>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a>
                        <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to ban this user?')) { document.getElementById('ban-form-{{ $user->id }}').submit(); }">
                            Ban
                        </a>
                        <form id="ban-form-{{ $user->id }}" action="{{ route('users.banUser', ['user' => $user->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- banned users --}}
    @if ($bannedUsers->count() > 0)
    <h3>Banned Users</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined Date</th>
                <th>Banned Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bannedUsers as $user)
            <tr>
                <td>{{ $user->userName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->dateJoined }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to restore this user?')) { document.getElementById('restore-form-{{ $user->id }}').submit(); }">
                        Restore
                    </a>
                    <form id="restore-form-{{ $user->id }}" action="{{ route('users.restore', ['user' => $user->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No banned users found.</p>
@endif

</body>
</html>
