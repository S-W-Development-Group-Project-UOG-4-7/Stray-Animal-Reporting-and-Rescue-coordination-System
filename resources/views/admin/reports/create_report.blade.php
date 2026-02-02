@extends('admin.layouts.app')

@section('title', 'Create Report')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white">Create Report</h2>
    <a href="{{ route('admin.reports.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Reports
    </a>
</div>

<div class="bg-[#0b2447] rounded-xl p-8">
    <form method="POST" action="{{ route('admin.reports.store') }}">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Animal Type <span class="text-red-400">*</span></label>
                <select name="animal_type" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('animal_type') border-red-500 @enderror" required>
                    <option value="" disabled selected>Select Animal Type</option>
                    <option value="Aggressive" {{ old('animal_type') == 'Aggressive' ? 'selected' : '' }}>Aggressive</option>
                    <option value="Sick/Injured" {{ old('animal_type') == 'Sick/Injured' ? 'selected' : '' }}>Sick/Injured</option>
                    <option value="Stray/Lost" {{ old('animal_type') == 'Stray/Lost' ? 'selected' : '' }}>Stray/Lost</option>
                    <option value="Abandoned" {{ old('animal_type') == 'Abandoned' ? 'selected' : '' }}>Abandoned</option>
                </select>
                @error('animal_type') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Location <span class="text-red-400">*</span></label>
                <input type="text" name="location" value="{{ old('location') }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('location') border-red-500 @enderror" required>
                @error('location') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Description <span class="text-red-400">*</span></label>
                <textarea name="description" rows="6" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                @error('description') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-[#0ea5e9] text-white px-8 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                <i class="fas fa-save mr-2"></i> Submit Report
            </button>
            <a href="{{ route('admin.reports.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
