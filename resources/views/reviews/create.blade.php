@extends('layouts.app')

@section('title', 'Write a Review')

@section('content')
<div class="max-w-xl mx-auto">
  <div class="rounded-3xl border border-white/10 bg-white/5 shadow-soft p-8">
    
    <div class="text-center mb-6">
      <div class="inline-block p-3 rounded-full bg-amber-500/20 text-amber-400 text-2xl mb-3">
        <i class="fa-solid fa-star"></i>
      </div>
      <h1 class="text-2xl font-bold text-white">Rate your Experience</h1>
      <p class="text-slate-400 text-sm mt-1">Adoption of <strong>{{ $adoptionRequest->animal->name }}</strong></p>
    </div>

    <form method="POST" action="/reviews/write/{{ $adoptionRequest->id }}" class="space-y-6">
      @csrf

      <div class="space-y-2 text-center">
        <label class="block text-sm text-slate-300">How would you rate the process?</label>
        <div class="flex justify-center gap-4 text-3xl">
          @for($i = 1; $i <= 5; $i++)
            <label class="cursor-pointer hover:scale-110 transition">
              <input type="radio" name="rating" value="{{ $i }}" class="peer sr-only" required>
              <i class="fa-solid fa-star text-slate-600 peer-checked:text-amber-400 hover:text-amber-300 transition"></i>
            </label>
          @endfor
        </div>
        @error('rating') <p class="text-red-400 text-xs">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm text-slate-300 mb-2">Share your thoughts</label>
        <textarea name="comment" rows="4" required placeholder="Tell us about your experience..."
                  class="w-full rounded-xl bg-black/30 border border-white/10 px-4 py-3 text-slate-200 focus:ring-2 focus:ring-amber-500/50 outline-none"></textarea>
        @error('comment') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
      </div>

      <button type="submit" class="w-full py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-bold transition">
        Submit Review
      </button>
      
      <div class="text-center">
        <a href="/my-requests" class="text-sm text-slate-500 hover:text-slate-300">Cancel</a>
      </div>

    </form>
  </div>
</div>

<style>
/* CSS to make stars light up on hover/check logic needs simple JS or strict peer ordering. 
   For simplicity in this layout, we rely on the radio checked state. */
input[type="radio"]:checked + i {
    color: #fbbf24; /* Amber-400 */
}
</style>
@endsection