@extends('layouts.app')

@section('title', 'Edit Adoption Request')

@section('content')
<div class="max-w-3xl mx-auto">
  <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-8">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-white">Edit Application</h2>
      <span class="text-xs font-mono text-slate-400">ID: #{{ $request->id }}</span>
    </div>

    <form method="POST" action="/adoption-requests/{{ $request->id }}" class="space-y-5">
      @csrf
      @method('PUT') <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="block text-sm text-slate-300 mb-1">Full Name</label>
          <input name="full_name" value="{{ old('full_name', $request->full_name) }}" required
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
          <label class="block text-sm text-slate-300 mb-1">Phone</label>
          <input name="phone" value="{{ old('phone', $request->phone) }}"
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
        </div>
      </div>

      <div>
        <label class="block text-sm text-slate-300 mb-1">Email</label>
        <input name="email" value="{{ old('email', $request->email) }}" required
               class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
      </div>

      <div>
        <label class="block text-sm text-slate-300 mb-1">Address</label>
        <input name="address" value="{{ old('address', $request->address) }}" required
               class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
      </div>

      <div class="pt-4 border-t border-white/10">
        <label class="block text-sm text-slate-300 mb-2">Housing Type</label>
        <select name="housing_type" class="w-full rounded-xl bg-black/40 border border-white/10 px-4 py-2 text-slate-200">
          <option value="House" @selected($request->housing_type == 'House')>House</option>
          <option value="Apartment" @selected($request->housing_type == 'Apartment')>Apartment</option>
          <option value="Condo" @selected($request->housing_type == 'Condo')>Condo</option>
        </select>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <label class="flex items-center gap-3 p-3 rounded-xl border border-white/10 bg-black/20">
          <input type="checkbox" name="has_fenced_yard" @checked($request->has_fenced_yard)>
          <span class="text-sm text-slate-300">Fenced Yard</span>
        </label>
        <label class="flex items-center gap-3 p-3 rounded-xl border border-white/10 bg-black/20">
          <input type="checkbox" name="has_other_pets" @checked($request->has_other_pets)>
          <span class="text-sm text-slate-300">Other Pets</span>
        </label>
        <label class="flex items-center gap-3 p-3 rounded-xl border border-white/10 bg-black/20">
          <input type="checkbox" name="has_children" @checked($request->has_children)>
          <span class="text-sm text-slate-300">Children</span>
        </label>
      </div>

      <div>
        <label class="block text-sm text-slate-300 mb-1">Reason</label>
        <textarea name="reason" rows="3" required class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200">{{ old('reason', $request->reason) }}</textarea>
      </div>

      <div class="flex gap-4 pt-4">
        <a href="/my-requests" class="px-6 py-3 rounded-xl border border-white/10 text-slate-300 hover:bg-white/10">Cancel</a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-500 shadow-lg shadow-indigo-500/20">Update Request</button>
      </div>
    </form>
  </div>
</div>
@endsection