@extends('admin.layouts.app')

@section('title', 'Donations Management')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-bold text-white mb-2">Donations Management</h2>
    <p class="text-gray-400">Track and manage all donations</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-hand-holding-heart text-3xl text-pink-500 mb-2"></i>
        <p class="text-3xl font-bold text-white">Rs. {{ number_format($stats['total_amount'], 2) }}</p>
        <p class="text-sm text-gray-400">Total Donations</p>
    </div>
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-receipt text-3xl text-blue-500 mb-2"></i>
        <p class="text-3xl font-bold text-white">{{ $stats['total_count'] }}</p>
        <p class="text-sm text-gray-400">Total Transactions</p>
    </div>
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-clock text-3xl text-yellow-500 mb-2"></i>
        <p class="text-3xl font-bold text-white">{{ $stats['pending_count'] }}</p>
        <p class="text-sm text-gray-400">Pending</p>
    </div>
    <div class="bg-[#0b2447] rounded-xl p-5 text-center">
        <i class="fas fa-check-circle text-3xl text-green-500 mb-2"></i>
        <p class="text-3xl font-bold text-white">{{ $stats['confirmed_count'] }}</p>
        <p class="text-sm text-gray-400">Confirmed</p>
    </div>
</div>

<!-- Search/Filter -->
<div class="bg-[#0b2447] rounded-xl p-6 mb-8">
    <form method="GET" action="{{ route('admin.donations.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="text-gray-300 text-sm mb-2 block">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email..." class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
        </div>
        <div>
            <label class="text-gray-300 text-sm mb-2 block">Status</label>
            <select name="status" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="flex items-end">
            <button type="submit" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
        </div>
    </form>
</div>

<!-- Donations Table -->
<div class="bg-[#0b2447] rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#071331]">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Donor</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Amount</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Method</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Date</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($donations as $donation)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4">
                    <div class="text-white font-medium">{{ $donation->anonymous ? 'Anonymous' : ($donation->donor_name ?? 'N/A') }}</div>
                    <div class="text-gray-400 text-sm">{{ $donation->donor_email ?? '' }}</div>
                </td>
                <td class="px-6 py-4 text-[#0ea5e9] font-bold">Rs. {{ number_format($donation->amount, 2) }}</td>
                <td class="px-6 py-4 text-gray-300">{{ ucfirst($donation->payment_method ?? 'N/A') }}</td>
                <td class="px-6 py-4">
                    @php
                        $statusColors = [
                            'pending' => 'bg-yellow-500/20 text-yellow-300',
                            'confirmed' => 'bg-green-500/20 text-green-300',
                            'cancelled' => 'bg-red-500/20 text-red-300',
                        ];
                        $color = $statusColors[$donation->status] ?? 'bg-gray-500/20 text-gray-300';
                    @endphp
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">
                        {{ ucfirst($donation->status ?? 'pending') }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-400 text-sm">{{ $donation->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4">
                    @if(($donation->status ?? 'pending') === 'pending')
                    <form method="POST" action="{{ route('admin.donations.updateStatus', $donation->id) }}" class="inline">
                        @csrf
                        <input type="hidden" name="status" value="confirmed">
                        <button type="submit" class="text-green-400 hover:text-green-300 mr-2" title="Confirm">
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.donations.updateStatus', $donation->id) }}" class="inline">
                        @csrf
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" class="text-red-400 hover:text-red-300" title="Cancel">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </form>
                    @else
                    <span class="text-gray-500 text-sm">-</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center">
                    <i class="fas fa-donate text-5xl text-gray-600 mb-4"></i>
                    <p class="text-white text-lg font-semibold">No Donations Found</p>
                    <p class="text-gray-400">Donations will appear here once received.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $donations->links() }}
</div>
@endsection
