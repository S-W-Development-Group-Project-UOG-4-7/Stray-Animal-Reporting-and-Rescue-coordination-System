@extends('layouts.app')

@section('page_title', 'My Treatments')
@section('page_subtitle', 'Assigned cases & treatment updates')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Ongoing Treatments</h1>
</div>

<div class="bg-slate-900/50 border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-800/50">
            <tr class="text-xs text-slate-400 uppercase">
                <th class="px-6 py-4">Pet</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Started</th>
                <th class="px-6 py-4 text-right">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5 text-sm">
            @forelse($treatments as $treatment)
                <tr>
                    <td class="px-6 py-4 text-white font-medium">{{ $treatment->pet?->name }}</td>
                    <td class="px-6 py-4 text-slate-300">{{ ucfirst($treatment->status) }}</td>
                    <td class="px-6 py-4 text-slate-400">{{ optional($treatment->started_at)->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('vet.treatments.show', $treatment) }}" class="text-sky-400 hover:text-white">
                            View & Update
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-6 text-center text-slate-500">No treatments assigned.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="p-4 border-t border-white/5">
        {{ $treatments->links() }}
    </div>
</div>

@endsection
