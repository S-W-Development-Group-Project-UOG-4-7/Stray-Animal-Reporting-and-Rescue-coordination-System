<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'SafePaws — A Better World for Every Paw')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        @stack('styles')
        <style type="text/tailwindcss">
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }

            @keyframes pulse-glow {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.7; }
            }

            @keyframes slide-in {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }

            .animate-float {
                animation: float 3s ease-in-out infinite;
            }

            .animate-pulse-glow {
                animation: pulse-glow 2s ease-in-out infinite;
            }

            .animate-slide-in {
                animation: slide-in 0.6s ease-out;
            }

            .stagger-animation > * {
                opacity: 0;
                animation: slide-in 0.5s ease-out forwards;
            }

            .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
            .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
            .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
            .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }
            .stagger-animation > *:nth-child(5) { animation-delay: 0.5s; }

            body {
                font-family: 'Poppins', sans-serif;
                background-color: #071331;
                scroll-behavior: smooth;
            }

            h1, h2, h3, h4, .title {
                font-family: 'Quicksand', sans-serif;
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .gradient-text {
                background: linear-gradient(90deg, #0ea5e9, #22d3ee, #67e8f9);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #0ea5e9, #22d3ee, #67e8f9);
            }

            .hover-grow {
                transition: transform 0.3s ease;
            }

            .hover-grow:hover {
                transform: translateY(-5px);
            }

            .section-padding {
                @apply px-5 py-16 md:px-12 md:py-24;
            }

            .container-custom {
                @apply max-w-[1400px] mx-auto;
            }

            .title {
                @apply text-4xl md:text-5xl lg:text-6xl font-bold leading-tight;
            }

            .subtitle {
                @apply text-xl md:text-2xl font-light text-gray-300;
            }

            .section-title {
                @apply text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-center;
            }

            .section-subtitle {
                @apply text-lg md:text-xl text-gray-300 mb-12 text-center max-w-3xl mx-auto;
            }

            .primary-btn {
                @apply gradient-bg text-white font-medium px-8 py-4 rounded-full hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .secondary-btn {
                @apply border-2 border-[#0ea5e9] text-[#0ea5e9] font-medium px-8 py-4 rounded-full hover:bg-[#0ea5e9] hover:text-white transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .danger-btn {
                @apply border-2 border-red-500 text-red-500 font-medium px-6 py-3 rounded-full hover:bg-red-500 hover:text-white transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .card {
                @apply glass-effect rounded-2xl p-6 md:p-8 hover-grow;
            }

            .stat-card {
                @apply bg-gradient-to-br from-cyan-900/30 to-blue-900/30 rounded-2xl p-8 text-center border border-cyan-500/20;
            }

            .feature-card {
                @apply card hover:border-cyan-500/30 transition-all duration-300;
            }

            .testimonial-card {
                @apply card border-l-4 border-cyan-500;
            }

            .nav-link {
                @apply relative px-3 py-2 text-sm font-medium transition-colors duration-300 text-white/90 hover:text-white;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #0ea5e9, #22d3ee);
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }

            .nav-link:hover::after, .nav-link.active::after {
                width: 80%;
            }

            .dropdown-menu {
                @apply absolute top-full left-0 mt-2 w-56 rounded-xl glass-effect shadow-2xl p-4 invisible opacity-0 transition-all duration-300 transform -translate-y-2;
            }

            .dropdown:hover .dropdown-menu {
                @apply visible opacity-100 transform translate-y-0;
            }

            .dropdown-item {
                @apply block px-4 py-3 rounded-lg hover:bg-white/5 transition-colors duration-200 mb-2 last:mb-0;
            }

            .stats-counter {
                font-size: 3rem;
                font-weight: bold;
                background: linear-gradient(90deg, #0ea5e9, #22d3ee);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .feature-icon {
                @apply w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center text-white text-2xl mb-6;
            }

            .scroll-indicator {
                position: absolute;
                bottom: 40px;
                left: 50%;
                transform: translateX(-50%);
                width: 30px;
                height: 50px;
                border: 2px solid rgba(255, 255, 255, 0.3);
                border-radius: 15px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .scroll-indicator::before {
                content: '';
                width: 6px;
                height: 12px;
                background: white;
                border-radius: 3px;
                animation: scroll 2s infinite;
            }

            @keyframes scroll {
                0% { transform: translateY(-10px); opacity: 0; }
                50% { opacity: 1; }
                100% { transform: translateY(10px); opacity: 0; }
            }

            .floating-element {
                position: absolute;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(14, 165, 233, 0.2) 0%, transparent 70%);
                z-index: -1;
            }

            .floating-element-1 {
                width: 300px;
                height: 300px;
                top: 10%;
                left: 5%;
            }

            .floating-element-2 {
                width: 200px;
                height: 200px;
                bottom: 20%;
                right: 10%;
            }

            .pet-card {
                @apply relative overflow-hidden rounded-2xl transition-all duration-500 hover:scale-105;
            }

            .pet-card img {
                transition: transform 0.5s ease;
            }

            .pet-card:hover img {
                transform: scale(1.05);
            }

            .pet-info {
                @apply absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent;
            }

            .team-card {
                @apply text-center card hover:border-cyan-500/50;
            }

            .team-img {
                @apply w-32 h-32 mx-auto mb-6 rounded-full object-cover border-4 border-cyan-500/30;
            }

            /* Language selector styles */
            .language-selector {
                @apply relative;
            }

            .language-dropdown {
                @apply absolute right-0 mt-2 w-40 rounded-xl glass-effect shadow-2xl p-3 invisible opacity-0 transition-all duration-300 transform -translate-y-2 z-50;
            }

            .language-selector:hover .language-dropdown {
                @apply visible opacity-100 transform translate-y-0;
            }

            .language-option {
                @apply flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 transition-colors duration-200 mb-1 last:mb-0 cursor-pointer text-sm;
            }

            .flag-icon {
                @apply w-5 h-5 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0;
            }

            /* Login button styles */
            .login-btn {
                @apply flex items-center gap-2 px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm font-medium text-white/90 hover:text-white;
            }

            /* Report Animal button styles */
            .report-btn {
                @apply flex items-center gap-2 px-4 py-2.5 rounded-full bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 transition-all duration-300 text-sm font-medium text-red-300 hover:text-white;
            }

            /* Navigation action buttons container */
            .nav-actions {
                @apply flex items-center gap-2 ml-4;
            }

            /* Small utility buttons */
            .small-btn {
                @apply px-3 py-1.5 text-xs rounded-lg transition-all duration-200;
            }

            /* Enhanced glass effect for nav */
            .nav-glass {
                background: rgba(7, 19, 49, 0.85);
                backdrop-filter: blur(15px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            }

            /* Beautiful separator */
            .nav-separator {
                @apply w-px h-6 bg-white/10 mx-2;
            }

            /* Mobile language selector */
            .mobile-language-btn {
                @apply flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm;
            }
        </style>
    </head>
    <body class="overflow-x-hidden text-white">
        @yield('content')
        
        <!-- Back to Top Button -->
        <button id="back-to-top" class="fixed flex items-center justify-center hidden w-12 h-12 text-white transition-all duration-300 rounded-full shadow-lg bottom-8 right-8 gradient-bg shadow-cyan-500/30 hover:scale-110">
            <i class="fas fa-arrow-up"></i>
        </button>

        @stack('scripts')
    </body>
</html>