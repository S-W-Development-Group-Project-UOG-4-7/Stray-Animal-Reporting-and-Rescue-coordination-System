@extends('admin.layouts.app')

@section('title', 'Role Requests')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-bold text-white mb-2">Role Requests</h2>
    <p class="text-gray-400">Review and manage user role change requests</p>
</div>

<!-- Role Requests Table -->
<div class="bg-[#0b2447] rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#071331]">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Email</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Requested Role</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($roleRequests as $rr)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4 text-white font-medium">{{ $rr->full_name }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $rr->email }}</td>
                <td class="px-6 py-4 text-gray-300">{{ ucfirst(str_replace('_', ' ', $rr->role_type)) }}</td>
                <td class="px-6 py-4">
                    @php
                        $statusColors = [
                            'Approved' => 'bg-green-500/20 text-green-300',
                            'Rejected' => 'bg-red-500/20 text-red-300',
                            'Pending' => 'bg-yellow-500/20 text-yellow-300',
                        ];
                        $color = $statusColors[$rr->status] ?? 'bg-gray-500/20 text-gray-300';
                    @endphp
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">{{ $rr->status }}</span>
                </td>
                <td class="px-6 py-4 space-x-2">
                    @if($rr->status === 'Pending')
                    <form method="POST" action="{{ route('admin.role-requests.approve', $rr->id) }}" class="inline">
                        @csrf
                        <button class="text-green-400 hover:text-green-300 text-sm"><i class="fas fa-check mr-1"></i>Approve</button>
                    </form>
                    <form method="POST" action="{{ route('admin.role-requests.reject', $rr->id) }}" class="inline">
                        @csrf
                        <button class="text-red-400 hover:text-red-300 text-sm"><i class="fas fa-times mr-1"></i>Reject</button>
                    </form>
                    @else
                    <span class="text-gray-500 text-sm">-</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                    <i class="fas fa-user-check text-4xl mb-3 block"></i>
                    <p>No role requests</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $roleRequests->links() }}
</div>
@endsection
