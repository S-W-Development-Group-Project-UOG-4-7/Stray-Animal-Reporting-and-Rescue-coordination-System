<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Stray Rescue')</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          boxShadow: {
            soft: "0 12px 30px rgba(0,0,0,.25)"
          }
        }
      }
    }
  </script>
</head>

<body class="min-h-screen text-slate-100 bg-[radial-gradient(ellipse_at_top,var(--tw-gradient-stops))] from-indigo-900 via-slate-950 to-black">

  <!-- Top Glow -->
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 left-1/2 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-fuchsia-600/20 blur-3xl"></div>
    <div class="absolute top-40 right-[-120px] h-[420px] w-[420px] rounded-full bg-cyan-500/15 blur-3xl"></div>
    <div class="absolute -bottom-40 left-[-120px] h-[520px] w-[520px] rounded-full bg-emerald-500/10 blur-3xl"></div>
  </div>

  <nav class="sticky top-0 z-50 border-b border-white/10 bg-black/35 backdrop-blur-xl">
    <div class="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
      <a href="/" class="flex items-center gap-2 font-extrabold tracking-wide">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-white/10 border border-white/10 shadow-soft">
          🐾
        </span>
        <span>Stray Rescue</span>
      </a>

      <div class="flex items-center gap-2">
        <a href="/adoptions" class="px-4 py-2 rounded-xl hover:bg-white/10 border border-transparent hover:border-white/10 transition">
          <i class="fa-solid fa-heart text-pink-300"></i>
          <span class="ml-2">Adoptions</span>
        </a>
        <a href="/reviews" class="px-4 py-2 rounded-xl hover:bg-white/10 border border-transparent hover:border-white/10 transition">
          <i class="fa-solid fa-star text-amber-200"></i>
          <span class="ml-2">Reviews</span>
        </a>
      </div>
    </div>
  </nav>

  <main class="mx-auto max-w-6xl px-4 py-8">
    @if (session('success'))
      <div class="mb-5 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-5 py-4">
        <div class="flex items-start gap-3">
          <div class="mt-1 text-emerald-300"><i class="fa-solid fa-circle-check"></i></div>
          <div class="text-emerald-100">{{ session('success') }}</div>
        </div>
      </div>
    @endif

    @if (session('error'))
      <div class="mb-5 rounded-2xl border border-red-400/20 bg-red-500/10 px-5 py-4">
        <div class="flex items-start gap-3">
          <div class="mt-1 text-red-300"><i class="fa-solid fa-triangle-exclamation"></i></div>
          <div class="text-red-100">{{ session('error') }}</div>
        </div>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="border-t border-white/10 bg-black/20">
    <div class="mx-auto max-w-6xl px-4 py-8 text-sm text-slate-300 flex flex-col md:flex-row gap-2 md:items-center md:justify-between">
      <p>© {{ date('Y') }} Stray Rescue • Built with Laravel + Tailwind CDN</p>
      <p class="text-slate-400">Made with 💜 for animal care</p>
    </div>
  </footer>

</body>
</html>
