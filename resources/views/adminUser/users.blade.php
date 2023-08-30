<head>
    <title>Encore | Users</title>
</head>

<x-layout>
    <div class="p-8 space-y-6 overflow-y-auto" style="max-height: 90vh;">

        <!-- Back Navigation and Title -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin') }}" class="bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-600 transition-all duration-300 items-center">
                <i class="fas fa-user-cog mr-2"></i> Back to Admin Functions
            </a>
            <div class="flex items-center">
                <h1 class="text-4xl font-semibold text-orange_logo ml-4">Manage Users</h1>
                <div class="text-3xl text-orange-500 ml-4">
                    🛠
                </div>
            </div>
        </div>

        <!-- Active Users -->
        <section class="space-y-4">
            <h3 class="text-4xl font-semibold text-orange-500 mb-8">Active Users</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border-t border-l rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border-b border-r text-left">Name</th>
                            <th class="p-3 border-b border-r text-left">Email</th>
                            <th class="p-3 border-b border-r text-left">Joined Date</th>
                            <th class="p-3 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activeUsers as $user)
                        <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }} hover:bg-gray-200">
                            <td class="p-2 border">{{ $user->userName }}</td>
                            <td class="p-2 border">{{ $user->email }}</td>
                            <td class="p-2 border">{{ $user->dateJoined }}</td>
                            <td class="p-2 border flex space-x-4">
                                <a href="/adminUser/users/{{ $user->id }}" class="bg-orange-500 text-white py-1 px-2 rounded hover:bg-orange-600">View</a>
                                <a href="{{ route('users.editUser', ['user' => $user->id]) }}" class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-600">Edit</a>
                                <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to ban this user?')) { document.getElementById('ban-form-{{ $user->id }}').submit(); }" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Ban</a>
                                <form id="ban-form-{{ $user->id }}" action="{{ route('users.banUser', ['user' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Banned Users -->
        <section class="space-y-4">
            @if ($bannedUsers->count() > 0)
            <h3 class="text-4xl font-semibold text-orange-500 mb-8">Banned Users</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border-t border-l rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border text-left">Name</th>
                            <th class="p-2 border text-left">Email</th>
                            <th class="p-2 border text-left">Joined Date</th>
                            <th class="p-2 border text-left">Banned Date</th>
                            <th class="p-2 border text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bannedUsers as $user)
                        <tr class="hover:bg-gray-200">
                            <td class="p-2 border">{{ $user->userName }}</td>
                            <td class="p-2 border">{{ $user->email }}</td>
                            <td class="p-2 border">{{ $user->dateJoined }}</td>
                            <td class="p-2 border">{{ $user->updated_at }}</td>
                            <td class="p-2 border">
                                <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to restore this user?')) { document.getElementById('restore-form-{{ $user->id }}').submit(); }" class="text-green-600 hover:underline">Restore</a>
                                <form id="restore-form-{{ $user->id }}" action="{{ route('users.restore', ['user' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>No banned users found.</p>
            @endif
        </section>
    </div>
</x-layout>