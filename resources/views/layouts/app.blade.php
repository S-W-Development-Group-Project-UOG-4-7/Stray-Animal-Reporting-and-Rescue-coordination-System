<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Stray Rescue')</title>

  <script src="https://cdn.tailwindcss.com"></script>

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

<body class="min-h-screen text-slate-100 bg-[radial-gradient(ellipse_at_top,var(--tw-gradient-stops))] from-indigo-900 via-slate-950 to-black selection:bg-fuchsia-500 selection:text-white">

  <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-40 left-1/2 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-fuchsia-600/20 blur-3xl"></div>
    <div class="absolute top-40 right-[-120px] h-[420px] w-[420px] rounded-full bg-cyan-500/15 blur-3xl"></div>
    <div class="absolute -bottom-40 left-[-120px] h-[520px] w-[520px] rounded-full bg-emerald-500/10 blur-3xl"></div>
  </div>

  <nav class="sticky top-0 z-50 border-b border-white/10 bg-black/35 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between">
      
      <a href="/" class="flex items-center gap-2 font-extrabold tracking-wide hover:opacity-80 transition">
        <span class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-white/10 to-white/5 border border-white/10 shadow-soft text-xl">
          🐾
        </span>
        <span class="hidden xs:block text-lg">Stray Rescue</span>
      </a>

      <div class="flex items-center gap-1 md:gap-2">
        
        <a href="/adoptions" class="px-3 py-2 rounded-xl hover:bg-white/10 border border-transparent hover:border-white/10 transition flex items-center text-slate-300 hover:text-white">
          <i class="fa-solid fa-heart text-pink-400"></i>
          <span class="ml-2 hidden sm:inline font-medium">Adoptions</span>
        </a>
        
        <a href="/reviews" class="px-3 py-2 rounded-xl hover:bg-white/10 border border-transparent hover:border-white/10 transition flex items-center text-slate-300 hover:text-white">
          <i class="fa-solid fa-star text-amber-300"></i>
          <span class="ml-2 hidden sm:inline font-medium">Reviews</span>
        </a>

        <a href="/join-us" class="px-3 py-2 rounded-xl hover:bg-white/10 border border-transparent hover:border-white/10 transition flex items-center text-slate-300 hover:text-white">
          <i class="fa-solid fa-user-plus text-cyan-400"></i>
          <span class="ml-2 hidden sm:inline font-medium">Join Us</span>
        </a>

        <div class="h-6 w-px bg-white/10 mx-1 md:mx-2"></div>

        <a href="/my-requests" class="ml-1 flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-600/20 border border-indigo-500/30 text-indigo-100 hover:bg-indigo-600/40 hover:border-indigo-400 transition shadow-lg shadow-indigo-500/10 group">
          <i class="fa-solid fa-clipboard-list group-hover:scale-110 transition"></i>
          <span class="font-semibold text-sm md:text-base">My Requests</span>
        </a>

      </div>
    </div>
  </nav>

  <main class="mx-auto max-w-7xl px-4 py-8 min-h-[80vh]">
    
    {{-- Success Message --}}
    @if (session('success'))
      <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-6 py-4 animate-in fade-in slide-in-from-top-4 duration-500">
        <div class="flex items-start gap-4">
          <div class="mt-0.5 rounded-full bg-emerald-500/20 p-1 text-emerald-300"><i class="fa-solid fa-check circle"></i></div>
          <div>
            <h4 class="font-bold text-emerald-200">Success</h4>
            <div class="text-emerald-100 text-sm mt-1">{{ session('success') }}</div>
          </div>
        </div>
      </div>
    @endif

    {{-- Error Message --}}
    @if (session('error') || $errors->any())
      <div class="mb-6 rounded-2xl border border-red-400/20 bg-red-500/10 px-6 py-4 animate-in fade-in slide-in-from-top-4 duration-500">
        <div class="flex items-start gap-4">
          <div class="mt-0.5 rounded-full bg-red-500/20 p-1 text-red-300"><i class="fa-solid fa-triangle-exclamation"></i></div>
          <div>
            <h4 class="font-bold text-red-200">Attention Needed</h4>
            <div class="text-red-100 text-sm mt-1">
                {{ session('error') ?? 'Please check the form for errors.' }}
            </div>
          </div>
        </div>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="border-t border-white/10 bg-black/20 mt-auto">
    <div class="mx-auto max-w-7xl px-4 py-8 text-sm text-slate-400 flex flex-col md:flex-row gap-4 md:items-center md:justify-between">
      <div class="flex flex-col gap-1">
        <p class="font-bold text-slate-200">© {{ date('Y') }} Stray Rescue</p>
        <p>Saving lives, one paw at a time.</p>
      </div>
      
      <div class="flex items-center gap-6">
        <a href="/join-us" class="hover:text-indigo-300 transition">Volunteer</a>
        <a href="/adoptions" class="hover:text-indigo-300 transition">Adopt</a>
        <div class="flex gap-4 text-lg border-l border-white/10 pl-6">
           <a href="#" class="hover:text-white hover:scale-110 transition"><i class="fa-brands fa-instagram"></i></a>
           <a href="#" class="hover:text-white hover:scale-110 transition"><i class="fa-brands fa-facebook"></i></a>
           <a href="#" class="hover:text-white hover:scale-110 transition"><i class="fa-brands fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>