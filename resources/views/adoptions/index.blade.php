@extends('layouts.app')

@section('title', 'Adoptions')

@section('content')

  <!-- Hero -->
  <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft">
    <div class="absolute inset-0 bg-linear-to-r from-indigo-500/15 via-fuchsia-500/10 to-cyan-500/15"></div>

    <div class="relative p-7 md:p-10">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
          <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-black/25 px-4 py-2 text-sm text-slate-200">
            <i class="fa-solid fa-shield-dog text-emerald-300"></i>
            <span>Verified rescues • Safe adoption</span>
          </div>

          <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-tight">
            Find your next best friend
          </h1>

          <p class="mt-3 max-w-2xl text-slate-300">
            Search, filter, and explore adoptable animals. Submit an adoption request in seconds.
          </p>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div class="rounded-2xl border border-white/10 bg-black/25 px-5 py-4">
            <p class="text-xs text-slate-400">Total shown</p>
            <p class="text-2xl font-bold">{{ $animals->total() }}</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-black/25 px-5 py-4">
            <p class="text-xs text-slate-400">Status</p>
            <p class="text-2xl font-bold text-emerald-200">Adoptable</p>
          </div>
        </div>
      </div>

      <!-- Filters -->
      <form class="mt-7 grid gap-3 md:grid-cols-4" method="GET">
        <div class="md:col-span-2">
          <div class="relative">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input name="search" value="{{ request('search') }}"
              class="w-full rounded-2xl bg-white/10 border border-white/10 px-11 py-3 outline-none focus:ring-2 focus:ring-fuchsia-400/60"
              placeholder="Search by name, breed, condition...">
          </div>
        </div>

        <select name="breed"
          class="w-full rounded-2xl bg-white/5 border border-white/10 px-4 py-3 focus:ring-2 focus:ring-indigo-400/60 text-black">
          <option value="">All breeds</option>
          @foreach ($breeds as $b)
            <option value="{{ $b }}"  @selected(request('breed')==$b)>{{ $b }}</option>
          @endforeach
        </select>

        <div class="flex gap-3">
          <select name="sort"
            class="w-full rounded-2xl bg-white/5 border border-white/10 px-4 py-3 focus:ring-2 focus:ring-indigo-400/60 text-black">
            <option value="new" @selected(request('sort')=='new')>Newest</option>
            <option value="age_asc" @selected(request('sort')=='age_asc')>Age ↑</option>
            <option value="age_desc" @selected(request('sort')=='age_desc')>Age ↓</option>
          </select>

          <button class="shrink-0 rounded-2xl bg-linear-to-r from-indigo-500 to-fuchsia-500 hover:from-indigo-400 hover:to-fuchsia-400 px-5 py-3 font-semibold shadow-soft transition">
            Apply
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Cards -->
  <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($animals as $a)
      <a href="/adoptions/{{ $a->id }}"
         class="group relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft transition hover:-translate-y-1">
        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition bg-linear-to-r from-indigo-500/10 via-fuchsia-500/10 to-cyan-500/10"></div>

        <div class="relative">
          <div class="aspect-4/3 bg-black/30 overflow-hidden">
            <img class="h-full w-full object-cover group-hover:scale-[1.05] transition duration-500"
                 src="{{ $a->image_url ?? 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=900&q=60' }}"
                 alt="{{ $a->name }}">
          </div>

          <div class="p-5">
            <div class="flex items-start justify-between gap-3">
              <div>
                <h2 class="text-xl font-extrabold">{{ $a->name }}</h2>
                <p class="text-slate-300 mt-1">
                  {{ $a->breed ?? 'Unknown breed' }} • {{ $a->age ?? '?' }} yrs
                </p>
              </div>

              <span class="text-xs rounded-full bg-emerald-500/15 border border-emerald-500/25 px-3 py-1 text-emerald-100">
                Adoptable
              </span>
            </div>

            <div class="mt-4 grid gap-2 text-sm text-slate-300">
              <p class="flex items-center gap-2">
                <i class="fa-solid fa-stethoscope text-cyan-200"></i>
                <span class="text-slate-400">Condition:</span> {{ $a->condition ?? '—' }}
              </p>
              <p class="flex items-center gap-2">
                <i class="fa-solid fa-people-group text-fuchsia-200"></i>
                <span class="text-slate-400">Rescue team:</span> {{ $a->rescue_team ?? '—' }}
              </p>
            </div>

            <div class="mt-5 flex items-center justify-between">
              <span class="text-xs text-slate-400">Tap for details</span>
              <span class="inline-flex items-center gap-2 font-semibold text-pink-200">
                Adopt <i class="fa-solid fa-arrow-right"></i>
              </span>
            </div>
          </div>
        </div>
      </a>
    @empty
      <div class="rounded-2xl border border-white/10 bg-white/5 p-7 text-slate-300">
        No animals found.
      </div>
    @endforelse
  </div>

  <div class="mt-8">{{ $animals->links() }}</div>

@endsection
