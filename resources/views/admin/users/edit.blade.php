@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white">Edit User</h2>
    <a href="{{ route('admin.users.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Users
    </a>
</div>

<div class="bg-[#0b2447] rounded-xl p-8">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Full Name <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('name') border-red-500 @enderror" required>
                @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Email <span class="text-red-400">*</span></label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('email') border-red-500 @enderror" required>
                @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Password</label>
                <input type="password" name="password" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                <p class="text-gray-400 text-xs mt-1">Leave blank to keep current password</p>
                @error('password') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Role <span class="text-red-400">*</span></label>
                <select name="role" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none" required>
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="veterinarian" {{ old('role', $user->role) == 'veterinarian' ? 'selected' : '' }}>Veterinarian</option>
                    <option value="rescue_team" {{ old('role', $user->role) == 'rescue_team' ? 'selected' : '' }}>Rescue Team</option>
                    <option value="general_user" {{ old('role', $user->role) == 'general_user' ? 'selected' : '' }}>General User</option>
                </select>
                @error('role') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">NIC</label>
                <input type="text" name="nic" value="{{ old('nic', $user->nic) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
            </div>
        </div>
        <div class="mt-6">
            <label class="text-gray-300 text-sm mb-2 block">Address</label>
            <textarea name="address" rows="3" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">{{ old('address', $user->address) }}</textarea>
        </div>
        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-[#0ea5e9] text-white px-8 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                <i class="fas fa-save mr-2"></i> Update User
            </button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
