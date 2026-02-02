@extends('admin.layouts.app')

@section('title', 'Reports')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-bold text-white">Reports</h2>
        <p class="text-gray-400">View and manage animal reports</p>
    </div>
    <a href="{{ route('admin.reports.create') }}" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Create Report
    </a>
</div>

<div class="bg-[#0b2447] rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#071331]">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Report ID</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Animal Type</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Created At</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse ($reports as $report)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4 text-gray-300">{{ $report->report_id }}</td>
                <td class="px-6 py-4 text-white font-medium">{{ $report->animal_type }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-300">{{ ucfirst($report->status) }}</span>
                </td>
                <td class="px-6 py-4 text-gray-400 text-sm">{{ $report->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.reports.show', $report->id) }}" class="text-[#0ea5e9] hover:text-[#0284c7]"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                    <i class="fas fa-file-alt text-4xl mb-3 block"></i>
                    <p>No reports found.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
