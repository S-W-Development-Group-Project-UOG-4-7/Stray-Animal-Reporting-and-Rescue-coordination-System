@extends('layouts.app')

@section('page_title', 'Treatment Details')
@section('page_subtitle', 'View treatment info, updates and history')

@section('content')

<div class="max-w-5xl space-y-6">

    <div class="bg-slate-900/50 border border-white/5 rounded-2xl p-6">
        <h1 class="text-xl font-bold text-white mb-2">
            {{ $treatment->pet?->name ?? 'N/A' }}
        </h1>

        <div class="grid sm:grid-cols-2 gap-4 text-sm text-slate-300">
            <div>
                <span class="text-slate-500">Owner:</span>
                {{ $treatment->pet?->owner?->name ?? '-' }}
            </div>

            <div>
                <span class="text-slate-500">Status:</span>
                <span class="px-2 py-1 rounded-lg text-xs font-semibold
                    {{ $treatment->status === 'ongoing' ? 'bg-sky-500/10 text-sky-400 border border-sky-500/20' : 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' }}">
                    {{ ucfirst($treatment->status) }}
                </span>
            </div>

            <div>
                <span class="text-slate-500">Started:</span>
                {{ optional($treatment->started_at)->format('d M Y') ?? '-' }}
            </div>

            <div>
                <span class="text-slate-500">Notes:</span>
                {{ $treatment->notes ?? '-' }}
            </div>
        </div>
    </div>

    {{-- Updates --}}
    <div class="bg-slate-900/50 border border-white/5 rounded-2xl p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Treatment Updates</h2>

        @forelse($treatment->updates as $update)
            <div class="p-4 rounded-xl bg-slate-800/40 border border-white/5 mb-3">
                <div class="text-sm text-white font-semibold">
                    {{ ucfirst($update->status) }}
                </div>
                <div class="text-xs text-slate-500">
                    {{ $update->created_at->format('d M Y, h:i A') }}
                </div>
                <div class="mt-2 text-sm text-slate-300">
                    {{ $update->notes ?? '-' }}
                </div>
            </div>
        @empty
            <div class="text-slate-500 text-sm">No updates yet.</div>
        @endforelse
    </div>

    {{-- Back --}}
    <div>
        <a href="{{ route('vet.treatments.index') }}"
           class="px-4 py-2 rounded-lg bg-slate-700/40 hover:bg-slate-600 text-white text-sm font-semibold transition">
            ← Back to Treatments
        </a>
    </div>

</div>

@endsection
