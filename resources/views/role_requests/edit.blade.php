@extends('layouts.app')

@section('title', 'Edit Role Application')

@section('content')
<div class="max-w-3xl mx-auto">
  <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-8">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-white">Edit Role Application</h2>
      <span class="text-xs font-mono text-slate-400">ID: #{{ $roleRequest->id }}</span>
    </div>

    <div class="mb-6 p-4 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-200 text-sm">
      <i class="fa-solid fa-circle-info mr-2"></i> You are editing your application for: <strong>{{ $roleRequest->role_type }}</strong>. 
      (Username and Role cannot be changed here).
    </div>

    <form method="POST" action="/role-requests/{{ $roleRequest->id }}" class="space-y-5">
      @csrf
      @method('PUT')

      <div class="grid gap-4 md:grid-cols-2">
        <div>
          <label class="block text-sm text-slate-300 mb-1">Full Name</label>
          <input name="full_name" value="{{ old('full_name', $roleRequest->full_name) }}" required
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
          <label class="block text-sm text-slate-300 mb-1">NIC</label>
          <input name="nic" value="{{ old('nic', $roleRequest->nic) }}" required
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
          <label class="block text-sm text-slate-300 mb-1">Email</label>
          <input name="email" value="{{ old('email', $roleRequest->email) }}" required
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
          <label class="block text-sm text-slate-300 mb-1">Phone</label>
          <input name="phone" value="{{ old('phone', $roleRequest->phone) }}" required
                 class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
        </div>
      </div>

      <div>
        <label class="block text-sm text-slate-300 mb-1">Address</label>
        <input name="address" value="{{ old('address', $roleRequest->address) }}" required
               class="w-full rounded-xl bg-white/10 border border-white/10 px-4 py-2 text-slate-200 focus:ring-2 focus:ring-indigo-500">
      </div>

      <div class="flex gap-4 pt-4">
        <a href="/my-requests" class="px-6 py-3 rounded-xl border border-white/10 text-slate-300 hover:bg-white/10">Cancel</a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-fuchsia-600 text-white font-bold hover:bg-fuchsia-500 shadow-lg shadow-fuchsia-500/20">Update Application</button>
      </div>
    </form>
  </div>
</div>
@endsection