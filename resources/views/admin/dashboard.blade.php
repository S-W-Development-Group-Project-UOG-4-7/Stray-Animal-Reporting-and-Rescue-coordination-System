@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-bold text-white mb-2">Admin Dashboard</h2>
    <p class="text-gray-400">Overview of SafePaws platform statistics</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-users text-3xl text-indigo-400 mb-2"></i>
        <p class="text-3xl font-bold text-white">{{ $stats['total_users'] }}</p>
        <p class="text-sm text-gray-400">Total Users</p>
    </div>
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-paw text-3xl text-green-400 mb-2"></i>
        <p class="text-3xl font-bold text-white">{{ $stats['total_animals'] }}</p>
        <p class="text-sm text-gray-400">Animals</p>
    </div>
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-file-alt text-3xl text-blue-400 mb-2"></i>
        <p class="text-3xl font-bold text-white">{{ $stats['total_reports'] + $stats['total_animal_reports'] }}</p>
        <p class="text-sm text-gray-400">Total Reports</p>
    </div>
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-hand-holding-heart text-3xl text-pink-400 mb-2"></i>
        <p class="text-3xl font-bold text-white">Rs. {{ number_format($stats['total_donations'], 2) }}</p>
        <p class="text-sm text-gray-400">Total Donations</p>
    </div>
</div>

<!-- Content Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Recent Users -->
    <div class="bg-[#0b2447] rounded-xl p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Recent Users</h2>
        @foreach($recentUsers as $user)
        <div class="border-b border-white/10 py-3 last:border-0 flex justify-between items-center">
            <div>
                <p class="font-medium text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-400">{{ $user->email }}</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#0ea5e9]/20 text-[#0ea5e9]">{{ $user->role }}</span>
        </div>
        @endforeach
    </div>

    <!-- Quick Links -->
    <div class="bg-[#0b2447] rounded-xl p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Quick Links</h2>
        <div class="space-y-3">
            <a href="{{ route('admin.users.create') }}" class="block p-3 bg-white/5 rounded-lg hover:bg-white/10 text-gray-300 hover:text-white transition">
                <i class="fas fa-user-plus mr-2 text-[#0ea5e9]"></i>Add New User
            </a>
            <a href="{{ route('admin.reports.create') }}" class="block p-3 bg-white/5 rounded-lg hover:bg-white/10 text-gray-300 hover:text-white transition">
                <i class="fas fa-plus-circle mr-2 text-[#0ea5e9]"></i>Create Report
            </a>
            <a href="{{ route('admin.products.create') }}" class="block p-3 bg-white/5 rounded-lg hover:bg-white/10 text-gray-300 hover:text-white transition">
                <i class="fas fa-box mr-2 text-[#0ea5e9]"></i>Add Product
            </a>
            <a href="{{ route('admin.veterinarians.create') }}" class="block p-3 bg-white/5 rounded-lg hover:bg-white/10 text-gray-300 hover:text-white transition">
                <i class="fas fa-stethoscope mr-2 text-[#0ea5e9]"></i>Add Veterinarian
            </a>
            <a href="{{ route('admin.role-requests.index') }}" class="block p-3 bg-white/5 rounded-lg hover:bg-white/10 text-gray-300 hover:text-white transition">
                <i class="fas fa-user-check mr-2 text-[#0ea5e9]"></i>Manage Role Requests ({{ $stats['pending_adoptions'] }} pending)
            </a>
            <a href="{{ route('admin.donations.index') }}" class="block p-3 bg-white/5 rounded-lg hover:bg-white/10 text-gray-300 hover:text-white transition">
                <i class="fas fa-donate mr-2 text-[#0ea5e9]"></i>View Donations
            </a>
        </div>
    </div>
</div>
@endsection
