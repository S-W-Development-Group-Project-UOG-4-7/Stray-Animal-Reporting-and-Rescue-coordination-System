@extends('admin.layouts.app')

@section('title', 'Vet Collaborators')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-bold text-white">Vet Collaborators</h2>
        <p class="text-gray-400">Manage veterinary partners & clinics</p>
    </div>
    <a href="{{ route('admin.veterinarians.create') }}" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Add New Vet
    </a>
</div>

<!-- Vets Table -->
<div class="bg-[#0b2447] rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#071331]">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Clinic</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Phone</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-400 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($vets as $vet)
            <tr class="hover:bg-white/5 transition">
                <td class="px-6 py-4 text-white font-medium">{{ $vet->name }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $vet->clinic }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $vet->phone }}</td>
                <td class="px-6 py-4">
                    @if($vet->status == 'Active')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-500/20 text-green-300">{{ $vet->status }}</span>
                    @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-500/20 text-red-300">{{ $vet->status }}</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.veterinarians.destroy', $vet->id) }}" method="POST" onsubmit="return confirm('Delete this vet?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                    <i class="fas fa-stethoscope text-4xl mb-3 block"></i>
                    <p>No veterinarians found</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
