@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
  <div class="grid gap-6 lg:grid-cols-2">

    <!-- Review Form -->
    <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 place-items-center rounded-2xl bg-amber-500/10 border border-amber-500/20">
          <i class="fa-solid fa-star text-amber-200"></i>
        </span>
        <div>
          <h1 class="text-2xl font-extrabold">Reviews & Feedback</h1>
          <p class="text-slate-300 text-sm">Help us improve with your honest feedback.</p>
        </div>
      </div>

      <form method="POST" action="/reviews" class="mt-6 space-y-4">
        @csrf

        <div>
          <label class="text-sm text-slate-300">Full name</label>
          <input name="full_name" value="{{ old('full_name') }}"
            class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-amber-400/60">
          @error('full_name') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="text-sm text-slate-300">Rating</label>
          <select name="rating"
            class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-amber-400/60">
            @for ($i=5; $i>=1; $i--)
              <option value="{{ $i }}" @selected(old('rating')==$i)>{{ $i }} ⭐</option>
            @endfor
          </select>
          @error('rating') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="text-sm text-slate-300">Comment (optional)</label>
          <textarea name="comment" rows="4"
            class="mt-1 w-full rounded-2xl bg-white/10 border border-white/10 px-4 py-3 outline-none focus:ring-2 focus:ring-amber-400/60">{{ old('comment') }}</textarea>
          @error('comment') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button class="w-full rounded-2xl bg-gradient-to-r from-amber-500 to-pink-500 hover:from-amber-400 hover:to-pink-400 px-5 py-3 font-extrabold shadow-soft transition">
          <i class="fa-solid fa-bolt"></i>
          <span class="ml-2">Submit Review</span>
        </button>
      </form>
    </div>

    <!-- Review List -->
    <div class="space-y-4">
      <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6">
        <h2 class="text-xl font-extrabold">Recent Reviews</h2>
        <p class="text-slate-300 text-sm mt-1">What people say about the platform</p>
      </div>

      @foreach ($reviews as $r)
        <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-6">
          <div class="flex items-start justify-between gap-3">
            <div>
              <p class="font-extrabold text-lg">{{ $r->full_name }}</p>
              <p class="text-xs text-slate-500 mt-1">{{ $r->created_at->diffForHumans() }}</p>
            </div>
            <div class="text-amber-200 font-semibold">
              {{ str_repeat('⭐', (int)$r->rating) }}
            </div>
          </div>

          @if($r->comment)
            <p class="text-slate-300 mt-4 leading-relaxed">{{ $r->comment }}</p>
          @else
            <p class="text-slate-500 mt-4 italic">No comment provided.</p>
          @endif
        </div>
      @endforeach

      <div class="mt-6">{{ $reviews->links() }}</div>
    </div>

  </div>
@endsection
