<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SafePaws — A Better World for Every Paw</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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

            @keyframes fade-in {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
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

            .animate-fade-in {
                animation: fade-in 0.5s ease-out;
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

            /* Active amount button style */
            .amount-btn-active {
                @apply bg-cyan-500/20 border-cyan-500/50;
            }

            /* Success message */
            .success-message {
                @apply flex items-center gap-2 p-3 mb-4 rounded-lg bg-green-500/10 border border-green-500/30 text-green-400 text-sm;
            }

            /* Slip preview */
            .slip-preview {
                @apply mt-4 p-4 rounded-lg bg-white/5 border border-cyan-500/20;
            }
            
            /* Input styles */
            .form-input {
                @apply w-full px-4 py-3 border rounded-xl border-white/20 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none bg-white/5 text-white transition-all duration-200;
            }
            
            .form-input:focus {
                @apply bg-white/10;
            }
            
            .form-label {
                @apply block mb-2 text-sm font-medium text-gray-300;
            }
            
            .form-error {
                @apply hidden mt-2 text-sm text-red-400;
            }
        </style>
    </head>
    <body class="overflow-x-hidden text-white">
        <!-- Floating Background Elements -->
        <div class="floating-element floating-element-1"></div>
        <div class="floating-element floating-element-2"></div>

        <!-- Navigation -->
        <header class="fixed top-0 z-50 w-full nav-glass">
            <div class="px-5 py-3 container-custom">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <a href="#home" class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 shadow-lg gradient-bg rounded-xl shadow-cyan-500/30">
                            <i class="text-lg text-white fas fa-paw"></i>
                        </div>
                        <div>
                            <span class="text-xl font-bold">SafePaws</span>
                            <div class="text-[10px] text-gray-300 leading-tight">Protecting Every Paw</div>
                        </div>
                    </a>

                    <!-- Desktop Navigation -->
                    <nav class="items-center hidden gap-1 lg:flex">
                        <a href="{{ route('home') }}" class="nav-link active">Home</a>
                        
                        <div class="relative dropdown">
                            <button class="flex items-center gap-1 nav-link">
                                Our Work <i class="text-xs fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#sterilization" class="dropdown-item">
                                    <i class="mr-3 fas fa-stethoscope text-cyan-400"></i>
                                    Sterilization & Vaccination
                                </a>
                                <a href="#rescue" class="dropdown-item">
                                    <i class="mr-3 fas fa-heart text-cyan-400"></i>
                                    Rescue Operations
                                </a>
                                <a href="#adoption" class="dropdown-item">
                                    <i class="mr-3 fas fa-home text-cyan-400"></i>
                                    Adoption Programs
                                </a>
                                <a href="#shelters" class="dropdown-item">
                                    <i class="mr-3 fas fa-shield-alt text-cyan-400"></i>
                                    Safe Shelters
                                </a>
                            </div>
                        </div>

                        <div class="relative dropdown">
                            <button class="flex items-center gap-1 nav-link">
                                Get Involved <i class="text-xs fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#volunteer" class="dropdown-item">
                                    <i class="mr-3 fas fa-hands-helping text-cyan-400"></i>
                                    Volunteer
                                </a>
                                           <a href="#donate" class="dropdown-item"> <i class="mr-3 fas fa-donate text-cyan-400"></i>Donate</a>

                                <a href="#foster" class="dropdown-item">
                                    <i class="mr-3 fas fa-heartbeat text-cyan-400"></i>
                                    Foster
                                </a>
                                <a href="#sponsor" class="dropdown-item">
                                    <i class="mr-3 fas fa-star text-cyan-400"></i>
                                    Sponsor
                                </a>
                            </div>
                        </div>

                        <a href="#success" class="nav-link">Success Stories</a>
                        <a href="#contact" class="nav-link">Contact</a>
                        
                        <!-- Navigation Actions - Beautifully Arranged -->
                        <div class="nav-actions">
                                       <a href="{{ route('animal.report.form') }}" class="hover:text-gray-200">Report Animal</a>


                            <!-- Donate Button -->
                            <a href="{{ route('donation') }}" class="border small-btn bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
                                <i class="mr-1 fas fa-heart"></i>
                                Donate
                            </a>

                            <div class="nav-separator"></div>

                            <!-- Language Selector -->
                            <div class="relative language-selector">
                                <button class="flex items-center gap-1 px-2 py-1.5 rounded-lg hover:bg-white/5 text-xs font-medium text-white/70 hover:text-white">
                                    <i class="text-xs fas fa-globe"></i>
                                    <span>EN</span>
                                </button>
                                <div class="language-dropdown">
                                    <div class="language-option" data-lang="en">
                                        <div class="text-white flag-icon bg-gradient-to-r from-blue-500 to-red-500">
                                            EN
                                        </div>
                                        <span class="text-white/90">English</span>
                                    </div>
                                    <div class="language-option" data-lang="es">
                                        <div class="text-white flag-icon bg-gradient-to-r from-red-500 to-yellow-500">
                                            ES
                                        </div>
                                        <span class="text-white/90">Español</span>
                                    </div>
                                    <div class="language-option" data-lang="fr">
                                        <div class="text-blue-600 flag-icon bg-gradient-to-r from-blue-500 to-white">
                                            FR
                                        </div>
                                        <span class="text-white/90">Français</span>
                                    </div>
                                    <div class="language-option" data-lang="de">
                                        <div class="text-white flag-icon bg-gradient-to-r from-black to-red-500 to-yellow-500">
                                            DE
                                        </div>
                                        <span class="text-white/90">Deutsch</span>
                                    </div>
                                    <div class="language-option" data-lang="ja">
                                        <div class="text-red-600 flag-icon bg-gradient-to-r from-red-500 to-white">
                                            日
                                        </div>
                                        <span class="text-white/90">日本語</span>
                                    </div>
                                    <div class="language-option" data-lang="si">
                                        <div class="text-white flag-icon bg-gradient-to-r from-yellow-500 to-orange-500">
                                            සි
                                        </div>
                                        <span class="text-white/90">සිංහල</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Log In Button -->
                            <button class="login-btn" onclick="openLogin()">
                                <i class="fas fa-sign-in-alt"></i>
                                Log In
                            </button>
                        </div>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="text-xl lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden px-5 py-4 border-t lg:hidden nav-glass border-white/10">
                <div class="space-y-2">
                    <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Home</a>
                    <a href="#about" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">About</a>
                    <a href="#work" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Our Work</a>
                    <a href="#involve" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Get Involved</a>
                    <a href="#success" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Success Stories</a>
                    <a href="#contact" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Contact</a>
                    
                    <!-- Action Buttons for Mobile -->
                    <div class="pt-3 mt-3 space-y-2 border-t border-white/10">
                        <button class="justify-center w-full report-btn" onclick="reportAnimal()">
                            <i class="fas fa-exclamation-triangle"></i>
                            Report Animal
                        </button>
                        
                        <a href="{{ route('donation') }}" class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/30 text-cyan-300 hover:text-white text-sm">
                            <i class="fas fa-heart"></i>
                            Donate Now
                        </a>
                    </div>

                    <!-- Language Selector for Mobile -->
                    <div class="pt-3 mt-3 border-t border-white/10">
                        <h4 class="px-2 mb-2 text-xs font-semibold tracking-wider text-gray-400 uppercase">Language</h4>
                        <div class="grid grid-cols-2 gap-1">
                            <button class="mobile-language-btn" data-lang="en">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-blue-500 to-red-500">
                                    EN
                                </div>
                                <span>English</span>
                            </button>
                            <button class="mobile-language-btn" data-lang="es">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-red-500 to-yellow-500">
                                    ES
                                </div>
                                <span>Español</span>
                            </button>
                            <button class="mobile-language-btn" data-lang="fr">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-blue-600 rounded-full bg-gradient-to-r from-blue-500 to-white">
                                    FR
                                </div>
                                <span>Français</span>
                            </button>
                            <button class="mobile-language-btn" data-lang="de">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-black to-red-500 to-yellow-500">
                                    DE
                                </div>
                                <span>Deutsch</span>
                            </button>
                            <button class="mobile-language-btn" data-lang="ja">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold rounded-full bg-gradient-to-r from-red-500 to-white">
                                    日
                                </div>
                                <span>日本語</span>
                            </button>
                            <button class="mobile-language-btn" data-lang="si">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-yellow-500 to-orange-500">
                                    සි
                                </div>
                                <span>සිංහල</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Log In for Mobile -->
                    <div class="pt-3 mt-3 border-t border-white/10">
                        <button class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-white/10 hover:bg-white/20 text-sm" onclick="openLogin()">
                            <i class="fas fa-sign-in-alt"></i>
                            Log In to Account
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section id="home" class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
            <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
            <div class="px-5 container-custom">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <!-- Left Content -->
                    <div class="stagger-animation">
                        <h1 class="mb-6 text-4xl font-bold leading-tight md:text-5xl lg:text-6xl">
                            <span class="gradient-text">You Can Save</span><br>A Life Today
                        </h1>
                        <p class="mb-8 text-xl font-light text-gray-300 md:text-2xl">
                            Will you help save a life today? Every contribution helps rescue, feed, and heal innocent animals waiting for a second chance at life
                        </p>
                        
                        <div class="flex flex-col gap-4 mb-12 sm:flex-row">
                            <button class="inline-flex items-center gap-2 px-8 py-4 font-medium text-white transition-all duration-300 rounded-full gradient-bg hover:shadow-lg hover:shadow-cyan-500/30 hover:scale-105">
                                <i class="fas fa-heart"></i>
                                Adopt a Friend
                            </button>
                            <a href="#volunteer" class="inline-flex items-center gap-2 px-8 py-4 font-medium transition-all duration-300 border-2 rounded-full border-[#0ea5e9] text-[#0ea5e9] hover:bg-[#0ea5e9] hover:text-white hover:scale-105">
                                <i class="fas fa-hands-helping"></i>
                                Become a Volunteer
                            </a>
                        </div>
                        
                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="text-4xl font-bold gradient-text">2,500</div>
                                <p class="mt-2 text-gray-300">Animals Rescued</p>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold gradient-text">1,200</div>
                                <p class="mt-2 text-gray-300">Successful Adoptions</p>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold gradient-text">500</div>
                                <p class="mt-2 text-gray-300">Active Volunteers</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Image -->
                    <div class="relative">
                        <div class="relative z-10 overflow-hidden shadow-2xl rounded-3xl shadow-cyan-500/20">
                            <img src="https://wallpaperaccess.com/full/493584.jpg" 
                                 alt="Happy dogs together" 
                                 class="object-cover w-full h-[500px] transition-transform duration-500 hover:scale-105">
                        </div>
                        <div class="absolute w-64 h-64 -bottom-6 -right-6 rounded-3xl gradient-bg -z-10 animate-float"></div>
                        <div class="absolute w-48 h-48 -top-6 -left-6 rounded-3xl bg-purple-500/30 -z-10 animate-float" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 scroll-indicator"></div>
        </section>

        <!-- Donation Section -->
        <section id="donate" class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
            <div class="container-custom">
                <div class="max-w-3xl mx-auto">
                    <div class="mb-12 text-center">
                        <h2 class="mb-4 text-3xl font-bold text-center md:text-4xl lg:text-5xl">Make a Donation</h2>
                        <p class="text-lg text-gray-300 md:text-xl">Support our mission to rescue and care for animals in need</p>
                    </div>

                    <!-- Payment Methods -->
                    <div class="p-1 mb-8 rounded-2xl glass-effect">
                        <div class="grid grid-cols-2">
                            <button type="button" id="bankTab" class="py-4 font-medium transition-all rounded-xl bg-cyan-500/20 text-cyan-300">
                                <i class="mr-2 fas fa-university"></i>
                                Bank Transfer
                            </button>
                            <button type="button" id="cardTab" class="py-4 font-medium text-gray-400 transition-all rounded-xl hover:text-white">
                                <i class="mr-2 fas fa-credit-card"></i>
                                Card Payment
                            </button>
                        </div>
                    </div>

                    <!-- Bank Transfer Content -->
                    <div id="bankContent" class="p-8 rounded-2xl glass-effect">
                        <!-- Form starts here -->
                        <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Hidden field for payment method -->
                            <input type="hidden" name="payment_method" value="bank_transfer">
                            
                            <!-- Hidden field for final amount -->
                            <input type="hidden" name="amount" id="finalAmount" value="">
                            
                            <div class="mb-8">
                                <h3 class="mb-4 text-2xl font-bold">Bank Account Details</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 rounded-xl bg-white/5">
                                        <div class="flex items-center gap-3">
                                            <i class="text-cyan-400 fas fa-university"></i>
                                            <div>
                                                <p class="text-sm text-gray-300">Bank Name</p>
                                                <p class="font-semibold">Commercial Bank</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-4 rounded-xl bg-white/5">
                                        <div class="flex items-center gap-3">
                                            <i class="text-cyan-400 fas fa-code-branch"></i>
                                            <div>
                                                <p class="text-sm text-gray-300">Branch</p>
                                                <p class="font-semibold">Colombo</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-4 rounded-xl bg-white/5">
                                        <div class="flex items-center gap-3">
                                            <i class="text-cyan-400 fas fa-user-tie"></i>
                                            <div>
                                                <p class="text-sm text-gray-300">Account Name</p>
                                                <p class="font-semibold">SafePaws Foundation</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-4 rounded-xl bg-white/5">
                                        <div class="flex items-center gap-3">
                                            <i class="text-cyan-400 fas fa-hashtag"></i>
                                            <div>
                                                <p class="text-sm text-gray-300">Account Number</p>
                                                <p class="font-mono font-semibold">1234567890</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Donation Amount -->
                            <div class="mb-8">
                                <h4 class="mb-4 text-xl font-bold">Select Donation Amount</h4>
                                
                                <!-- Selected Amount Display -->
                                <div id="selectedBankDisplay" class="hidden p-4 mb-4 border rounded-xl bg-gradient-to-r from-cyan-900/30 to-blue-900/30 border-cyan-500/20">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-gray-300">Selected Amount</p>
                                            <p class="text-2xl font-bold text-cyan-400" id="bankDisplayAmount">$10.00</p>
                                        </div>
                                        <button type="button" onclick="clearBankSelection()" class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-4 gap-3 mb-4">
                                    <button type="button" class="py-3 text-center transition-all duration-300 border donation-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="10">
                                        <span class="font-bold text-cyan-400">$10</span>
                                    </button>
                                    <button type="button" class="py-3 text-center transition-all duration-300 border donation-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="25">
                                        <span class="font-bold text-cyan-400">$25</span>
                                    </button>
                                    <button type="button" class="py-3 text-center transition-all duration-300 border donation-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="50">
                                        <span class="font-bold text-cyan-400">$50</span>
                                    </button>
                                    <button type="button" class="py-3 text-center transition-all duration-300 border donation-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="100">
                                        <span class="font-bold text-cyan-400">$100</span>
                                    </button>
                                </div>
                                <div class="relative">
                                    <span class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2">$</span>
                                    <input type="number" id="customDonation" 
                                           class="pl-10 form-input"
                                           placeholder="Custom Amount" min="1" step="0.01"
                                           name="custom_amount">
                                </div>
                                <p id="bankAmountError" class="form-error">Please select or enter a donation amount (minimum $1)</p>
                            </div>

                            <!-- Donor Information Section -->
                            <div class="mb-8">
                                <h4 class="mb-4 text-xl font-bold">Donor Information</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label for="donorName" class="form-label">
                                            <i class="mr-2 fas fa-user"></i>
                                            Your Full Name
                                        </label>
                                        <input type="text" id="donorName" 
                                               class="form-input"
                                               placeholder="Enter your full name"
                                               name="donor_name" required>
                                        <p id="donorNameError" class="form-error">Please enter your full name</p>
                                    </div>
                                    
                                    <div>
                                        <label for="donorEmail" class="form-label">
                                            <i class="mr-2 fas fa-envelope"></i>
                                            Email Address
                                        </label>
                                        <input type="email" id="donorEmail" 
                                               class="form-input"
                                               placeholder="your@email.com"
                                               name="donor_email" required>
                                        <p id="donorEmailError" class="form-error">Please enter a valid email address</p>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        <div>
                                            <label for="donorPhone" class="form-label">
                                                <i class="mr-2 fas fa-phone"></i>
                                                Phone Number (Optional)
                                            </label>
                                            <input type="tel" id="donorPhone" 
                                                   class="form-input"
                                                   placeholder="+1 (555) 123-4567"
                                                   name="donor_phone">
                                        </div>
                                        
                                        <div>
                                            <label for="donorAddress" class="form-label">
                                                <i class="mr-2 fas fa-map-marker-alt"></i>
                                                Address (Optional)
                                            </label>
                                            <input type="text" id="donorAddress" 
                                                   class="form-input"
                                                   placeholder="Your address"
                                                   name="donor_address">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="donorMessage" class="form-label">
                                            <i class="mr-2 fas fa-comment"></i>
                                            Message (Optional)
                                        </label>
                                        <textarea id="donorMessage" 
                                                  class="form-input min-h-[100px]"
                                                  placeholder="Add a personal message with your donation..."
                                                  name="donor_message"></textarea>
                                        <p class="mt-1 text-xs text-gray-400">Your message will be shared with our team and may be featured on our donor wall.</p>
                                    </div>
                                </div>
                                
                                <!-- Privacy Options -->
                                <div class="mt-4 space-y-2">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" id="isAnonymous" 
                                               class="w-4 h-4 bg-gray-700 border-gray-600 rounded text-cyan-500 focus:ring-cyan-500 focus:ring-2"
                                               name="is_anonymous" value="1">
                                        <span class="text-sm text-gray-300">Make this donation anonymous</span>
                                    </label>
                                    
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" id="showOnWall" checked 
                                               class="w-4 h-4 bg-gray-700 border-gray-600 rounded text-cyan-500 focus:ring-cyan-500 focus:ring-2"
                                               name="show_on_donor_wall" value="1">
                                        <span class="text-sm text-gray-300">Show my name on donor wall (Optional)</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Upload Section -->
                            <div class="mb-8">
                                <h4 class="mb-4 text-xl font-bold">Upload Payment Slip</h4>
                                <div class="p-8 text-center border-2 border-dashed rounded-xl border-cyan-500/30 bg-white/5">
                                    <i class="mx-auto mb-4 text-4xl text-cyan-400 fas fa-file-upload"></i>
                                    <p class="mb-2 text-gray-300">Drag and drop or click to upload</p>
                                    <p class="mb-4 text-sm text-gray-400">JPG, PNG, PDF up to 5MB</p>
                                    <input type="file" id="bankSlip" 
                                           class="hidden" 
                                           accept=".jpg,.jpeg,.png,.pdf"
                                           name="payment_slip" required>
                                    <button type="button" onclick="document.getElementById('bankSlip').click()" class="px-6 py-3 font-medium transition-colors duration-300 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-300 hover:text-white">
                                        <i class="mr-2 fas fa-upload"></i>
                                        Choose File
                                    </button>
                                </div>
                                <p id="bankSlipError" class="form-error">Please upload your payment slip</p>
                            </div>

                            <!-- Submitted slip display area -->
                            <div id="submittedSlipDisplay" class="hidden mt-8">
                                <div class="success-message animate-fade-in">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="font-medium">Payment slip submitted successfully!</span>
                                    <span class="px-2 py-1 ml-2 text-xs rounded bg-cyan-500/20 text-cyan-300" id="transactionIdSpan"></span>
                                </div>
                                <div class="mt-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-xl font-bold">Submitted Payment Slip</h3>
                                        <span class="text-sm text-gray-400" id="submissionDate"></span>
                                    </div>
                                    <div id="slipPreview" class="slip-preview animate-fade-in">
                                        <!-- Slip details will be loaded here -->
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="donateBankBtn" class="w-full py-4 text-lg font-bold text-white transition-all duration-300 rounded-2xl gradient-bg hover:shadow-xl hover:shadow-cyan-500/30">
                                <i class="mr-2 fas fa-university"></i>
                                Submit Bank Transfer
                                <span id="selectedBankAmount" class="ml-2">$0</span>
                            </button>
                        </form>
                        <!-- Form ends here -->
                    </div>

                    <!-- Card Payment Content -->
                    <div id="cardContent" class="hidden p-8 rounded-2xl glass-effect">
                        <div class="mb-8">
                            <h3 class="mb-4 text-2xl font-bold">Card Details</h3>
                            <div class="space-y-6">
                                <div>
                                    <label class="form-label">Card Number</label>
                                    <div class="relative">
                                        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" 
                                               class="form-input">
                                        <div class="absolute flex space-x-2 transform -translate-y-1/2 right-4 top-1/2">
                                            <i class="text-blue-500 fab fa-cc-visa"></i>
                                            <i class="text-red-500 fab fa-cc-mastercard"></i>
                                        </div>
                                    </div>
                                    <p id="cardNumberError" class="form-error">Please enter a valid 16-digit card number</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="form-label">Expiry Date</label>
                                        <input type="text" id="expiryDate" placeholder="MM/YY" 
                                               class="form-input">
                                        <p id="expiryError" class="form-error">Please enter a valid future expiry date (MM/YY)</p>
                                    </div>
                                    <div>
                                        <label class="form-label">CVC</label>
                                        <input type="text" id="cvc" placeholder="123" 
                                               class="form-input">
                                        <p id="cvcError" class="form-error">Please enter a valid CVC (3-4 digits)</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Name on Card</label>
                                    <input type="text" id="cardName" placeholder="John Doe" 
                                           class="form-input">
                                    <p id="cardNameError" class="form-error">Please enter the name on card</p>
                                </div>
                            </div>
                        </div>

                        <!-- Donation Amount for Card -->
                        <div class="mb-8">
                            <h4 class="mb-4 text-xl font-bold">Donation Amount</h4>
                            
                            <!-- Selected Amount Display -->
                            <div id="selectedCardDisplay" class="hidden p-4 mb-4 border rounded-xl bg-gradient-to-r from-cyan-900/30 to-blue-900/30 border-cyan-500/20">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-300">Selected Amount</p>
                                        <p class="text-2xl font-bold text-cyan-400" id="cardDisplayAmount">$10.00</p>
                                    </div>
                                    <button onclick="clearCardSelection()" class="text-red-400 hover:text-red-300">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-4 gap-3 mb-4">
                                <button class="py-3 text-center transition-all duration-300 border card-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="10">
                                    <span class="font-bold text-cyan-400">$10</span>
                                </button>
                                <button class="py-3 text-center transition-all duration-300 border card-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="25">
                                    <span class="font-bold text-cyan-400">$25</span>
                                </button>
                                <button class="py-3 text-center transition-all duration-300 border card-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="50">
                                    <span class="font-bold text-cyan-400">$50</span>
                                </button>
                                <button class="py-3 text-center transition-all duration-300 border card-amount-btn rounded-xl bg-white/5 border-white/10 hover:bg-cyan-500/20 hover:border-cyan-500/50" data-amount="100">
                                    <span class="font-bold text-cyan-400">$100</span>
                                </button>
                            </div>
                            <div class="relative">
                                <span class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2">$</span>
                                <input type="number" id="customCardAmount" 
                                       class="pl-10 form-input"
                                       placeholder="Custom Amount" min="1" step="0.01">
                            </div>
                            <p id="cardAmountError" class="form-error">Please select or enter a donation amount (minimum $1)</p>
                        </div>

                        <button id="donateCardBtn" class="w-full py-4 text-lg font-bold text-white transition-all duration-300 rounded-2xl gradient-bg hover:shadow-xl hover:shadow-cyan-500/30">
                            <i class="mr-2 fas fa-credit-card"></i>
                            Donate with Card
                            <span id="selectedCardAmount" class="ml-2">$0</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-transparent to-[#0b2447] pt-16 pb-8">
            <div class="px-5 container-custom">
                <div class="grid gap-8 mb-12 md:grid-cols-4">
                    <div>
                        <a href="#home" class="flex items-center gap-3 mb-6">
                            <div class="flex items-center justify-center w-12 h-12 gradient-bg rounded-xl">
                                <i class="text-xl text-white fas fa-paw"></i>
                            </div>
                            <div>
                                <span class="text-2xl font-bold">SafePaws</span>
                                <div class="text-xs text-gray-300">Protecting Every Paw</div>
                            </div>
                        </a>
                        <p class="mb-6 text-gray-300">
                            Dedicated to rescuing, protecting, and finding loving homes for animals in need since 2010.
                        </p>
                        <div class="flex gap-4">
                            <a href="#" class="flex items-center justify-center w-10 h-10 transition-colors duration-300 rounded-full bg-white/10 hover:bg-cyan-500">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 transition-colors duration-300 rounded-full bg-white/10 hover:bg-cyan-500">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 transition-colors duration-300 rounded-full bg-white/10 hover:bg-cyan-500">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="flex items-center justify-center w-10 h-10 transition-colors duration-300 rounded-full bg-white/10 hover:bg-cyan-500">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="mb-6 text-lg font-bold">Quick Links</h4>
                        <ul class="space-y-3">
                            <li><a href="#home" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Home</a></li>
                            <li><a href="#about" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">About Us</a></li>
                            <li><a href="#adopt" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Adopt a Pet</a></li>
                            <li><a href="#success" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Success Stories</a></li>
                            <li><a href="#team" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Our Team</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="mb-6 text-lg font-bold">Our Services</h4>
                        <ul class="space-y-3">
                            <li><a href="#rescue" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Animal Rescue</a></li>
                            <li><a href="#medical" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Medical Care</a></li>
                            <li><a href="#adoption" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Adoption Services</a></li>
                            <li><a href="#sterilization" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Sterilization Programs</a></li>
                            <li><a href="#education" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Education & Awareness</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="mb-6 text-lg font-bold">Contact Info</h4>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <i class="mt-1 fas fa-map-marker-alt text-cyan-400"></i>
                                <span class="text-gray-300">123 Animal Rescue Street, Paw City, PC 10001</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-phone text-cyan-400"></i>
                                <span class="text-gray-300">(555) 123-4567</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-envelope text-cyan-400"></i>
                                <span class="text-gray-300">help@safepaws.org</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-clock text-cyan-400"></i>
                                <span class="text-gray-300">24/7 Emergency Hotline</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="pt-8 border-t border-white/10">
                    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                        <p class="text-sm text-gray-400">
                            © <span id="current-year">2023</span> SafePaws. All rights reserved. | 
                            <a href="#" class="transition-colors duration-300 hover:text-cyan-400">Privacy Policy</a> | 
                            <a href="#" class="transition-colors duration-300 hover:text-cyan-400">Terms of Service</a>
                        </p>
                        <p class="text-sm text-gray-400">
                            Made with <i class="mx-1 text-red-400 fas fa-heart"></i> for animals everywhere
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            // Update current year in footer
            document.getElementById('current-year').textContent = new Date().getFullYear();
            
            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Donation Tab Switching
            const bankTab = document.getElementById('bankTab');
            const cardTab = document.getElementById('cardTab');
            const bankContent = document.getElementById('bankContent');
            const cardContent = document.getElementById('cardContent');

            bankTab.addEventListener('click', () => {
                bankTab.classList.add('bg-cyan-500/20', 'text-cyan-300');
                bankTab.classList.remove('text-gray-400', 'hover:text-white');
                cardTab.classList.remove('bg-cyan-500/20', 'text-cyan-300');
                cardTab.classList.add('text-gray-400', 'hover:text-white');
                bankContent.classList.remove('hidden');
                cardContent.classList.add('hidden');
                resetErrors();
            });

            cardTab.addEventListener('click', () => {
                cardTab.classList.add('bg-cyan-500/20', 'text-cyan-300');
                cardTab.classList.remove('text-gray-400', 'hover:text-white');
                bankTab.classList.remove('bg-cyan-500/20', 'text-cyan-300');
                bankTab.classList.add('text-gray-400', 'hover:text-white');
                cardContent.classList.remove('hidden');
                bankContent.classList.add('hidden');
                resetErrors();
            });

            // Initialize variables
            let selectedBankAmount = 0;
            let selectedCardAmount = 0;
            let bankSlipFile = null;
            
            // Bank Donation Amount Selection
            const bankAmountBtns = document.querySelectorAll('.donation-amount-btn');
            const customBankInput = document.getElementById('customDonation');
            const selectedBankAmountSpan = document.getElementById('selectedBankAmount');
            const bankDisplayAmount = document.getElementById('bankDisplayAmount');
            const selectedBankDisplay = document.getElementById('selectedBankDisplay');
            const bankAmountError = document.getElementById('bankAmountError');
            const finalAmountInput = document.getElementById('finalAmount');
            
            // Donor information elements
            const donorName = document.getElementById('donorName');
            const donorEmail = document.getElementById('donorEmail');
            const donorMessage = document.getElementById('donorMessage');
            const donorPhone = document.getElementById('donorPhone');
            const donorAddress = document.getElementById('donorAddress');
            const donorNameError = document.getElementById('donorNameError');
            const donorEmailError = document.getElementById('donorEmailError');
            const bankSlipError = document.getElementById('bankSlipError');
            
            // Card Donation Amount Selection
            const cardAmountBtns = document.querySelectorAll('.card-amount-btn');
            const customCardInput = document.getElementById('customCardAmount');
            const selectedCardAmountSpan = document.getElementById('selectedCardAmount');
            const cardDisplayAmount = document.getElementById('cardDisplayAmount');
            const selectedCardDisplay = document.getElementById('selectedCardDisplay');
            const cardAmountError = document.getElementById('cardAmountError');

            // Card validation elements
            const cardNumber = document.getElementById('cardNumber');
            const expiryDate = document.getElementById('expiryDate');
            const cvc = document.getElementById('cvc');
            const cardName = document.getElementById('cardName');
            const cardNumberError = document.getElementById('cardNumberError');
            const expiryError = document.getElementById('expiryError');
            const cvcError = document.getElementById('cvcError');
            const cardNameError = document.getElementById('cardNameError');

            // Card number formatting
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s/g, '').replace(/\D/g, '');
                let formatted = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formatted += ' ';
                    }
                    formatted += value[i];
                }
                e.target.value = formatted;
            });

            // Expiry date formatting
            expiryDate.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                e.target.value = value;
            });

            // Real-time card number validation
            cardNumber.addEventListener('keyup', function(e) {
                const cleanedValue = e.target.value.replace(/\s/g, '');
                if (cleanedValue.length > 0 && cleanedValue.length < 16) {
                    cardNumberError.textContent = 'Please fill correct account number';
                    cardNumberError.style.display = 'block';
                } else if (cleanedValue.length === 16) {
                    // Check if it's valid digits and passes Luhn
                    if (!/^\d+$/.test(cleanedValue) || !luhnCheck(cleanedValue)) {
                        cardNumberError.textContent = 'Please enter a valid 16-digit card number';
                        cardNumberError.style.display = 'block';
                    } else {
                        cardNumberError.style.display = 'none';
                    }
                } else {
                    cardNumberError.style.display = 'none';
                }
            });

            // Slip display elements
            const submittedSlipDisplay = document.getElementById('submittedSlipDisplay');
            const slipPreview = document.getElementById('slipPreview');
            const transactionIdSpan = document.getElementById('transactionIdSpan');
            const submissionDate = document.getElementById('submissionDate');

            // Function to clear bank selection
            function clearBankSelection() {
                bankAmountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                customBankInput.value = '';
                selectedBankAmount = 0;
                selectedBankAmountSpan.textContent = '$0';
                bankDisplayAmount.textContent = '$0.00';
                finalAmountInput.value = '';
                selectedBankDisplay.classList.add('hidden');
                bankAmountError.style.display = 'none';
            }

            // Function to clear card selection
            function clearCardSelection() {
                cardAmountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                customCardInput.value = '';
                selectedCardAmount = 0;
                selectedCardAmountSpan.textContent = '$0';
                cardDisplayAmount.textContent = '$0.00';
                selectedCardDisplay.classList.add('hidden');
                cardAmountError.style.display = 'none';
            }

            // Update final amount input
            function updateFinalAmount(amount) {
                finalAmountInput.value = amount.toFixed(2);
            }

            // Bank amount buttons
            bankAmountBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    bankAmountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                    btn.classList.add('amount-btn-active');
                    selectedBankAmount = parseFloat(btn.dataset.amount);
                    selectedBankAmountSpan.textContent = '$' + selectedBankAmount.toFixed(2);
                    bankDisplayAmount.textContent = '$' + selectedBankAmount.toFixed(2);
                    updateFinalAmount(selectedBankAmount);
                    selectedBankDisplay.classList.remove('hidden');
                    customBankInput.value = '';
                    bankAmountError.style.display = 'none';
                });
            });

            // Card amount buttons
            cardAmountBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    cardAmountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                    btn.classList.add('amount-btn-active');
                    selectedCardAmount = parseFloat(btn.dataset.amount);
                    selectedCardAmountSpan.textContent = '$' + selectedCardAmount.toFixed(2);
                    cardDisplayAmount.textContent = '$' + selectedCardAmount.toFixed(2);
                    selectedCardDisplay.classList.remove('hidden');
                    customCardInput.value = '';
                    cardAmountError.style.display = 'none';
                });
            });

            // Custom bank amount input
            customBankInput.addEventListener('input', () => {
                bankAmountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                selectedBankAmount = parseFloat(customBankInput.value) || 0;
                selectedBankAmountSpan.textContent = '$' + selectedBankAmount.toFixed(2);
                bankDisplayAmount.textContent = '$' + selectedBankAmount.toFixed(2);
                updateFinalAmount(selectedBankAmount);
                if (selectedBankAmount > 0) {
                    selectedBankDisplay.classList.remove('hidden');
                } else {
                    selectedBankDisplay.classList.add('hidden');
                }
                bankAmountError.style.display = 'none';
            });

            // Custom card amount input
            customCardInput.addEventListener('input', () => {
                cardAmountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                selectedCardAmount = parseFloat(customCardInput.value) || 0;
                selectedCardAmountSpan.textContent = '$' + selectedCardAmount.toFixed(2);
                cardDisplayAmount.textContent = '$' + selectedCardAmount.toFixed(2);
                if (selectedCardAmount > 0) {
                    selectedCardDisplay.classList.remove('hidden');
                } else {
                    selectedCardDisplay.classList.add('hidden');
                }
                cardAmountError.style.display = 'none';
            });

            // Bank slip file handling
            const bankSlipInput = document.getElementById('bankSlip');
            
            bankSlipInput.addEventListener('change', () => {
                if (bankSlipInput.files.length > 0) {
                    bankSlipFile = bankSlipInput.files[0];
                    
                    // Validate file size (5MB)
                    if (bankSlipFile.size > 5 * 1024 * 1024) {
                        alert('File size must be less than 5MB');
                        bankSlipInput.value = '';
                        bankSlipFile = null;
                        bankSlipError.textContent = 'File size must be less than 5MB';
                        bankSlipError.style.display = 'block';
                        return;
                    }
                    
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
                    if (!validTypes.includes(bankSlipFile.type)) {
                        alert('Please upload only JPG, PNG, or PDF files');
                        bankSlipInput.value = '';
                        bankSlipFile = null;
                        bankSlipError.textContent = 'Please upload only JPG, PNG, or PDF files';
                        bankSlipError.style.display = 'block';
                        return;
                    }
                    
                    bankSlipError.style.display = 'none';
                }
            });

            // Validate donor information
            function validateDonorInfo() {
                let isValid = true;
                
                // Reset errors
                donorNameError.style.display = 'none';
                donorEmailError.style.display = 'none';
                
                // Validate name
                if (!donorName.value.trim()) {
                    donorNameError.style.display = 'block';
                    isValid = false;
                }
                
                // Validate email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!donorEmail.value.trim() || !emailRegex.test(donorEmail.value)) {
                    donorEmailError.style.display = 'block';
                    isValid = false;
                }
                
                return isValid;
            }

            // Form validation and submission
            const donateBankForm = document.querySelector('#bankContent form');
            
            donateBankForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate donation amount
                if (selectedBankAmount < 1) {
                    bankAmountError.style.display = 'block';
                    document.getElementById('donateBankBtn').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                
                // Validate donor information
                if (!validateDonorInfo()) {
                    donorName.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                
                // Validate slip upload
                if (!bankSlipFile) {
                    bankSlipError.style.display = 'block';
                    bankSlipInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                
                // All validations passed
                bankAmountError.style.display = 'none';
                bankSlipError.style.display = 'none';
                
                // Show loading state
                const submitBtn = document.getElementById('donateBankBtn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                submitBtn.disabled = true;
                
                // Submit the form
                this.submit();
            });

            // Card donation button
            const donateCardBtn = document.getElementById('donateCardBtn');
            donateCardBtn.addEventListener('click', () => {
                // Validate card details before proceeding
                if (!validateCardDetails()) {
                    return;
                }
                
                if (selectedCardAmount < 1) {
                    cardAmountError.classList.remove('hidden');
                    return;
                }
                
                cardAmountError.classList.add('hidden');
                processCardDonation();
            });

            // Luhn algorithm for card number validation
            function luhnCheck(cardNumber) {
                let sum = 0;
                let shouldDouble = false;
                
                // Loop from right to left
                for (let i = cardNumber.length - 1; i >= 0; i--) {
                    let digit = parseInt(cardNumber.charAt(i));
                    
                    if (shouldDouble) {
                        digit *= 2;
                        if (digit > 9) {
                            digit -= 9;
                        }
                    }
                    
                    sum += digit;
                    shouldDouble = !shouldDouble;
                }
                
                return sum % 10 === 0;
            }

            // Validate card details
            function validateCardDetails() {
                let isValid = true;
                
                // Reset errors
                cardNumberError.style.display = 'none';
                expiryError.style.display = 'none';
                cvcError.style.display = 'none';
                cardNameError.style.display = 'none';
                
                // Validate card number
                const cardNumberValue = cardNumber.value.replace(/\s/g, '');
                if (!cardNumberValue || cardNumberValue.length !== 16 || !/^\d+$/.test(cardNumberValue) || !luhnCheck(cardNumberValue)) {
                    cardNumberError.style.display = 'block';
                    isValid = false;
                }
                
                // Validate expiry date
                const expiryValue = expiryDate.value;
                const expiryRegex = /^(0[1-9]|1[0-2])\/([0-9]{2})$/;
                if (!expiryValue || !expiryRegex.test(expiryValue)) {
                    expiryError.style.display = 'block';
                    isValid = false;
                } else {
                    // Check if expiry is in the future
                    const match = expiryValue.match(/^(\d{2})\/(\d{2})$/);
                    const month = parseInt(match[1]);
                    const year = 2000 + parseInt(match[2]);
                    const expiryDateObj = new Date(year, month - 1);
                    const now = new Date();
                    if (expiryDateObj <= now) {
                        expiryError.style.display = 'block';
                        isValid = false;
                    }
                }
                
                // Validate CVC
                const cvcValue = cvc.value;
                if (!cvcValue || cvcValue.length < 3 || cvcValue.length > 4 || !/^\d+$/.test(cvcValue)) {
                    cvcError.style.display = 'block';
                    isValid = false;
                }
                
                // Validate card name
                if (!cardName.value.trim()) {
                    cardNameError.style.display = 'block';
                    isValid = false;
                }
                
                return isValid;
            }

            // Create slip preview with donor information
            function createSlipPreview(transactionId, currentDate, responseData) {
                if (!bankSlipFile) return;
                
                // Format file size
                function formatFileSize(bytes) {
                    if (bytes < 1024) return bytes + ' bytes';
                    else if (bytes < 1048576) return (bytes / 1024).toFixed(2) + ' KB';
                    else return (bytes / 1048576).toFixed(2) + ' MB';
                }
                
                // Get file extension
                function getFileType(filename) {
                    const ext = filename.split('.').pop().toLowerCase();
                    if (['jpg', 'jpeg', 'png'].includes(ext)) return 'Image';
                    if (ext === 'pdf') return 'PDF Document';
                    return 'File';
                }
                
                // Create slip preview HTML with donor info
                slipPreview.innerHTML = `
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-cyan-500/20">
                                <i class="fas fa-file-invoice text-cyan-400"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold">Payment Slip & Donor Information</h4>
                                <p class="text-sm text-gray-400">Submitted successfully</p>
                            </div>
                        </div>
                        
                        <!-- Donor Information -->
                        <div class="p-4 border bg-gradient-to-r from-cyan-900/20 to-blue-900/20 rounded-xl border-cyan-500/20">
                            <h5 class="mb-3 font-bold text-cyan-300">
                                <i class="mr-2 fas fa-user-circle"></i>
                                Donor Information
                            </h5>
                            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                                <div class="p-3 rounded-lg bg-white/5">
                                    <p class="mb-1 text-xs text-gray-400">Donor Name</p>
                                    <p class="font-medium text-white">${donorName.value}</p>
                                </div>
                                <div class="p-3 rounded-lg bg-white/5">
                                    <p class="mb-1 text-xs text-gray-400">Email</p>
                                    <p class="font-medium text-white">${donorEmail.value}</p>
                                </div>
                            </div>
                            ${donorMessage.value.trim() ? `
                                <div class="p-3 mt-3 rounded-lg bg-white/5">
                                    <p class="mb-1 text-xs text-gray-400">Personal Message</p>
                                    <p class="italic font-medium text-white">"${donorMessage.value}"</p>
                                </div>
                            ` : ''}
                        </div>
                        
                        <!-- Transaction Details -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="p-3 rounded-lg bg-white/5">
                                <p class="mb-1 text-xs text-gray-400">Transaction ID</p>
                                <p class="font-mono font-bold text-cyan-300">${transactionId}</p>
                            </div>
                            <div class="p-3 rounded-lg bg-white/5">
                                <p class="mb-1 text-xs text-gray-400">Donation Amount</p>
                                <p class="text-xl font-bold text-green-400">$${selectedBankAmount.toFixed(2)}</p>
                            </div>
                        </div>
                        
                        <!-- File Details -->
                        <div class="pt-3 space-y-3 border-t border-white/10">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-300">File Name:</span>
                                <span class="font-medium text-white">${bankSlipFile.name}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-300">File Size:</span>
                                <span class="font-medium">${formatFileSize(bankSlipFile.size)}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-300">File Type:</span>
                                <span class="font-medium">${getFileType(bankSlipFile.name)}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-300">Submission Date:</span>
                                <span class="font-medium">${currentDate.toLocaleDateString('en-US', { 
                                    year: 'numeric', 
                                    month: 'long', 
                                    day: 'numeric' 
                                })}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-300">Submission Time:</span>
                                <span class="font-medium">${currentDate.toLocaleTimeString('en-US', { 
                                    hour: '2-digit', 
                                    minute: '2-digit' 
                                })}</span>
                            </div>
                        </div>
                        
                        <!-- File Preview -->
                        <div class="pt-4 mt-4 border-t border-white/10">
                            <p class="mb-2 text-sm text-gray-300">File Preview:</p>
                            <div id="filePreview" class="relative bg-white/5 border border-white/10 rounded-lg p-4 min-h-[100px] flex items-center justify-center">
                                <div class="text-center">
                                    <i class="mb-2 text-4xl text-gray-400 fas fa-file-alt"></i>
                                    <p class="text-sm text-gray-300">${bankSlipFile.name}</p>
                                    <p class="text-xs text-gray-400">${formatFileSize(bankSlipFile.size)}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // If it's an image file, try to show preview
                if (bankSlipFile.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const filePreview = document.getElementById('filePreview');
                        filePreview.innerHTML = `
                            <img src="${e.target.result}" 
                                 alt="Payment Slip Preview" 
                                 class="object-contain h-auto max-w-full rounded-lg max-h-48">
                        `;
                    };
                    reader.readAsDataURL(bankSlipFile);
                }
            }

            // Process card donation
            function processCardDonation() {
                // In a real app, you would integrate with a payment processor like Stripe
                const donationData = {
                    amount: selectedCardAmount,
                    method: 'card_payment',
                    cardLast4: cardNumber.value.slice(-4),
                    timestamp: new Date().toISOString()
                };
                
                console.log('Card Donation Submitted:', donationData);
                
                // Show success message
                alert(`Thank you for your donation of $${selectedCardAmount.toFixed(2)}! Your payment has been processed successfully.`);
                
                // Reset form
                clearCardSelection();
                cardNumber.value = '';
                expiryDate.value = '';
                cvc.value = '';
                cardName.value = '';
                
                // Reset errors
                cardNumberError.classList.add('hidden');
                expiryError.classList.add('hidden');
                cvcError.classList.add('hidden');
                cardNameError.classList.add('hidden');
            }

            // Reset error messages
            function resetErrors() {
                bankAmountError.style.display = 'none';
                cardAmountError.style.display = 'none';
                cardNumberError.style.display = 'none';
                expiryError.style.display = 'none';
                cvcError.style.display = 'none';
                cardNameError.style.display = 'none';
                donorNameError.style.display = 'none';
                donorEmailError.style.display = 'none';
                bankSlipError.style.display = 'none';
            }

            // Language selector functionality
            document.querySelectorAll('.language-option, .mobile-language-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const lang = btn.dataset.lang;
                    alert(`Language changed to ${getLanguageName(lang)}`);
                    // In a real app, you would set the language here
                });
            });

            function getLanguageName(code) {
                const languages = {
                    'en': 'English',
                    'es': 'Español',
                    'fr': 'Français',
                    'de': 'Deutsch',
                    'ja': '日本語',
                    'si': 'සිංහල'
                };
                return languages[code] || 'English';
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                        
                        // Close mobile menu if open
                        mobileMenu.classList.add('hidden');
                    }
                });
            });

            // Placeholder functions for Report and Login
            function reportAnimal() {
                alert('Redirecting to Report Animal Form...');
                window.location.href = 'report-animal.html';
            }

            function openLogin() {
                alert('Opening Login Modal...');
                // Open your login modal here
            }

            // Initialize with default selection
            window.addEventListener('DOMContentLoaded', () => {
                // Select first bank amount button by default
                if (bankAmountBtns.length > 0) {
                    bankAmountBtns[0].click();
                }
                if (cardAmountBtns.length > 0) {
                    cardAmountBtns[0].click();
                }
                
                // Add amount-btn-active class for styling
                const amountBtns = document.querySelectorAll('.donation-amount-btn, .card-amount-btn');
                amountBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        amountBtns.forEach(b => b.classList.remove('amount-btn-active'));
                        this.classList.add('amount-btn-active');
                    });
                });
            });
        </script>
    </body>
</html>