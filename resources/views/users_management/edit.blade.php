<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - SafePaws</title>
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
                <h2 class="text-3xl font-bold text-white">Edit User</h2>
                <a href="{{ route('users_management.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Users
                </a>
            </div>

            <div class="bg-[#0b2447] rounded-xl p-8">
                <form action="{{ route('users_management.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Full Name <span class="text-red-400">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Email <span class="text-red-400">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('email') border-red-500 @enderror" required>
                            @error('email')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Password</label>
                            <input type="password" name="password" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('password') border-red-500 @enderror">
                            <p class="text-gray-400 text-xs mt-1">Leave blank to keep current password</p>
                            @error('password')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Role <span class="text-red-400">*</span></label>
                            <select name="role" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('role') border-red-500 @enderror" required>
                                <option value="">Select Role</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="vet" {{ old('role', $user->role) == 'vet' ? 'selected' : '' }}>Veterinarian</option>
                                <option value="rescue_team" {{ old('role', $user->role) == 'rescue_team' ? 'selected' : '' }}>Rescue Team</option>
                                <option value="general_user" {{ old('role', $user->role) == 'general_user' ? 'selected' : '' }}>General User</option>
                            </select>
                            @error('role')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIC -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">NIC</label>
                            <input type="text" name="nic" value="{{ old('nic', $user->nic) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('nic') border-red-500 @enderror">
                            @error('nic')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mt-6">
                        <label class="text-gray-300 text-sm mb-2 block">Address</label>
                        <textarea name="address" rows="3" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('address') border-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex space-x-4">
                        <button type="submit" class="bg-[#0ea5e9] text-white px-8 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Update User
                        </button>
                        <a href="{{ route('users_management.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
