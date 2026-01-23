@extends('layouts.app')

@section('title', 'My Requests')

@section('content')

  <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
      <h1 class="text-4xl font-extrabold text-white">My Dashboard</h1>
      <p class="mt-2 text-slate-400">Track and manage your applications.</p>
    </div>
  </div>

  <div class="mb-12">
    <h2 class="text-2xl font-bold text-indigo-200 mb-6 border-l-4 border-indigo-500 pl-3">Adoption Applications</h2>
    
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @forelse ($adoptionRequests as $req) @php
          $statusColor = match($req->status) {
              'Approved' => 'text-emerald-400 border-emerald-500/30 bg-emerald-500/10',
              'Rejected' => 'text-red-400 border-red-500/30 bg-red-500/10',
              default    => 'text-amber-300 border-amber-500/30 bg-amber-500/10',
          };
        @endphp

        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft flex flex-col h-full group transition hover:-translate-y-1">
          <div class="relative h-48 overflow-hidden bg-black/50">
            <img src="{{ $req->animal->image_url ?? '' }}" 
                 class="h-full w-full object-cover opacity-80 group-hover:scale-110 transition duration-700"
                 alt="{{ $req->animal->name ?? 'Pet' }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>
            <div class="absolute bottom-3 left-4">
              <h3 class="text-xl font-bold text-white">{{ $req->animal->name ?? 'Unknown' }}</h3>
              <p class="text-xs text-slate-400">Request #{{ $req->id }}</p>
            </div>
          </div>

          <div class="p-5 flex-1 flex flex-col justify-between">
            <div>
              <div class="mb-4 flex items-center justify-between rounded-xl border {{ $statusColor }} px-3 py-2">
                <span class="text-xs font-bold uppercase tracking-wider">Status</span>
                <span class="font-bold text-sm">{{ $req->status }}</span>
              </div>
              <p class="text-xs text-slate-400 mb-1">Submitted: {{ $req->created_at->format('M d, Y') }}</p>
            </div>

            <div class="mt-5 pt-4 border-t border-white/10 flex flex-col gap-2">
              
              {{-- SCENARIO 1: Request is Pending (Edit/Delete) --}}
              @if($req->status === 'Pending')
                <div class="flex gap-2">
                  <a href="/adoption-requests/{{ $req->id }}/edit" 
                     class="flex-1 text-center py-2 rounded-lg bg-indigo-500/10 text-indigo-300 text-sm font-semibold hover:bg-indigo-500/20 transition">
                     <i class="fa-solid fa-pen mr-1"></i> Edit
                  </a>
                  <form action="/adoption-requests/{{ $req->id }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this request?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-2 rounded-lg bg-red-500/10 text-red-400 text-sm font-semibold hover:bg-red-500/20 transition">
                      <i class="fa-solid fa-trash mr-1"></i> Delete
                    </button>
                  </form>
                </div>

                {{-- TEMPORARY TEST BUTTON: SIMULATE ADMIN APPROVAL --}}
                {{-- REMOVE THIS IN PRODUCTION --}}
                <form action="/admin/approve/{{ $req->id }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full text-[10px] uppercase font-bold tracking-widest bg-emerald-900/50 text-emerald-200 px-2 py-1 rounded border border-emerald-500/20 hover:bg-emerald-800/50">
                        [Test] Admin Approve
                    </button>
                </form>

              {{-- SCENARIO 2: Approved but NOT reviewed yet --}}
              @elseif($req->status === 'Approved' && !$req->review)
                <a href="/reviews/write/{{ $req->id }}" 
                   class="w-full block text-center py-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 text-white font-bold shadow-lg shadow-orange-500/20 hover:scale-[1.02] transition">
                   <i class="fa-solid fa-star mr-2"></i> Write a Review
                </a>

              {{-- SCENARIO 3: Approved AND Reviewed --}}
              @elseif($req->status === 'Approved' && $req->review)
                <div class="w-full py-2 text-center text-emerald-400 text-sm font-semibold bg-emerald-500/10 rounded-lg border border-emerald-500/20">
                   <i class="fa-solid fa-check-circle"></i> Review Submitted
                </div>

              {{-- SCENARIO 4: Rejected --}}
              @elseif($req->status === 'Rejected')
                <p class="text-xs text-red-400 text-center italic mt-1">Application declined.</p>
              @endif

            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full py-12 text-center border border-dashed border-white/10 rounded-3xl bg-white/5">
          <i class="fa-solid fa-paw text-3xl text-slate-600 mb-3"></i>
          <p class="text-slate-400">No adoption requests found.</p>
          <a href="/adoptions" class="inline-block mt-3 text-indigo-400 hover:text-indigo-300 text-sm underline">Find a pet to adopt</a>
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

        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6 flex flex-col h-full hover:bg-white/10 transition">
          <div class="flex items-center justify-between mb-4">
            <div class="h-12 w-12 rounded-full bg-fuchsia-500/20 flex items-center justify-center text-fuchsia-300 text-xl border border-fuchsia-500/20">
              <i class="fa-solid fa-id-card"></i>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $roleStatusColor }}">
              {{ $role->status }}
            </span>
          </div>

          <div class="flex-1">
            <h3 class="text-lg font-bold text-white mb-1">{{ $role->role_type }}</h3>
            <p class="text-sm text-slate-400">Requested User: <span class="text-white font-mono">{{ $role->username }}</span></p>
            <p class="text-xs text-slate-500 mt-2">Applied: {{ $role->created_at->format('M d, Y') }}</p>
          </div>

          @if($role->status === 'Pending')
          <div class="mt-5 pt-4 border-t border-white/10 flex gap-2">
            <a href="/role-requests/{{ $role->id }}/edit" 
               class="flex-1 text-center py-2 rounded-lg bg-indigo-500/10 text-indigo-300 text-sm font-semibold hover:bg-indigo-500/20 transition">
               <i class="fa-solid fa-pen mr-1"></i> Edit
            </a>

            <form action="/role-requests/{{ $role->id }}" method="POST" class="flex-1" onsubmit="return confirm('Cancel this application?');">
              @csrf @method('DELETE')
              <button type="submit" class="w-full py-2 rounded-lg bg-red-500/10 text-red-400 text-sm font-semibold hover:bg-red-500/20 transition">
                <i class="fa-solid fa-trash mr-1"></i> Cancel
              </button>
            </form>
          </div>
          @endif
        </div>
      @empty
        <div class="col-span-full py-12 text-center border border-dashed border-white/10 rounded-3xl bg-white/5">
          <i class="fa-solid fa-user-plus text-3xl text-slate-600 mb-3"></i>
          <p class="text-slate-400">No role applications found.</p>
          <a href="/join-us" class="inline-block mt-3 text-fuchsia-400 hover:text-fuchsia-300 text-sm underline">Apply to join us</a>
        </div>
      @endforelse
    </div>
  </div>

@endsection