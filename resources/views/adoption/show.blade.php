@extends('layouts.app')

@section('title', $animal->name)

@section('content')
  <div class="grid gap-6 lg:grid-cols-2">

    <!-- Animal Card -->
    <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft">
      <div class="relative">
        <img class="w-full object-cover aspect-4/3"
             src="{{ $animal->image_url ?? 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=1200&q=60' }}"
             alt="{{ $animal->name }}">
        <div class="absolute inset-0 bg-linear-to-t from-black/60 via-black/10 to-transparent"></div>

        <div class="absolute bottom-4 left-4 right-4">
          <div class="flex items-end justify-between gap-3">
            <div>
              <h1 class="text-4xl font-extrabold">{{ $animal->name }}</h1>
              <p class="text-slate-200 mt-1">{{ $animal->breed ?? 'Unknown breed' }} • {{ $animal->age ?? '?' }} yrs</p>
            </div>

            <span class="rounded-full bg-emerald-500/15 border border-emerald-500/25 px-4 py-2 text-sm text-emerald-100">
              {{ $animal->status }}
            </span>
          </div>
        </div>
      </div>

      <div class="p-6">
        <div class="grid gap-3 text-slate-200">
          <p class="flex items-center gap-3">
            <span class="grid h-10 w-10 place-items-center rounded-2xl bg-cyan-500/10 border border-cyan-500/20">
              <i class="fa-solid fa-stethoscope text-cyan-200"></i>
            </span>
            <span><span class="text-slate-400">Condition:</span> {{ $animal->condition ?? '—' }}</span>
          </p>

          <p class="flex items-center gap-3">
            <span class="grid h-10 w-10 place-items-center rounded-2xl bg-fuchsia-500/10 border border-fuchsia-500/20">
              <i class="fa-solid fa-people-group text-fuchsia-200"></i>
            </span>
            <span><span class="text-slate-400">Rescue Team:</span> {{ $animal->rescue_team ?? '—' }}</span>
          </p>
        </div>

        <div class="mt-6 rounded-2xl border border-white/10 bg-black/25 p-4 text-sm text-slate-300">
          <i class="fa-solid fa-circle-info text-indigo-200"></i>
          <span class="ml-2">Please submit accurate details. Our team will contact you after review.</span>
        </div>
      </div>
    </div>

    <!-- Request Form -->
    <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 place-items-center rounded-2xl bg-linear-to-r from-indigo-500/20 to-fuchsia-500/20 border border-white/10">
          <i class="fa-solid fa-heart text-pink-200"></i>
        </span>
        <div>
          <h2 class="text-2xl font-extrabold">Adoption Request</h2>
          <p class="text-slate-300 text-sm">Status will be <b>Pending</b> until admin approval.</p>
        </div>
      </div>

      <form method="POST" action="/adoptions/{{ $animal->id }}/request" class="mt-6 space-y-4">
        @csrf

        <div>
          <label class="text-sm text-slate-300">Full name</label>
          <input name="full_name" value="{{ old('full_name') }}"
                 class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-fuchsia-400/60">
          @error('full_name') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="text-sm text-slate-300">Email</label>
          <input name="email" value="{{ old('email') }}"
                 class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-fuchsia-400/60">
          @error('email') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="text-sm text-slate-300">Phone (optional)</label>
          <input name="phone" value="{{ old('phone') }}"
                 class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-fuchsia-400/60">
          @error('phone') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="text-sm text-slate-300">Reason for adoption</label>
          <textarea name="reason" rows="5"
            class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-fuchsia-400/60">{{ old('reason') }}</textarea>
          @error('reason') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button class="w-full rounded-2xl bg-linear-to-r from-emerald-500 to-cyan-500 hover:from-emerald-400 hover:to-cyan-400 px-5 py-3 font-extrabold shadow-soft transition">
          <i class="fa-solid fa-paper-plane"></i>
          <span class="ml-2">Submit Request</span>
        </button>
      </form>
    </div>

  </div>
@endsection
