@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Reports</h1>

    {{-- Create Report Button --}}
    <a href="{{ route('admin.reports.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Create Report
    </a>

    {{-- Reports Table --}}
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Title</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Created At</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports ?? [] as $report)
                <tr>
                    <td class="px-4 py-2 border">{{ $report->id }}</td>
                    <td class="px-4 py-2 border">{{ $report->title }}</td>
                    <td class="px-4 py-2 border">{{ $report->status }}</td>
                    <td class="px-4 py-2 border">{{ $report->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('admin.reports.show', $report->id) }}" class="text-blue-500">View</a>
                        |
                        <a href="{{ route('admin.reports.edit', $report->id) }}" class="text-yellow-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                        No reports found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
