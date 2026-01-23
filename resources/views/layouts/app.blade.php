<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Stray Rescue')</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Nunito', 'sans-serif'],
          },
          boxShadow: {
            'glow': '0 0 20px rgba(244, 63, 94, 0.5)',
            'soft': "0 10px 40px -10px rgba(0,0,0,0.5)"
          },
          animation: {
            'blob': 'blob 7s infinite',
          },
          keyframes: {
            blob: {
              '0%': { transform: 'translate(0px, 0px) scale(1)' },
              '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
              '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
              '100%': { transform: 'translate(0px, 0px) scale(1)' },
            }
          }
        }
      }
    }
  </script>

  <style>
    body { font-family: 'Nunito', sans-serif; }
    /* Custom Scrollbar */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #0f172a; }
    ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #475569; }
  </style>
</head>

<body class="min-h-screen text-slate-100 bg-[#0B1120] selection:bg-rose-500 selection:text-white overflow-x-hidden">

  <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
    <div class="absolute top-0 left-1/4 h-96 w-96 rounded-full bg-violet-600/20 blur-3xl mix-blend-screen animate-blob"></div>
    <div class="absolute top-0 right-1/4 h-96 w-96 rounded-full bg-rose-600/20 blur-3xl mix-blend-screen animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-32 left-1/3 h-96 w-96 rounded-full bg-teal-600/20 blur-3xl mix-blend-screen animate-blob animation-delay-4000"></div>
  </div>

  <div class="sticky top-4 z-50 px-4 mb-8">
    <nav class="mx-auto max-w-5xl rounded-full border border-white/10 bg-black/40 px-6 py-3 backdrop-blur-xl shadow-lg flex items-center justify-between">
      
      <a href="/" class="flex items-center gap-2 group">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-rose-500 to-orange-500 text-white shadow-lg group-hover:scale-110 transition">
          <i class="fa-solid fa-paw"></i>
        </div>
        <span class="text-xl font-extrabold tracking-tight text-white hidden xs:block">Safe<span class="text-rose-400">Paws</span></span>
      </a>

      <div class="flex items-center gap-1 md:gap-4">
        <a href="/adoptions" class="rounded-full px-4 py-2 text-sm font-bold text-slate-300 hover:bg-white/10 hover:text-white transition">Adopt</a>
        <a href="/reviews" class="rounded-full px-4 py-2 text-sm font-bold text-slate-300 hover:bg-white/10 hover:text-white transition hidden sm:block">Stories</a>
        <a href="/join-us" class="rounded-full px-4 py-2 text-sm font-bold text-slate-300 hover:bg-white/10 hover:text-white transition hidden sm:block">Volunteer</a>
        
        <a href="/my-requests" class="ml-2 flex items-center gap-2 rounded-full bg-white/10 border border-white/10 px-5 py-2 text-sm font-bold text-white hover:bg-rose-500 hover:border-rose-500 transition shadow-lg group">
          <span>My Dashboard</span>
          <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition"></i>
        </a>
      </div>
    </nav>
  </div>

  <main class="mx-auto max-w-7xl px-4 py-4 min-h-[80vh]">
    
    {{-- Alerts --}}
    @if (session('success'))
      <div class="mb-8 mx-auto max-w-3xl rounded-2xl border border-emerald-500/20 bg-emerald-500/10 px-6 py-4 flex items-center gap-4 shadow-soft">
        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-400"><i class="fa-solid fa-check"></i></div>
        <p class="text-emerald-100 font-semibold">{{ session('success') }}</p>
      </div>
    @endif
    @if (session('error'))
      <div class="mb-8 mx-auto max-w-3xl rounded-2xl border border-rose-500/20 bg-rose-500/10 px-6 py-4 flex items-center gap-4 shadow-soft">
        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-rose-500/20 text-rose-400"><i class="fa-solid fa-xmark"></i></div>
        <p class="text-rose-100 font-semibold">{{ session('error') }}</p>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="mt-20 border-t border-white/5 bg-black/20 pt-10 pb-6">
    <div class="text-center">
      <div class="mb-4 text-2xl font-black text-slate-700 opacity-20"><i class="fa-solid fa-shield-dog"></i></div>
      <p class="text-slate-500 text-sm">© {{ date('Y') }} SafePaws Rescue. Built with love.</p>
    </div>
  </footer>

</body>
</html>