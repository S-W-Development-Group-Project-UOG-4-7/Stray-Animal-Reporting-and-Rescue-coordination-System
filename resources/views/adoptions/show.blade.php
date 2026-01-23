@extends('layouts.app')

@section('title', $animal->name)

@section('content')
  <div class="grid gap-6 lg:grid-cols-2">

    <div class="overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft h-fit sticky top-24">
      <div class="relative">
        <img class="w-full object-cover aspect-4/3"
             src="{{ $animal->image_url ?? 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=1200&q=60' }}"
             alt="{{ $animal->name }}">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>

        <div class="absolute bottom-6 left-6 right-6">
          <div class="flex items-end justify-between gap-3">
            <div>
              <h1 class="text-4xl font-extrabold text-white">{{ $animal->name }}</h1>
              <div class="flex items-center gap-2 mt-2 text-slate-200 font-medium">
                @if($animal->type == 'Cat') <i class="fa-solid fa-cat text-pink-300"></i>
                @else <i class="fa-solid fa-dog text-blue-300"></i> @endif
                <span>{{ $animal->breed }}</span>
                <span class="text-slate-500">•</span>
                <span>{{ $animal->age }} yrs</span>
                <span class="text-slate-500">•</span>
                <span>{{ $animal->gender }}</span>
              </div>
            </div>
            <span class="rounded-full bg-emerald-500/20 border border-emerald-500/30 px-4 py-2 text-sm text-emerald-300 font-bold backdrop-blur-md">
              {{ $animal->status }}
            </span>
          </div>
        </div>
      </div>

      <div class="p-8 space-y-6">
        <div>
           <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">About {{ $animal->name }}</h3>
           <p class="text-slate-300 leading-relaxed text-lg">
             {{ $animal->description ?? 'This lovely animal is looking for a forever home. They are vaccinated, friendly, and ready to meet you!' }}
           </p>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-2xl bg-black/20 p-4 border border-white/5">
                <p class="text-xs text-slate-400 uppercase mb-1">Health Condition</p>
                <div class="flex items-center gap-2 text-indigo-200 font-semibold">
                   <i class="fa-solid fa-heart-pulse"></i> {{ $animal->condition ?? 'Healthy' }}
                </div>
            </div>
            <div class="rounded-2xl bg-black/20 p-4 border border-white/5">
                <p class="text-xs text-slate-400 uppercase mb-1">Rescue Team</p>
                <div class="flex items-center gap-2 text-fuchsia-200 font-semibold">
                   <i class="fa-solid fa-user-nurse"></i> {{ $animal->rescue_team ?? 'General' }}
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6 md:p-8">
      <div class="flex items-center gap-4 mb-8 border-b border-white/10 pb-6">
        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br from-indigo-500/20 to-fuchsia-500/20 border border-white/10 shadow-inner">
          <i class="fa-solid fa-file-signature text-2xl text-white"></i>
        </span>
        <div>
          <h2 class="text-2xl font-extrabold text-white">Adoption Application</h2>
          <p class="text-slate-400 text-sm">Fill out the details below to apply for {{ $animal->name }}.</p>
        </div>
      </div>

      <form method="POST" action="/adoptions/{{ $animal->id }}/request" class="space-y-6">
        @csrf

        <div class="space-y-5">
          <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest flex items-center gap-2">
            <span class="h-px flex-1 bg-white/10"></span> 1. Contact Details <span class="h-px flex-1 bg-white/10"></span>
          </h3>
          
          <div class="grid gap-5 md:grid-cols-2">
            <div>
              <label class="block text-sm text-slate-300 mb-1">Full Name</label>
              <input name="full_name" value="{{ old('full_name') }}" required
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
              @error('full_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
              <label class="block text-sm text-slate-300 mb-1">NIC Number</label>
              <input name="nic" value="{{ old('nic') }}" required placeholder="e.g. 2001xxxxxxx"
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
              @error('nic') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
          </div>

          <div class="grid gap-5 md:grid-cols-2">
             <div>
              <label class="block text-sm text-slate-300 mb-1">Email Address</label>
              <input name="email" type="email" value="{{ old('email') }}" required
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
              @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm text-slate-300 mb-1">Phone Number</label>
              <input name="phone" value="{{ old('phone') }}" required placeholder="07XXXXXXXX"
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
              <p class="text-[11px] text-slate-500 mt-1">Format: 071XXXXXXX (10 digits)</p>
              @error('phone') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
          </div>

          <div>
            <label class="block text-sm text-slate-300 mb-1">Home Address</label>
            <input name="address" value="{{ old('address') }}" required placeholder="Street, City, District"
                  class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
            @error('address') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
          </div>
        </div>

        <div class="space-y-5 pt-4">
          <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest flex items-center gap-2">
            <span class="h-px flex-1 bg-white/10"></span> 2. Household <span class="h-px flex-1 bg-white/10"></span>
          </h3>

          <div>
            <label class="block text-sm text-slate-300 mb-1">Housing Type</label>
            <select name="housing_type" class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-300 outline-none focus:ring-2 focus:ring-indigo-500/50 cursor-pointer">
              <option value="House" class="text-black">House with Garden</option>
              <option value="Apartment" class="text-black">Apartment / Flat</option>
              <option value="Condo" class="text-black">Condo</option>
              <option value="Rented" class="text-black">Rented Room/Annex</option>
            </select>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-white/10 bg-black/20 p-3 hover:bg-white/5 transition">
              <input type="checkbox" name="has_fenced_yard" class="h-5 w-5 rounded border-gray-600 bg-black/30 text-indigo-500 focus:ring-indigo-500">
              <span class="text-sm text-slate-300">Fenced Yard</span>
            </label>

            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-white/10 bg-black/20 p-3 hover:bg-white/5 transition">
              <input type="checkbox" name="has_other_pets" class="h-5 w-5 rounded border-gray-600 bg-black/30 text-indigo-500 focus:ring-indigo-500">
              <span class="text-sm text-slate-300">Other Pets</span>
            </label>

            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-white/10 bg-black/20 p-3 hover:bg-white/5 transition">
              <input type="checkbox" name="has_children" class="h-5 w-5 rounded border-gray-600 bg-black/30 text-indigo-500 focus:ring-indigo-500">
              <span class="text-sm text-slate-300">Children</span>
            </label>
          </div>
        </div>

        <div class="pt-4">
          <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest mb-3">3. Motivation</h3>
          <label class="block text-sm text-slate-300 mb-1">Why do you want to adopt {{ $animal->name }}?</label>
          <textarea name="reason" rows="3" required
                    class="w-full rounded-xl bg-black/20 border border-white/10 px-4 py-3 text-slate-100 outline-none focus:ring-2 focus:ring-indigo-500/50">{{ old('reason') }}</textarea>
          @error('reason') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 space-y-3 bg-indigo-900/10 p-4 rounded-2xl border border-indigo-500/10">
            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="age_confirmation" required 
                       class="mt-1 h-5 w-5 rounded border-gray-600 bg-black/30 text-emerald-500 focus:ring-emerald-500">
                <span class="text-sm text-slate-300">
                    I confirm that I am <span class="font-bold text-white">over 18 years old</span>.
                </span>
            </label>
            @error('age_confirmation') <p class="text-red-400 text-xs ml-8">{{ $message }}</p> @enderror

            <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="terms_confirmation" required
                       class="mt-1 h-5 w-5 rounded border-gray-600 bg-black/30 text-emerald-500 focus:ring-emerald-500">
                <span class="text-sm text-slate-300">
                    I agree to the <a href="#" class="text-indigo-400 underline hover:text-indigo-300">Terms & Conditions</a> regarding pet adoption and care responsibilities.
                </span>
            </label>
            @error('terms_confirmation') <p class="text-red-400 text-xs ml-8">{{ $message }}</p> @enderror
        </div>

        <button type="submit" 
           class="w-full mt-2 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 px-6 py-4 font-bold text-white shadow-lg shadow-emerald-500/20 transition transform hover:scale-[1.01]">
          <i class="fa-solid fa-paper-plane mr-2"></i> Submit Application
        </button>
      </form>
    </div>

  </div>
@endsection