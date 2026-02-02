@extends('admin.layouts.app')

@section('title', 'Add Veterinarian')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white">Add New Veterinarian</h2>
    <a href="{{ route('admin.veterinarians.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Vets
    </a>
</div>

<div class="bg-[#0b2447] rounded-xl p-8">
    <form action="{{ route('admin.veterinarians.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Vet Name <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('name') border-red-500 @enderror" required>
                @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Clinic Name <span class="text-red-400">*</span></label>
                <input type="text" name="clinic" value="{{ old('clinic') }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('clinic') border-red-500 @enderror" required>
                @error('clinic') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Phone Number <span class="text-red-400">*</span></label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('phone') border-red-500 @enderror" required>
                @error('phone') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Status <span class="text-red-400">*</span></label>
                <select name="status" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-[#0ea5e9] text-white px-8 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                <i class="fas fa-save mr-2"></i> Save Veterinarian
            </button>
            <a href="{{ route('admin.veterinarians.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
