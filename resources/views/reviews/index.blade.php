@extends('layouts.app')

@section('title', 'Community Reviews')

@section('content')
  <div class="text-center mb-10">
    <h1 class="text-4xl font-extrabold text-white">Happy Tails</h1>
    <p class="mt-2 text-slate-400">Real stories from our happy adopters.</p>
  </div>

  <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    @forelse($reviews as $review)
      <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-6 shadow-soft hover:-translate-y-1 transition duration-300">
        
        <div class="flex items-start gap-4 mb-4 border-b border-white/5 pb-4">
            
            <div class="relative h-14 w-14 shrink-0 overflow-hidden rounded-xl border border-white/10 bg-black/30">
                <img src="{{ $review->animal->image_url ?? 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=150&q=80' }}" 
                     class="h-full w-full object-cover" 
                     alt="Pet">
            </div>

            <div class="flex-1 min-w-0">
                <h4 class="font-bold text-white text-sm truncate">{{ $review->reviewer_name }}</h4>
                <p class="text-xs text-slate-400 truncate">
                    Adopted <span class="text-indigo-300">{{ $review->animal->name ?? 'a pet' }}</span>
                </p>
                <div class="text-amber-400 text-xs mt-1">
                    @for($i=0; $i < 5; $i++)
                        @if($i < $review->rating) <i class="fa-solid fa-star"></i>
                        @else <i class="fa-regular fa-star opacity-30"></i>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <div class="relative">
            <i class="fa-solid fa-quote-left absolute -top-1 -left-1 text-2xl text-white/5"></i>
            <p class="text-slate-300 text-sm leading-relaxed pl-4 relative z-10">
                "{{ $review->comment }}"
            </p>
        </div>
        
        <div class="mt-4 text-[10px] text-slate-500 text-right uppercase tracking-wider font-bold">
          {{ $review->created_at->format('M d, Y') }}
        </div>

      </div>
    @empty
      <div class="col-span-full text-center py-12 rounded-3xl border border-dashed border-white/10">
        <div class="inline-grid h-16 w-16 place-items-center rounded-full bg-white/5 text-slate-500 text-2xl mb-3">
            <i class="fa-regular fa-comment-dots"></i>
        </div>
        <p class="text-slate-400">No reviews yet.</p>
      </div>
    @endforelse
  </div>

  <div class="mt-8">{{ $reviews->links() }}</div>
@endsection