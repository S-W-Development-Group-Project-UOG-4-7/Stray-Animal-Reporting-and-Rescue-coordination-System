@extends('layouts.app')

@section('title', 'Join Our Team')

@section('content')

<div class="max-w-3xl mx-auto">
  
  <div class="text-center mb-10">
    <h1 class="text-4xl font-extrabold text-white">Join the Mission</h1>
    <p class="mt-3 text-slate-400">Apply to become a verified Veterinarian, Rescue Member, or Volunteer.</p>
  </div>

  <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-8">
    
    <form method="POST" action="{{ route('roles.store') }}" class="space-y-8">
      @csrf

      <div>
        <label class="block text-sm font-bold text-indigo-300 uppercase tracking-wider mb-2">1. Select Role</label>
        <select name="role_type" id="roleType" onchange="toggleVetField()"
                class="w-full rounded-xl bg-black/40 border border-white/20 px-4 py-3 text-xl text-white outline-none focus:ring-2 focus:ring-indigo-500/50 transition cursor-pointer">
          <option value="Volunteer">Volunteer</option>
          <option value="Rescue Team">Rescue Team Member</option>
          <option value="Veterinarian">Veterinarian</option>
        </select>

        <div id="vetField" class="hidden mt-4 animate-in fade-in slide-in-from-top-2 duration-300">
          <div class="rounded-xl bg-indigo-500/10 border border-indigo-500/30 p-5">
            <label class="block text-sm font-bold text-indigo-200 mb-1">Veterinary License / ID</label>
            <input name="vet_id" type="text" placeholder="e.g. VET-SL-88392"
                   class="w-full rounded-xl bg-black/30 border border-white/10 px-4 py-3 text-white outline-none focus:ring-2 focus:ring-indigo-400">
          </div>
        </div>
      </div>

      <div>
        <h3 class="text-sm font-bold text-indigo-300 uppercase tracking-wider mb-4 border-b border-white/10 pb-2">2. Personal Details</h3>
        <div class="grid gap-5 md:grid-cols-2">
          <div>
            <label class="block text-sm text-slate-300 mb-1">Full Name</label>
            <input name="full_name" value="{{ old('full_name') }}" required
                   class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
          </div>
          <div>
            <label class="block text-sm text-slate-300 mb-1">NIC Number</label>
            <input name="nic" value="{{ old('nic') }}" required
                   class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
          </div>
          <div>
            <label class="block text-sm text-slate-300 mb-1">Email</label>
            <input name="email" type="email" value="{{ old('email') }}" required
                   class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
          </div>
          <div>
            <label class="block text-sm text-slate-300 mb-1">Phone</label>
            <input name="phone" value="{{ old('phone') }}" required
                   class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
          </div>
        </div>
        <div class="mt-4">
          <label class="block text-sm text-slate-300 mb-1">Address</label>
          <input name="address" value="{{ old('address') }}" required
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
        </div>
      </div>

      <div>
        <h3 class="text-sm font-bold text-indigo-300 uppercase tracking-wider mb-4 border-b border-white/10 pb-2">3. Account Setup</h3>
        <p class="text-xs text-slate-400 mb-4">If approved, these credentials will be used to create your account.</p>
        
        <div class="grid gap-5 md:grid-cols-2">
          <div>
            <label class="block text-sm text-slate-300 mb-1">Desired Username</label>
            <div class="relative">
              <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
              <input name="username" value="{{ old('username') }}" required
                     class="w-full rounded-xl bg-white/10 border border-white/10 pl-10 pr-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
            </div>
            @error('username') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
          </div>

          <div>
            <label class="block text-sm text-slate-300 mb-1">Desired Password</label>
            <div class="relative">
              <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
              <input name="password" type="password" required
                     class="w-full rounded-xl bg-white/10 border border-white/10 pl-10 pr-4 py-3 text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50">
            </div>
            @error('password') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
          </div>
        </div>
      </div>

      <button type="submit" 
              class="w-full rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 px-6 py-4 font-bold text-white shadow-lg shadow-indigo-500/20 transition transform hover:scale-[1.01]">
        Submit Application
      </button>

    </form>
  </div>
</div>

<script>
  function toggleVetField() {
    const roleSelect = document.getElementById('roleType');
    const vetField = document.getElementById('vetField');
    if (roleSelect.value === 'Veterinarian') {
      vetField.classList.remove('hidden');
    } else {
      vetField.classList.add('hidden');
    }
  }
</script>

@endsection