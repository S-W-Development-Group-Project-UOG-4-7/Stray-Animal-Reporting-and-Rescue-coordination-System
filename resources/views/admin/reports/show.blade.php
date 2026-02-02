@extends('admin.layouts.app')

@section('title', 'Report Details')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white">Report Details: {{ $report->report_id }}</h2>
    <a href="{{ route('admin.reports.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Reports
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: Details -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-[#0b2447] rounded-xl p-8">
            <h3 class="text-xl font-semibold text-white mb-6 border-b border-gray-700 pb-2">Animal Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Status</label>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-500/20 text-blue-300 inline-block">
                        {{ ucfirst($report->status) }}
                    </span>
                </div>
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Animal Type</label>
                    <p class="text-white text-lg">{{ $report->animal_type }}</p>
                </div>
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Location</label>
                    <p class="text-white text-lg">{{ $report->location }}</p>
                </div>
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Last Seen</label>
                    <p class="text-white text-lg">{{ $report->last_seen ? $report->last_seen->format('M d, Y h:i A') : 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-6">
                <label class="text-gray-400 text-sm block mb-1">Description</label>
                <div class="bg-[#071331] rounded-lg p-4 text-gray-300">
                    {{ $report->description }}
                </div>
            </div>
        </div>

        <div class="bg-[#0b2447] rounded-xl p-8">
            <h3 class="text-xl font-semibold text-white mb-6 border-b border-gray-700 pb-2">Reporter Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Name</label>
                    <p class="text-white">{{ $report->contact_name ?? 'Anonymous' }}</p>
                </div>
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Phone</label>
                    <p class="text-white">{{ $report->contact_phone ?? 'N/A' }}</p>
                </div>
                <div>
                    <label class="text-gray-400 text-sm block mb-1">Email</label>
                    <p class="text-white">{{ $report->contact_email ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Photo -->
    <div class="lg:col-span-1">
        <div class="bg-[#0b2447] rounded-xl p-8 sticky top-6">
            <h3 class="text-xl font-semibold text-white mb-6 border-b border-gray-700 pb-2">Animal Photo</h3>
            <div class="bg-[#071331] rounded-lg overflow-hidden border border-gray-700 aspect-square flex items-center justify-center">
                @if($report->animal_photo)
                    <img src="{{ asset($report->animal_photo) }}" alt="Animal Photo" class="w-full h-full object-cover">
                @else
                    <div class="text-center text-gray-500">
                        <i class="fas fa-image text-4xl mb-2"></i>
                        <p>No photo available</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
