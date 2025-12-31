@extends('layouts.app')

@section('title', 'My Requests')

@section('content')

  <div class="mb-10">
    <h1 class="text-4xl font-extrabold text-white">My Dashboard</h1>
    <p class="mt-2 text-slate-400">Track and manage your applications.</p>
  </div>

  <div class="mb-12">
    <h2 class="text-2xl font-bold text-indigo-200 mb-6 border-l-4 border-indigo-500 pl-3">Adoption Applications</h2>
    
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($adoptionRequests as $request)
        @php
          $statusColor = match($request->status) {
              'Approved' => 'text-emerald-400 border-emerald-500/30 bg-emerald-500/10',
              'Rejected' => 'text-red-400 border-red-500/30 bg-red-500/10',
              default    => 'text-amber-300 border-amber-500/30 bg-amber-500/10',
          };
        @endphp

        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft flex flex-col h-full">
          <div class="relative h-40 overflow-hidden bg-black/50">
            <img src="{{ $request->animal->image_url ?? '' }}" 
                 class="h-full w-full object-cover opacity-80 hover:scale-110 transition duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>
            <div class="absolute bottom-3 left-4">
              <h3 class="text-xl font-bold text-white">{{ $request->animal->name ?? 'Unknown' }}</h3>
              <p class="text-xs text-slate-400">#{{ $request->id }}</p>
            </div>
          </div>

          <div class="p-5 flex-1 flex flex-col justify-between">
            <div>
              <div class="mb-3 flex items-center justify-between rounded-xl border {{ $statusColor }} px-3 py-2">
                <span class="text-xs font-bold uppercase">Status</span>
                <span class="font-bold text-sm">{{ $request->status }}</span>
              </div>
              <p class="text-xs text-slate-400">Submitted: {{ $request->created_at->format('M d, Y') }}</p>
            </div>

            @if($request->status === 'Pending')
            <div class="mt-5 pt-4 border-t border-white/10 flex gap-2">
              <a href="/adoption-requests/{{ $request->id }}/edit" 
                 class="flex-1 text-center py-2 rounded-lg bg-indigo-500/10 text-indigo-300 text-sm font-semibold hover:bg-indigo-500/20 transition">
                 <i class="fa-solid fa-pen mr-1"></i> Edit
              </a>

              <form action="/adoption-requests/{{ $request->id }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this request?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full py-2 rounded-lg bg-red-500/10 text-red-400 text-sm font-semibold hover:bg-red-500/20 transition">
                  <i class="fa-solid fa-trash mr-1"></i> Delete
                </button>
              </form>
            </div>
            @endif
          </div>
        </div>
      @empty
        <div class="col-span-full py-8 text-center border border-dashed border-white/10 rounded-2xl">
          <p class="text-slate-500">No adoption requests found.</p>
        </div>
      @endforelse
    </div>
  </div>

  <div>
    <h2 class="text-2xl font-bold text-fuchsia-200 mb-6 border-l-4 border-fuchsia-500 pl-3">Role Applications</h2>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($roleRequests as $role)
        @php
          $roleStatusColor = match($role->status) {
              'Approved' => 'text-emerald-400 border-emerald-500/30 bg-emerald-500/10',
              'Rejected' => 'text-red-400 border-red-500/30 bg-red-500/10',
              default    => 'text-amber-300 border-amber-500/30 bg-amber-500/10',
          };
        @endphp

        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6 flex flex-col h-full">
          <div class="flex items-center justify-between mb-4">
            <div class="h-10 w-10 rounded-full bg-fuchsia-500/20 flex items-center justify-center text-fuchsia-300">
              <i class="fa-solid fa-id-badge"></i>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $roleStatusColor }}">
              {{ $role->status }}
            </span>
          </div>

          <div class="flex-1">
            <h3 class="text-lg font-bold text-white mb-1">{{ $role->role_type }}</h3>
            <p class="text-sm text-slate-400">User: <span class="text-white">{{ $role->username }}</span></p>
            <p class="text-xs text-slate-500 mt-2">Applied: {{ $role->created_at->format('M d, Y') }}</p>
          </div>

          @if($role->status === 'Pending')
          <div class="mt-5 pt-4 border-t border-white/10 flex gap-2">
            <a href="/role-requests/{{ $role->id }}/edit" 
               class="flex-1 text-center py-2 rounded-lg bg-indigo-500/10 text-indigo-300 text-sm font-semibold hover:bg-indigo-500/20 transition">
               <i class="fa-solid fa-pen mr-1"></i> Edit
            </a>

            <form action="/role-requests/{{ $role->id }}" method="POST" class="flex-1" onsubmit="return confirm('Cancel this application?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="w-full py-2 rounded-lg bg-red-500/10 text-red-400 text-sm font-semibold hover:bg-red-500/20 transition">
                <i class="fa-solid fa-trash mr-1"></i> Cancel
              </button>
            </form>
          </div>
          @endif
        </div>
      @empty
        <div class="col-span-full py-8 text-center border border-dashed border-white/10 rounded-2xl">
          <p class="text-slate-500">No role applications found.</p>
        </div>
      @endforelse
    </div>
  </div>

@endsection