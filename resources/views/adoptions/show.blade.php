@extends('layouts.app')

@section('title', $animal->name)

@section('content')
  <div class="grid gap-6 lg:grid-cols-2">

    <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft h-fit">
      <div class="relative">
        <img class="w-full object-cover aspect-4/3"
             src="{{ $animal->image_url ?? 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=1200&q=60' }}"
             alt="{{ $animal->name }}">
        <div class="absolute inset-0 bg-linear-to-t from-black/60 via-black/10 to-transparent"></div>

        <div class="absolute bottom-4 left-4 right-4">
          <div class="flex items-end justify-between gap-3">
            <div>
              <h1 class="text-4xl font-extrabold text-white">{{ $animal->name }}</h1>
              <p class="text-slate-200 mt-1">{{ $animal->breed ?? 'Unknown breed' }} • {{ $animal->age ?? '?' }} yrs</p>
            </div>
            <span class="rounded-full bg-emerald-500/15 border border-emerald-500/25 px-4 py-2 text-sm text-emerald-100 font-bold backdrop-blur-md">
              {{ $animal->status }}
            </span>
          </div>
        </div>
      </div>

      <div class="p-6 space-y-4">
        <p class="text-slate-300 leading-relaxed">{{ $animal->description ?? 'No description provided.' }}</p>
        
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-2xl bg-black/20 p-3 border border-white/5">
                <p class="text-xs text-slate-400 uppercase">Condition</p>
                <p class="text-indigo-200 font-semibold">{{ $animal->condition ?? 'N/A' }}</p>
            </div>
            <div class="rounded-2xl bg-black/20 p-3 border border-white/5">
                <p class="text-xs text-slate-400 uppercase">Rescue Team</p>
                <p class="text-fuchsia-200 font-semibold">{{ $animal->rescue_team ?? 'General' }}</p>
            </div>
        </div>
      </div>
    </div>

    <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6 md:p-8">
      <div class="flex items-center gap-4 mb-6 border-b border-white/10 pb-6">
        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-indigo-500/20 to-fuchsia-500/20 border border-white/10">
          <i class="fa-solid fa-paw text-xl text-pink-200"></i>
        </span>
        <div>
          <h2 class="text-2xl font-extrabold text-white">Adoption Application</h2>
          <p class="text-slate-400 text-sm">Complete the details below to apply.</p>
        </div>
      </div>

      <form method="POST" action="/adoptions/{{ $animal->id }}/request" class="space-y-5">
        @csrf

        <div class="space-y-4">
          <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest">1. Contact Information</h3>
          
          <div class="grid gap-4 md:grid-cols-2">
            <div>
              <label class="block text-sm text-slate-300 mb-1">Full Name</label>
              <input name="full_name" value="{{ old('full_name') }}" required
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition">
            </div>
            <div>
              <label class="block text-sm text-slate-300 mb-1">Phone</label>
              <input name="phone" value="{{ old('phone') }}"
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition">
            </div>
          </div>

          <div>
            <label class="block text-sm text-slate-300 mb-1">Email Address</label>
            <input name="email" type="email" value="{{ old('email') }}" required
                  class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition">
          </div>

          <div>
            <label class="block text-sm text-slate-300 mb-1">Home Address</label>
            <input name="address" value="{{ old('address') }}" required placeholder="Street, City, Province"
                  class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition">
          </div>
        </div>

        <div class="space-y-4 pt-2">
          <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest">2. Household Details</h3>

          <div>
            <label class="block text-sm text-slate-300 mb-1">Housing Type</label>
            <select name="housing_type" class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-300 outline-none focus:ring-2 focus:ring-indigo-500/50">
              <option value="House" class="text-black">House</option>
              <option value="Apartment" class="text-black">Apartment</option>
              <option value="Condo" class="text-black">Condo</option>
              <option value="Other" class="text-black">Other</option>
            </select>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3 hover:bg-white/10 transition">
              <input type="checkbox" name="has_fenced_yard" class="h-5 w-5 rounded border-gray-600 bg-black/30 text-indigo-500 focus:ring-indigo-500">
              <span class="text-sm text-slate-300">Fenced Yard</span>
            </label>

            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3 hover:bg-white/10 transition">
              <input type="checkbox" name="has_other_pets" class="h-5 w-5 rounded border-gray-600 bg-black/30 text-indigo-500 focus:ring-indigo-500">
              <span class="text-sm text-slate-300">Other Pets</span>
            </label>

            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3 hover:bg-white/10 transition">
              <input type="checkbox" name="has_children" class="h-5 w-5 rounded border-gray-600 bg-black/30 text-indigo-500 focus:ring-indigo-500">
              <span class="text-sm text-slate-300">Children</span>
            </label>
          </div>
        </div>

        <div class="pt-2">
          <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest mb-3">3. Motivation</h3>
          <label class="block text-sm text-slate-300 mb-1">Why do you want to adopt {{ $animal->name }}?</label>
          <textarea name="reason" rows="3" required
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50">{{ old('reason') }}</textarea>
        </div>

        <button type="submit" 
           class="w-full mt-4 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 hover:from-emerald-400 hover:to-cyan-500 px-6 py-4 font-bold text-white shadow-lg shadow-cyan-500/20 transition transform hover:scale-[1.02]">
          <i class="fa-solid fa-paper-plane mr-2"></i> Submit Application
        </button>
      </form>
    </div>

  </div>
@endsection