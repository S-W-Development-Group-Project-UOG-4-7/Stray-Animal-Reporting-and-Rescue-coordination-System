<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style type="text/tailwindcss">
        .nav-link {
            @apply flex items-center gap-3 px-4 py-3 text-gray-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300;
        }
        .nav-link.active {
            @apply bg-[#0ea5e9]/20 text-[#0ea5e9] border-l-4 border-[#0ea5e9];
        }
    </style>
</head>
<body class="bg-[#071331] min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#0b2447]/80 backdrop-blur-sm border-r border-white/10">
            <div class="p-6 border-b border-white/10">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#0ea5e9] rounded-xl flex items-center justify-center">
                        <i class="fas fa-paw text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">SafePaws</h1>
                        <p class="text-xs text-gray-400">Admin Dashboard</p>
                    </div>
                </a>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ url('/reports') }}" class="nav-link">
                    <i class="fas fa-flag"></i> Animal Reports
                </a>
                <a href="{{ url('/rescues') }}" class="nav-link">
                    <i class="fas fa-ambulance"></i> Rescue Operations
                </a>
                <a href="{{ url('/adoptions') }}" class="nav-link">
                    <i class="fas fa-home"></i> Adoptions
                </a>
                <a href="{{ url('/users_management') }}" class="nav-link active">
                    <i class="fas fa-users-cog"></i> Users Management
                </a>
                <a href="{{ url('/veterinarians') }}" class="nav-link">
                    <i class="fas fa-stethoscope"></i> Vet Collaborators
                </a>
                <a href="{{ url('/products') }}" class="nav-link">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="{{ url('/donations') }}" class="nav-link">
                    <i class="fas fa-donate"></i> Donations
                </a>
                <a href="{{ url('/ecommerce') }}" class="nav-link">
                    <i class="fas fa-shopping-cart"></i> E-commerce
                </a>
                <a href="{{ url('/analytics') }}" class="nav-link">
                    <i class="fas fa-chart-bar"></i> Analytics
                </a>
                <a href="{{ url('/settings') }}" class="nav-link">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Users & Teams Management</h2>
                <a href="{{ route('users_management.create') }}" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Add New User
                </a>
            </div>

            @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-6">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
            @endif

            <!-- Filters -->
            <div class="bg-[#0b2447] rounded-xl p-6 mb-6">
                <form method="GET" action="{{ route('users_management.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="text-gray-300 text-sm mb-2 block">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..." class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                    </div>
                    <div>
                        <label class="text-gray-300 text-sm mb-2 block">Role</label>
                        <select name="role" class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                            <option value="">All Roles</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="vet" {{ request('role') == 'vet' ? 'selected' : '' }}>Veterinarian</option>
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
                    <thead class="bg-[#1e3a5f]">
                        <tr>
                            <th class="px-6 py-4 text-left text-gray-300 font-semibold">Name</th>
                            <th class="px-6 py-4 text-left text-gray-300 font-semibold">Email</th>
                            <th class="px-6 py-4 text-left text-gray-300 font-semibold">Role</th>
                            <th class="px-6 py-4 text-left text-gray-300 font-semibold">Phone</th>
                            <th class="px-6 py-4 text-left text-gray-300 font-semibold">NIC</th>
                            <th class="px-6 py-4 text-left text-gray-300 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($users as $user)
                        <tr class="hover:bg-[#1e3a5f] transition">
                            <td class="px-6 py-4 text-white font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs
                                    @if($user->role == 'admin') bg-purple-500/20 text-purple-300
                                    @elseif($user->role == 'vet') bg-blue-500/20 text-blue-300
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
                                    <a href="{{ route('users_management.edit', $user) }}" class="text-[#0ea5e9] hover:text-[#0284c7]">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users_management.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
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
                                <i class="fas fa-users-slash text-4xl mb-3"></i>
                                <p>No users found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </main>
    </div>
</body>
</html>
