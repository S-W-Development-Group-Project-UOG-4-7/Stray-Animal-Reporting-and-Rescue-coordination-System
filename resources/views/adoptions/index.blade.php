@extends('layouts.app')

@section('title', 'Find a Friend')

@section('content')

  <div class="relative mb-12 text-center pt-8">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-rose-500/30 bg-rose-500/10 text-rose-300 text-xs font-bold uppercase tracking-wider mb-4">
      <span class="relative flex h-2 w-2">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span>
      </span>
      Live Adoptions
    </div>
    
    <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight mb-4">
      Make a <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-400 to-orange-400">Friend.</span><br>
      Save a <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-teal-400">Life.</span>
    </h1>
    <p class="text-lg text-slate-400 max-w-2xl mx-auto">
      Thousands of homeless pets are waiting for a hero like you. Filter below to find your perfect match.
    </p>
  </div>

  <div class="sticky top-24 z-40 mb-10 mx-auto max-w-4xl">
    <form class="grid grid-cols-2 md:grid-cols-12 gap-2 p-2 rounded-3xl bg-black/40 backdrop-blur-xl border border-white/10 shadow-2xl" method="GET">
      
      <div class="col-span-2 md:col-span-5 relative group">
        <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-rose-400 transition"></i>
        <input name="search" value="{{ request('search') }}" placeholder="Search names..." 
               class="w-full bg-white/5 border-transparent rounded-2xl py-3 pl-10 pr-4 text-white focus:bg-white/10 focus:ring-0 placeholder-slate-500 transition">
      </div>

      <div class="col-span-1 md:col-span-2">
        <select name="type" class="w-full bg-white/5 border-transparent rounded-2xl py-3 px-4 text-slate-300 focus:bg-white/10 focus:text-white cursor-pointer outline-none">
          <option value="">Type</option>
          <option value="Dog" @selected(request('type')=='Dog')>Dogs</option>
          <option value="Cat" @selected(request('type')=='Cat')>Cats</option>
        </select>
      </div>

      <div class="col-span-1 md:col-span-2">
        <select name="gender" class="w-full bg-white/5 border-transparent rounded-2xl py-3 px-4 text-slate-300 focus:bg-white/10 focus:text-white cursor-pointer outline-none">
          <option value="">Gender</option>
          <option value="Male" @selected(request('gender')=='Male')>Male</option>
          <option value="Female" @selected(request('gender')=='Female')>Female</option>
        </select>
      </div>

      <div class="col-span-2 md:col-span-3">
        <button class="w-full h-full bg-gradient-to-r from-rose-600 to-orange-600 hover:from-rose-500 hover:to-orange-500 text-white font-bold rounded-2xl py-3 transition shadow-lg shadow-rose-500/25">
          Find Pet
        </button>
      </div>
    </form>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 items-stretch">
    @forelse ($animals as $a)
      
      <div class="group relative flex flex-col h-full bg-white/5 rounded-[2rem] border border-white/5 hover:border-white/10 transition duration-500 hover:-translate-y-2 hover:shadow-soft overflow-hidden">
        
        <a href="/adoptions/{{ $a->id }}" class="relative w-full aspect-[4/3] overflow-hidden">
          <img src="{{ $a->image_url }}" alt="{{ $a->name }}" 
               class="h-full w-full object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1">
          <div class="absolute inset-0 bg-gradient-to-t from-[#0B1120] via-transparent to-transparent opacity-80"></div>
          
          <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-md border border-white/10 px-3 py-1 rounded-full text-xs font-bold text-white">
            {{ $a->age }} yrs
          </div>
        </a>

        <div class="flex flex-col flex-1 p-6 -mt-10 relative z-10">
          
          <div class="flex justify-between items-end mb-2">
            <h2 class="text-3xl font-black text-white tracking-tight group-hover:text-rose-400 transition">{{ $a->name }}</h2>
            <div class="flex gap-2">
               @if($a->gender == 'Male') 
                 <span class="h-8 w-8 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center border border-blue-500/20"><i class="fa-solid fa-mars"></i></span>
               @else 
                 <span class="h-8 w-8 rounded-full bg-pink-500/20 text-pink-400 flex items-center justify-center border border-pink-500/20"><i class="fa-solid fa-venus"></i></span>
               @endif
            </div>
          </div>

          <p class="text-slate-400 text-sm font-medium mb-4">{{ $a->breed }}</p>

          <div class="flex-1"></div>

          <div class="grid grid-cols-2 gap-3 mt-4">
             <a href="/adoptions/{{ $a->id }}" class="py-3 rounded-2xl bg-white/5 text-center text-slate-300 text-sm font-bold hover:bg-white/10 hover:text-white transition">
               View Details
             </a>
             <a href="/donate/{{ $a->id }}" class="py-3 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 text-center text-white text-sm font-bold shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 transition">
               Donate
             </a>
          </div>

        </div>
      </div>

    @empty
      <div class="col-span-full py-20 text-center">
        <div class="inline-block p-6 rounded-full bg-white/5 mb-4 text-slate-600 text-4xl"><i class="fa-solid fa-wind"></i></div>
        <h3 class="text-2xl font-bold text-slate-300">It's quiet here...</h3>
        <p class="text-slate-500">No pets match your search right now.</p>
        <a href="/adoptions" class="inline-block mt-4 text-rose-400 hover:text-rose-300 font-bold">Clear Filters</a>
      </div>
    @endforelse
  </div>

  <div class="mt-12 flex justify-center">
    {{ $animals->links() }}
  </div>

@endsection