<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                        <a href="#home" class="nav-link active">Home</a>
                        <a href="#about" class="nav-link">About</a>
                        
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
                                <a href="#donate" class="dropdown-item">
                                    <i class="mr-3 fas fa-donate text-cyan-400"></i>
                                    Donate
                                </a>
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
                            <!-- Report Animal Button -->
                            <button class="report-btn" onclick="reportAnimal()">
                                <i class="fas fa-exclamation-triangle"></i>
                                Report Animal
                            </button>

                            <!-- Donate Button -->
                            <a href="#donate" class="border small-btn bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
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
                    <a href="#home" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Home</a>
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
                        
                        <a href="#donate" class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/30 text-cyan-300 hover:text-white text-sm">
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
                    <div class="stagger-animation">
                        <h1 class="mb-6 title">
                            A <span class="gradient-text">Better World</span> for Every Paw
                        </h1>
                        <p class="mb-10 subtitle">
                            Join our community dedicated to rescuing, protecting, and finding loving homes for animals in need. Every life matters.
                        </p>
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <!-- Also updated in hero section -->
                            <button class="primary-btn animate-pulse-glow" onclick="alert('Adoption feature coming soon!')">
                                <i class="fas fa-heart"></i>
                                Adopt a Friend
                            </button>
                            <a href="#volunteer" class="secondary-btn">
                                <i class="fas fa-hands-helping"></i>
                                Become a Volunteer
                            </a>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-6 mt-12">
                            <div class="text-center">
                                <div class="stats-counter" data-count="2500">0</div>
                                <p class="text-gray-300">Animals Rescued</p>
                            </div>
                            <div class="text-center">
                                <div class="stats-counter" data-count="1200">0</div>
                                <p class="text-gray-300">Successful Adoptions</p>
                            </div>
                            <div class="text-center">
                                <div class="stats-counter" data-count="500">0</div>
                                <p class="text-gray-300">Active Volunteers</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="relative z-10">
                            <img src="https://images.unsplash.com/photo-1518791841217-8f162f1e1131?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=3a5a1d5c6b2e9596d3e214d2f0c7a2e2" 
                                 alt="Happy dogs together" 
                                 class="rounded-3xl shadow-2xl shadow-cyan-500/20 w-full h-[500px] object-cover">
                        </div>
                        <div class="absolute w-64 h-64 -bottom-6 -right-6 gradient-bg rounded-3xl -z-10 animate-float"></div>
                        <div class="absolute w-48 h-48 -top-6 -left-6 bg-purple-500/30 rounded-3xl -z-10 animate-float" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 scroll-indicator"></div>
        </section>

        <!-- About Section -->
        <section id="about" class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Our Mission & Vision</h2>
                    <p class="section-subtitle">
                        Creating a compassionate world where every animal is safe, healthy, and loved
                    </p>
                </div>

                <div class="grid gap-8 md:grid-cols-2">
                    <div class="card">
                        <div class="feature-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold">Our Mission</h3>
                        <p class="mb-4 text-gray-300">
                            To rescue, rehabilitate, and rehome animals in distress while promoting responsible pet ownership through education and community outreach.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3">
                                <i class="text-cyan-400 fas fa-check-circle"></i>
                                <span>Provide immediate medical care to injured animals</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="text-cyan-400 fas fa-check-circle"></i>
                                <span>Find loving forever homes for abandoned pets</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="text-cyan-400 fas fa-check-circle"></i>
                                <span>Educate communities about animal welfare</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="text-cyan-400 fas fa-check-circle"></i>
                                <span>Advocate for animal rights and protection laws</span>
                            </li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="feature-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold">Our Vision</h3>
                        <p class="mb-4 text-gray-300">
                            A world where no animal suffers from neglect, abuse, or homelessness, and where humans and animals coexist in harmony.
                        </p>
                        <div class="p-6 mt-6 rounded-xl bg-gradient-to-r from-cyan-900/30 to-blue-900/30">
                            <h4 class="mb-3 text-xl font-bold">Our Core Values</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-3 rounded-lg bg-white/5">
                                    <i class="mb-2 text-cyan-400 fas fa-heart"></i>
                                    <p class="font-medium">Compassion</p>
                                </div>
                                <div class="p-3 rounded-lg bg-white/5">
                                    <i class="mb-2 text-cyan-400 fas fa-shield-alt"></i>
                                    <p class="font-medium">Protection</p>
                                </div>
                                <div class="p-3 rounded-lg bg-white/5">
                                    <i class="mb-2 text-cyan-400 fas fa-handshake"></i>
                                    <p class="font-medium">Community</p>
                                </div>
                                <div class="p-3 rounded-lg bg-white/5">
                                    <i class="mb-2 text-cyan-400 fas fa-star"></i>
                                    <p class="font-medium">Excellence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Work Section -->
        <section id="work" class="section-padding">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Our Impactful Work</h2>
                    <p class="section-subtitle">
                        Making a difference in the lives of animals through comprehensive programs and initiatives
                    </p>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Rescue & Rehabilitation</h3>
                        <p class="text-gray-300">Emergency response teams rescue injured and abandoned animals, providing immediate medical care.</p>
                    </div>

                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Adoption Program</h3>
                        <p class="text-gray-300">Matching rescued animals with loving forever homes through careful screening and follow-up.</p>
                    </div>

                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Medical Care</h3>
                        <p class="text-gray-300">Complete veterinary services including vaccinations, sterilization, and specialized treatments.</p>
                    </div>

                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Education</h3>
                        <p class="text-gray-300">Community workshops and school programs promoting responsible pet ownership and animal welfare.</p>
                    </div>
                </div>

                <div class="grid gap-8 mt-12 md:grid-cols-2">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Animal shelter" 
                             class="object-cover w-full h-64 mb-6 rounded-xl">
                        <h3 class="mb-3 text-2xl font-bold">Our Shelter Facilities</h3>
                        <p class="text-gray-300">State-of-the-art shelter with separate areas for dogs, cats, and special needs animals. Features include climate control, outdoor play areas, and isolation wards for sick animals.</p>
                    </div>

                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Veterinary care" 
                             class="object-cover w-full h-64 mb-6 rounded-xl">
                        <h3 class="mb-3 text-2xl font-bold">Veterinary Clinic</h3>
                        <p class="text-gray-300">Fully equipped veterinary clinic with surgery facilities, diagnostic equipment, and pharmacy. Staffed by licensed veterinarians and trained technicians.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pets for Adoption Section -->
        <section id="adopt" class="section-padding bg-gradient-to-b from-transparent to-cyan-900/10">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Meet Our Furry Friends</h2>
                    <p class="section-subtitle">
                        These wonderful animals are waiting for their forever homes. Could you be their perfect match?
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Pet 1 -->
                    <div class="pet-card">
                        <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Golden Retriever" 
                             class="object-cover w-full h-80">
                        <div class="pet-info">
                            <h3 class="text-xl font-bold">Max</h3>
                            <p class="text-gray-300">Golden Retriever • 2 years • Male</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">Friendly</span>
                                <a href="#" class="text-cyan-400 hover:text-cyan-300">
                                    Meet Max <i class="ml-1 fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Pet 2 -->
                    <div class="pet-card">
                        <img src="https://images.unsplash.com/photo-1561948955-570b270e7c36?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Cat" 
                             class="object-cover w-full h-80">
                        <div class="pet-info">
                            <h3 class="text-xl font-bold">Luna</h3>
                            <p class="text-gray-300">Domestic Shorthair • 1 year • Female</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">Playful</span>
                                <a href="#" class="text-cyan-400 hover:text-cyan-300">
                                    Meet Luna <i class="ml-1 fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Pet 3 -->
                    <div class="pet-card">
                        <img src="https://images.unsplash.com/photo-1588943211346-0908a1fb0b01?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Puppy" 
                             class="object-cover w-full h-80">
                        <div class="pet-info">
                            <h3 class="text-xl font-bold">Buddy</h3>
                            <p class="text-gray-300">Mixed Breed • 8 months • Male</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">Energetic</span>
                                <a href="#" class="text-cyan-400 hover:text-cyan-300">
                                    Meet Buddy <i class="ml-1 fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Pet 4 -->
                    <div class="pet-card">
                        <img src="https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Senior Dog" 
                             class="object-cover w-full h-80">
                        <div class="pet-info">
                            <h3 class="text-xl font-bold">Charlie</h3>
                            <p class="text-gray-300">Labrador Mix • 7 years • Male</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="px-3 py-1 text-sm rounded-full bg-cyan-500/20 text-cyan-400">Calm</span>
                                <a href="#" class="text-cyan-400 hover:text-cyan-300">
                                    Meet Charlie <i class="ml-1 fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 text-center">
                    <!-- Also updated in this button -->
                    <button class="primary-btn" onclick="alert('Adoption feature coming soon!')">
                        <i class="mr-2 fas fa-paw"></i>
                        View All Available Pets
                    </button>
                </div>
            </div>
        </section>

        <!-- Success Stories Section -->
        <section id="success" class="section-padding">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Heartwarming Success Stories</h2>
                    <p class="section-subtitle">
                        Real stories of hope, healing, and happy endings from our SafePaws family
                    </p>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    <div class="testimonial-card">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b786d4b9?q=80&w=200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                                 alt="Sarah Johnson" 
                                 class="w-16 h-16 rounded-full">
                            <div>
                                <h4 class="font-bold">Sarah Johnson</h4>
                                <p class="text-sm text-gray-400">Adopted Bella in 2023</p>
                            </div>
                        </div>
                        <p class="mb-4 text-gray-300">
                            "When we adopted Bella, she was scared and malnourished. The SafePaws team provided amazing support throughout her recovery. Today, she's the happiest dog, full of life and love."
                        </p>
                        <div class="flex text-cyan-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="testimonial-card">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                                 alt="Michael Chen" 
                                 class="w-16 h-16 rounded-full">
                            <div>
                                <h4 class="font-bold">Michael Chen</h4>
                                <p class="text-sm text-gray-400">Volunteer since 2021</p>
                            </div>
                        </div>
                        <p class="mb-4 text-gray-300">
                            "Volunteering at SafePaws has been life-changing. Seeing animals transform from scared and injured to happy and healthy is the most rewarding experience. The team is like family."
                        </p>
                        <div class="flex text-cyan-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="testimonial-card">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                                 alt="Priya Sharma" 
                                 class="w-16 h-16 rounded-full">
                            <div>
                                <h4 class="font-bold">Priya Sharma</h4>
                                <p class="text-sm text-gray-400">Foster parent for 5 cats</p>
                            </div>
                        </div>
                        <p class="mb-4 text-gray-300">
                            "Fostering cats through SafePaws has been incredible. They provide all the supplies and medical care needed. Watching these beautiful creatures heal and find forever homes brings me so much joy."
                        </p>
                        <div class="flex text-cyan-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Get Involved Section -->
        <section id="involve" class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Ways to Get Involved</h2>
                    <p class="section-subtitle">
                        Join our mission to create a better world for animals. Every contribution makes a difference.
                    </p>
                </div>

                <div class="grid gap-8 md:grid-cols-4">
                    <div class="text-center card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Volunteer</h3>
                        <p class="mb-4 text-gray-300">Help with animal care, events, administration, or fundraising.</p>
                        <a href="#volunteer" class="text-cyan-400 hover:text-cyan-300">
                            Learn More <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="text-center card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Foster</h3>
                        <p class="mb-4 text-gray-300">Provide temporary homes for animals awaiting adoption.</p>
                        <a href="#foster" class="text-cyan-400 hover:text-cyan-300">
                            Become a Foster <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="text-center card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-donate"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Donate</h3>
                        <p class="mb-4 text-gray-300">Support our work with one-time or monthly contributions.</p>
                        <a href="#donate" class="text-cyan-400 hover:text-cyan-300">
                            Donate Now <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="text-center card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Sponsor</h3>
                        <p class="mb-4 text-gray-300">Sponsor an animal's care until they find their forever home.</p>
                        <a href="#sponsor" class="text-cyan-400 hover:text-cyan-300">
                            Sponsor Today <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="max-w-3xl mx-auto mt-12">
                    <div class="p-8 rounded-2xl gradient-bg">
                        <h3 class="mb-4 text-2xl font-bold text-center">Corporate Partnerships</h3>
                        <p class="mb-6 text-center text-cyan-50">
                            Join companies like PetCo, Blue Buffalo, and Amazon in supporting our mission through sponsorships, employee volunteer programs, and matching gifts.
                        </p>
                        <div class="text-center">
                            <a href="#partnership" class="px-8 py-3 font-medium bg-white rounded-full text-cyan-600 hover:bg-gray-100">
                                Explore Partnership Opportunities
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="section-padding">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Meet Our Team</h2>
                    <p class="section-subtitle">
                        Passionate professionals and volunteers dedicated to animal welfare
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Dr. Sarah Miller" 
                             class="team-img">
                        <h3 class="mb-2 text-xl font-bold">Dr. Sarah Miller</h3>
                        <p class="mb-3 text-gray-400">Head Veterinarian</p>
                        <p class="text-sm text-gray-300">15+ years of veterinary experience specializing in rescue medicine.</p>
                    </div>

                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="James Wilson" 
                             class="team-img">
                        <h3 class="mb-2 text-xl font-bold">James Wilson</h3>
                        <p class="mb-3 text-gray-400">Rescue Operations Director</p>
                        <p class="text-sm text-gray-300">Leads our emergency response and field rescue teams.</p>
                    </div>

                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="Maria Garcia" 
                             class="team-img">
                        <h3 class="mb-2 text-xl font-bold">Maria Garcia</h3>
                        <p class="mb-3 text-gray-400">Adoption Coordinator</p>
                        <p class="text-sm text-gray-300">Matches animals with perfect forever homes since 2018.</p>
                    </div>

                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                             alt="David Chen" 
                             class="team-img">
                        <h3 class="mb-2 text-xl font-bold">David Chen</h3>
                        <p class="mb-3 text-gray-400">Volunteer Manager</p>
                        <p class="text-sm text-gray-300">Coordinates 500+ volunteers across all our programs.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="section-padding bg-gradient-to-r from-cyan-900/30 to-blue-900/30">
            <div class="text-center container-custom">
                <h2 class="mb-6 section-title">Ready to Make a Difference?</h2>
                <p class="max-w-2xl mx-auto mb-10 section-subtitle">
                    Join thousands of others who are helping us create a better world for animals
                </p>
                
                <div class="flex flex-col justify-center gap-6 sm:flex-row">
                    <!-- Also updated in CTA section -->
                    <button class="primary-btn" onclick="alert('Adoption feature coming soon!')">
                        <i class="mr-2 fas fa-heart"></i>
                        Adopt a Pet
                    </button>
                    <a href="#volunteer" class="secondary-btn">
                        <i class="mr-2 fas fa-hands-helping"></i>
                        Become a Volunteer
                    </a>
                    <a href="#donate" class="secondary-btn">
                        <i class="mr-2 fas fa-donate"></i>
                        Make a Donation
                    </a>
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
                            © <span id="current-year"></span> SafePaws. All rights reserved. | 
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

        <!-- Back to Top Button -->
        <button id="back-to-top" class="fixed flex items-center justify-center hidden w-12 h-12 text-white transition-all duration-300 rounded-full shadow-lg bottom-8 right-8 gradient-bg shadow-cyan-500/30 hover:scale-110">
            <i class="fas fa-arrow-up"></i>
        </button>

        <script>
            // Set current year in footer
            document.getElementById('current-year').textContent = new Date().getFullYear();

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    mobileMenuBtn.innerHTML = mobileMenu.classList.contains('hidden') 
                        ? '<i class="fas fa-bars"></i>' 
                        : '<i class="fas fa-times"></i>';
                });
            }

            // Back to top button
            const backToTopBtn = document.getElementById('back-to-top');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('hidden');
                } else {
                    backToTopBtn.classList.add('hidden');
                }
            });
            
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Animated counters
            function animateCounter(element, target) {
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current);
                }, 20);
            }
            
            // Start counters when in viewport
            const observerOptions = {
                threshold: 0.5
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = document.querySelectorAll('.stats-counter');
                        counters.forEach(counter => {
                            const target = parseInt(counter.getAttribute('data-count'));
                            animateCounter(counter, target);
                        });
                        observer.disconnect();
                    }
                });
            }, observerOptions);
            
            const statsSection = document.querySelector('#home');
            if (statsSection) {
                observer.observe(statsSection);
            }
            
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Close mobile menu if open
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                            mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                        }
                        
                        // Scroll to target
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Add active class to nav links on scroll
            const sections = document.querySelectorAll('section[id]');
            
            window.addEventListener('scroll', () => {
                let current = '';
                const scrollPosition = window.scrollY + 100;
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        current = section.getAttribute('id');
                    }
                });
                
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${current}`) {
                        link.classList.add('active');
                    }
                });
            });
        </script>
    </body>
</html>