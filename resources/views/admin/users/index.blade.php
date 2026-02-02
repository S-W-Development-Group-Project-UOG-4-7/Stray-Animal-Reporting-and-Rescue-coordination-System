@extends('admin.layouts.app')

@section('title', 'Users Management')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-bold text-white">Users & Teams Management</h2>
        <p class="text-gray-400">Manage users, roles, and team assignments</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Add New User
    </a>
</div>

<!-- Filters -->
<div class="bg-[#0b2447] rounded-xl p-6 mb-6">
    <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="text-gray-300 text-sm mb-2 block">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..." class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
        </div>
        <div>
            <label class="text-gray-300 text-sm mb-2 block">Role</label>
            <select name="role" class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                <option value="">All Roles</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="veterinarian" {{ request('role') == 'veterinarian' ? 'selected' : '' }}>Veterinarian</option>
                <option value="rescue_team" {{ request('role') == 'rescue_team' ? 'selected' : '' }}>Rescue Team</option>
                <option value="general_user" {{ request('role') == 'general_user' ? 'selected' : '' }}>General User</option>
            </select>
        </div>
        <div class="flex items-end">
            <button type="submit" class="w-full bg-[#0ea5e9] text-white px-4 py-2 rounded-lg hover:bg-[#0284c7] transition">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
        </div>
    </form>
</div>

<!-- Users Table -->
<div class="bg-[#0b2447] rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#071331]">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Email</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Role</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Phone</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">NIC</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($users as $user)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4 text-white font-medium">{{ $user->name }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($user->role == 'admin') bg-purple-500/20 text-purple-300
                        @elseif($user->role == 'veterinarian') bg-blue-500/20 text-blue-300
                        @elseif($user->role == 'rescue_team') bg-green-500/20 text-green-300
                        @else bg-gray-500/20 text-gray-300
                        @endif">
                        {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-300">{{ $user->phone ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $user->nic ?? 'N/A' }}</td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-[#0ea5e9] hover:text-[#0284c7]">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                    <i class="fas fa-users-slash text-4xl mb-3 block"></i>
                    <p>No users found</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $users->links() }}
</div>
@endsection
