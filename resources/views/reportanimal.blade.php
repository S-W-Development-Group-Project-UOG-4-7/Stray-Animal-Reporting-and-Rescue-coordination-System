<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Report Animal - SafePaws</title>
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

            /* Progress Bar Styles for Report Form */
            .progress-bar {
                height: 4px;
                background: linear-gradient(90deg, #0ea5e9, #22d3ee);
                border-radius: 2px;
                transition: width 0.5s ease;
            }

            .step-indicator {
                @apply w-10 h-10 rounded-full flex items-center justify-center text-white font-bold transition-all duration-300;
            }

            .step-indicator.active {
                @apply gradient-bg shadow-lg shadow-cyan-500/30;
            }

            .step-indicator.completed {
                @apply bg-green-500;
            }

            .form-step {
                @apply animate-slide-in;
            }

            .required-field::after {
                content: ' *';
                color: #f87171;
            }

            .file-upload-area {
                @apply border-2 border-dashed border-cyan-500/30 rounded-2xl p-8 text-center cursor-pointer transition-all duration-300 hover:border-cyan-500 hover:bg-cyan-500/5;
            }

            .success-checkmark {
                width: 80px;
                height: 80px;
                margin: 0 auto;
                border-radius: 50%;
                background: linear-gradient(135deg, #0ea5e9, #22d3ee);
                display: flex;
                align-items: center;
                justify-content: center;
                animation: pulse-glow 2s infinite;
            }

            .success-checkmark::after {
                content: '✓';
                color: white;
                font-size: 40px;
                font-weight: bold;
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
                    <a href="index.html" class="flex items-center gap-3">
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
                        <a href="index.html" class="nav-link">Home</a>
                        <a href="index.html#about" class="nav-link">About</a>
                        
                        <div class="relative dropdown">
                            <button class="flex items-center gap-1 nav-link">
                                Our Work <i class="text-xs fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="index.html#sterilization" class="dropdown-item">
                                    <i class="mr-3 fas fa-stethoscope text-cyan-400"></i>
                                    Sterilization & Vaccination
                                </a>
                                <a href="index.html#rescue" class="dropdown-item">
                                    <i class="mr-3 fas fa-heart text-cyan-400"></i>
                                    Rescue Operations
                                </a>
                                <a href="index.html#adoption" class="dropdown-item">
                                    <i class="mr-3 fas fa-home text-cyan-400"></i>
                                    Adoption Programs
                                </a>
                                <a href="index.html#shelters" class="dropdown-item">
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
                                <a href="index.html#volunteer" class="dropdown-item">
                                    <i class="mr-3 fas fa-hands-helping text-cyan-400"></i>
                                    Volunteer
                                </a>
                                <a href="index.html#donate" class="dropdown-item">
                                    <i class="mr-3 fas fa-donate text-cyan-400"></i>
                                    Donate
                                </a>
                                <a href="index.html#foster" class="dropdown-item">
                                    <i class="mr-3 fas fa-heartbeat text-cyan-400"></i>
                                    Foster
                                </a>
                                <a href="index.html#sponsor" class="dropdown-item">
                                    <i class="mr-3 fas fa-star text-cyan-400"></i>
                                    Sponsor
                                </a>
                            </div>
                        </div>

                        <a href="index.html#success" class="nav-link">Success Stories</a>
                        <a href="index.html#contact" class="nav-link">Contact</a>
                        
                        <!-- Navigation Actions - Beautifully Arranged -->
                        <div class="nav-actions">
                            <!-- Report Animal Button - Active on this page -->
                            <button class="report-btn active" onclick="window.location.href='report-animal.html'">
                                <i class="fas fa-exclamation-triangle"></i>
                                Report Animal
                            </button>

                            <!-- Donate Button -->
                            <a href="index.html#donate" class="border small-btn bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
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
                    <a href="index.html" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Home</a>
                    <a href="index.html#about" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">About</a>
                    <a href="index.html#work" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Our Work</a>
                    <a href="index.html#involve" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Get Involved</a>
                    <a href="index.html#success" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Success Stories</a>
                    <a href="index.html#contact" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Contact</a>
                    
                    <!-- Action Buttons for Mobile -->
                    <div class="pt-3 mt-3 space-y-2 border-t border-white/10">
                        <button class="justify-center w-full report-btn active" onclick="window.location.href='report-animal.html'">
                            <i class="fas fa-exclamation-triangle"></i>
                            Report Animal
                        </button>
                        
                        <a href="index.html#donate" class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/30 text-cyan-300 hover:text-white text-sm">
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

        <!-- Hero Section for Report Page -->
        <section id="report-hero" class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
            <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
            <div class="px-5 container-custom">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="stagger-animation">
                        <h1 class="mb-6 title">
                            Report an Animal in <span class="gradient-text">Need</span>
                        </h1>
                        <p class="mb-10 subtitle">
                            Your report could save a life. Help us rescue animals by providing accurate information. Our team responds 24/7 to emergency calls.
                        </p>
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <a href="#report-form" class="primary-btn animate-pulse-glow">
                                <i class="fas fa-pencil-alt"></i>
                                Fill Report Form
                            </a>
                            <a href="#emergency" class="secondary-btn">
                                <i class="fas fa-phone"></i>
                                Emergency Hotline
                            </a>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-6 mt-12">
                            <div class="text-center">
                                <div class="stats-counter" data-count="98">0</div>
                                <p class="text-gray-300">Rescue Success Rate</p>
                            </div>
                            <div class="text-center">
                                <div class="stats-counter" data-count="45">0</div>
                                <p class="text-gray-300">Avg Response Time (min)</p>
                            </div>
                            <div class="text-center">
                                <div class="stats-counter" data-count="5000">0</div>
                                <p class="text-gray-300">Reports This Year</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="relative z-10">
                            <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3" 
                                 alt="Rescue team with dog" 
                                 class="rounded-3xl shadow-2xl shadow-cyan-500/20 w-full h-[500px] object-cover">
                        </div>
                        <div class="absolute w-64 h-64 -bottom-6 -right-6 gradient-bg rounded-3xl -z-10 animate-float"></div>
                        <div class="absolute w-48 h-48 -top-6 -left-6 bg-red-500/30 rounded-3xl -z-10 animate-float" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 scroll-indicator"></div>
        </section>

        <!-- Emergency Contact Section -->
        <section id="emergency" class="section-padding bg-gradient-to-b from-red-900/20 to-transparent">
            <div class="container-custom">
                <div class="max-w-4xl mx-auto">
                    <div class="p-8 text-center border bg-gradient-to-r from-red-500/20 to-red-600/20 rounded-3xl border-red-500/30">
                        <div class="mx-auto mb-6 feature-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3 class="mb-4 text-3xl font-bold text-red-400">Emergency Hotline</h3>
                        <p class="mb-6 text-xl">
                            <i class="mr-2 fas fa-phone"></i>
                            <span class="text-2xl font-bold">(555) 911-ANIMAL</span>
                        </p>
                        <p class="mb-6 text-gray-300">
                            Call immediately if the animal is in immediate danger, severely injured, or showing aggressive behavior.
                        </p>
                        <div class="flex flex-col justify-center gap-4 sm:flex-row">
                            <a href="tel:555911264625" class="bg-red-500 primary-btn hover:bg-red-600">
                                <i class="fas fa-phone"></i>
                                Call Emergency Line
                            </a>
                            <button onclick="copyEmergencyNumber()" class="text-red-400 border-red-500 secondary-btn hover:bg-red-500 hover:text-white">
                                <i class="fas fa-copy"></i>
                                Copy Number
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Report Form Section -->
        <section id="report-form" class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Report an Animal in Need</h2>
                    <p class="section-subtitle">
                        Please fill out this form with as much detail as possible. Your information helps us respond quickly and effectively.
                    </p>
                </div>

                <!-- Multi-step Form -->
                <div class="max-w-4xl mx-auto">
                    <!-- Form Steps Indicator -->
                    <div class="mb-12">
                        <div class="relative flex items-center justify-between">
                            <div class="absolute left-0 right-0 h-1 -translate-y-1/2 top-1/2 bg-white/10 -z-10"></div>
                            <div id="form-progress" class="absolute left-0 -translate-y-1/2 progress-bar top-1/2 -z-10" style="width: 25%"></div>
                            
                            <div class="z-10 flex flex-col items-center">
                                <div class="step-indicator active">1</div>
                                <span class="mt-2 text-sm">Animal Type</span>
                            </div>
                            <div class="z-10 flex flex-col items-center">
                                <div class="step-indicator">2</div>
                                <span class="mt-2 text-sm text-gray-400">Details</span>
                            </div>
                            <div class="z-10 flex flex-col items-center">
                                <div class="step-indicator">3</div>
                                <span class="mt-2 text-sm text-gray-400">Location</span>
                            </div>
                            <div class="z-10 flex flex-col items-center">
                                <div class="step-indicator">4</div>
                                <span class="mt-2 text-sm text-gray-400">Submit</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Steps -->
                    <form id="animal-report-form" class="space-y-8">
                        <!-- Step 1: Animal Type -->
                        <div id="step-1" class="form-step card">
                            <h3 class="mb-6 text-2xl font-bold gradient-text">1. Select Animal Type</h3>
                            
                            <div class="grid gap-6 mb-8 md:grid-cols-2">
                                <div class="animal-type-option">
                                    <input type="radio" id="aggressive" name="animal_type" value="Aggressive" class="hidden peer" required>
                                    <label for="aggressive" class="transition-all duration-300 cursor-pointer card peer-checked:border-red-500 peer-checked:bg-red-500/10">
                                        <div class="flex items-center gap-4">
                                            <div class="feature-icon bg-gradient-to-r from-red-500 to-orange-500">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Aggressive/Dangerous</h4>
                                                <p class="text-sm text-gray-300">Animal shows signs of aggression or poses immediate danger</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="animal-type-option">
                                    <input type="radio" id="sick" name="animal_type" value="Sick/Injured" class="hidden peer" required>
                                    <label for="sick" class="transition-all duration-300 cursor-pointer card peer-checked:border-cyan-500 peer-checked:bg-cyan-500/10">
                                        <div class="flex items-center gap-4">
                                            <div class="feature-icon">
                                                <i class="fas fa-heartbeat"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Sick/Injured</h4>
                                                <p class="text-sm text-gray-300">Animal appears ill, wounded, or in visible distress</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="animal-type-option">
                                    <input type="radio" id="stray" name="animal_type" value="Stray/Lost" class="hidden peer" required>
                                    <label for="stray" class="transition-all duration-300 cursor-pointer card peer-checked:border-cyan-500 peer-checked:bg-cyan-500/10">
                                        <div class="flex items-center gap-4">
                                            <div class="feature-icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Stray/Lost</h4>
                                                <p class="text-sm text-gray-300">Animal appears lost or without visible owner/caretaker</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="animal-type-option">
                                    <input type="radio" id="abandoned" name="animal_type" value="Abandoned" class="hidden peer" required>
                                    <label for="abandoned" class="transition-all duration-300 cursor-pointer card peer-checked:border-cyan-500 peer-checked:bg-cyan-500/10">
                                        <div class="flex items-center gap-4">
                                            <div class="feature-icon">
                                                <i class="fas fa-sad-tear"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Abandoned</h4>
                                                <p class="text-sm text-gray-300">Animal left behind by owner or in abandonment situation</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" class="primary-btn next-step" data-next="2">
                                    Next Step
                                    <i class="ml-2 fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Details & Image -->
                        <div id="step-2" class="hidden form-step card">
                            <h3 class="mb-6 text-2xl font-bold gradient-text">2. Animal Details & Photo</h3>
                            
                            <!-- Image Upload -->
                            <div class="mb-8">
                                <label class="block mb-4 text-lg font-bold required-field">Upload Animal Photo</label>
                                <p class="mb-6 text-gray-300">A clear photo helps our team identify and locate the animal faster.</p>
                                
                                <div id="file-upload-area" class="file-upload-area">
                                    <i class="mb-4 text-4xl fas fa-cloud-upload-alt text-cyan-400"></i>
                                    <p class="mb-2 text-lg font-medium">Drag & drop your photo here</p>
                                    <p class="mb-4 text-gray-400">or click to browse files</p>
                                    <p class="text-sm text-gray-500">Supports JPG, PNG, WEBP (Max 5MB)</p>
                                    <input type="file" id="animal_photo" name="animal_photo" accept="image/*" class="hidden" required>
                                </div>
                                
                                <div id="file-preview" class="hidden mt-6">
                                    <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                                        <div class="flex items-center gap-4">
                                            <img id="image-preview" class="object-cover w-20 h-20 rounded-lg" src="" alt="Preview">
                                            <div>
                                                <p id="file-name" class="font-medium"></p>
                                                <p id="file-size" class="text-sm text-gray-400"></p>
                                            </div>
                                        </div>
                                        <button type="button" id="remove-image" class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div id="image-error" class="hidden mt-2 text-sm text-red-400">
                                    Please upload a photo of the animal
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div class="mb-8">
                                <label for="description" class="block mb-4 text-lg font-bold required-field">Description & Notes</label>
                                <textarea id="description" name="description" rows="5" 
                                          class="w-full p-4 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30"
                                          placeholder="Describe the animal's size, color, breed, behavior, visible injuries, and any other important details..."
                                          required></textarea>
                                <div id="description-error" class="hidden mt-2 text-sm text-red-400">
                                    Please provide a description of the animal
                                </div>
                            </div>
                            
                            <div class="flex justify-between">
                                <button type="button" class="secondary-btn prev-step" data-prev="1">
                                    <i class="mr-2 fas fa-arrow-left"></i>
                                    Previous
                                </button>
                                <button type="button" class="primary-btn next-step" data-next="3">
                                    Next Step
                                    <i class="ml-2 fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Location & Time -->
                        <div id="step-3" class="hidden form-step card">
                            <h3 class="mb-6 text-2xl font-bold gradient-text">3. Location & Time Details</h3>
                            
                            <div class="grid gap-8 md:grid-cols-2">
                                <!-- Location -->
                                <div>
                                    <label for="location" class="block mb-4 text-lg font-bold required-field">Location</label>
                                    <div class="relative">
                                        <i class="absolute fas fa-map-marker-alt left-4 top-4 text-cyan-400"></i>
                                        <input type="text" id="location" name="location" 
                                               class="w-full py-4 pl-12 pr-4 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30"
                                               placeholder="Enter address, landmark, or coordinates"
                                               required>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-300">
                                        <i class="mr-1 fas fa-info-circle text-cyan-400"></i>
                                        Be as specific as possible for faster response
                                    </p>
                                    <div id="location-error" class="hidden mt-2 text-sm text-red-400">
                                        Please provide the location
                                    </div>
                                </div>
                                
                                <!-- Last Seen -->
                                <div>
                                    <label for="last_seen" class="block mb-4 text-lg font-bold required-field">Last Seen Date & Time</label>
                                    <div class="relative">
                                        <i class="absolute fas fa-clock left-4 top-4 text-cyan-400"></i>
                                        <input type="datetime-local" id="last_seen" name="last_seen" 
                                               class="w-full py-4 pl-12 pr-4 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30"
                                               required>
                                    </div>
                                    <div id="last-seen-error" class="hidden mt-2 text-sm text-red-400">
                                        Please provide when you last saw the animal
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contact Information -->
                            <div class="mt-8">
                                <h4 class="mb-6 text-xl font-bold">Your Contact Information (Optional)</h4>
                                <p class="mb-6 text-gray-300">Providing contact info helps us follow up if we need more details.</p>
                                
                                <div class="grid gap-6 md:grid-cols-3">
                                    <div>
                                        <label for="contact_name" class="block mb-2 font-medium">Your Name</label>
                                        <input type="text" id="contact_name" name="contact_name" 
                                               class="w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                                               placeholder="Optional">
                                    </div>
                                    <div>
                                        <label for="contact_phone" class="block mb-2 font-medium">Phone Number</label>
                                        <input type="tel" id="contact_phone" name="contact_phone" 
                                               class="w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                                               placeholder="Optional">
                                    </div>
                                    <div>
                                        <label for="contact_email" class="block mb-2 font-medium">Email Address</label>
                                        <input type="email" id="contact_email" name="contact_email" 
                                               class="w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                                               placeholder="Optional">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between mt-8">
                                <button type="button" class="secondary-btn prev-step" data-prev="2">
                                    <i class="mr-2 fas fa-arrow-left"></i>
                                    Previous
                                </button>
                                <button type="button" class="primary-btn next-step" data-next="4">
                                    Next Step
                                    <i class="ml-2 fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 4: Review & Submit -->
                        <div id="step-4" class="hidden form-step card">
                            <h3 class="mb-6 text-2xl font-bold gradient-text">4. Review & Submit Report</h3>
                            
                            <div class="mb-8">
                                <div class="mb-6 card bg-white/5">
                                    <h4 class="mb-4 text-xl font-bold">Report Summary</h4>
                                    <div class="space-y-4">
                                        <div class="grid gap-4 md:grid-cols-2">
                                            <div>
                                                <p class="text-gray-400">Animal Type</p>
                                                <p id="review-type" class="font-bold">-</p>
                                            </div>
                                            <div>
                                                <p class="text-gray-400">Location</p>
                                                <p id="review-location" class="font-bold">-</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-gray-400">Last Seen</p>
                                            <p id="review-last-seen" class="font-bold">-</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-400">Description</p>
                                            <p id="review-description" class="font-bold">-</p>
                                        </div>
                                        <div id="review-contact" class="hidden">
                                            <p class="text-gray-400">Contact Information</p>
                                            <p id="review-contact-details" class="font-bold">-</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <div class="flex items-start">
                                        <input type="checkbox" id="terms" name="terms" class="mt-1 mr-3" required>
                                        <label for="terms" class="text-sm text-gray-300">
                                            I confirm that the information provided is accurate to the best of my knowledge. I understand that SafePaws may use this information to coordinate rescue efforts and contact me if necessary. I agree to the <a href="#" class="text-cyan-400 hover:underline">Terms of Service</a> and <a href="#" class="text-cyan-400 hover:underline">Privacy Policy</a>.
                                        </label>
                                    </div>
                                    <div id="terms-error" class="hidden mt-2 text-sm text-red-400">
                                        You must agree to the terms before submitting
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between">
                                <button type="button" class="secondary-btn prev-step" data-prev="3">
                                    <i class="mr-2 fas fa-arrow-left"></i>
                                    Previous
                                </button>
                                <button type="submit" class="primary-btn">
                                    <i class="mr-2 fas fa-paper-plane"></i>
                                    Submit Report
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Success Message -->
                    <div id="success-message" class="hidden text-center card">
                        <div class="mb-6 success-checkmark"></div>
                        <h3 class="mb-4 text-2xl font-bold">Report Submitted Successfully!</h3>
                        <p class="mb-6 text-gray-300">
                            Thank you for helping an animal in need. Our rescue team has been notified and will respond as soon as possible.
                        </p>
                        <div class="max-w-md mx-auto mb-6 card bg-white/5">
                            <p class="mb-2 text-gray-400">Your Report ID:</p>
                            <p id="report-id" class="text-2xl font-bold gradient-text">SP-2024-XXXXX</p>
                            <p class="mt-3 text-sm text-gray-300">
                                <i class="mr-1 fas fa-info-circle"></i>
                                Use this ID to track your report status
                            </p>
                        </div>
                        <div class="flex flex-col justify-center gap-4 sm:flex-row">
                            <a href="track-report.html" class="primary-btn">
                                <i class="mr-2 fas fa-search"></i>
                                Track Report Status
                            </a>
                            <button onclick="resetForm()" class="secondary-btn">
                                <i class="mr-2 fas fa-plus"></i>
                                Submit Another Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- What Happens Next Section -->
        <section class="section-padding bg-gradient-to-b from-transparent to-cyan-900/10">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">What Happens After You Report?</h2>
                    <p class="section-subtitle">
                        Our team follows a proven process to ensure every animal gets the help it needs
                    </p>
                </div>
                
                <div class="grid gap-8 md:grid-cols-4">
                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Immediate Alert</h3>
                        <p class="text-gray-300">Our rescue team is notified instantly and assesses the situation.</p>
                    </div>
                    
                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Team Dispatch</h3>
                        <p class="text-gray-300">Nearest available rescue team is dispatched to the location.</p>
                    </div>
                    
                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Medical Care</h3>
                        <p class="text-gray-300">Animal receives immediate medical attention and assessment.</p>
                    </div>
                    
                    <div class="text-center feature-card">
                        <div class="mx-auto feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Safe Shelter</h3>
                        <p class="text-gray-300">Animal is transported to our shelter for care and rehabilitation.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="section-padding">
            <div class="container-custom">
                <div class="mb-16 text-center">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-subtitle">
                        Find answers to common questions about reporting animals
                    </p>
                </div>
                
                <div class="max-w-4xl mx-auto">
                    <div class="space-y-4">
                        <div class="card">
                            <button class="flex items-center justify-between w-full text-left faq-question">
                                <h3 class="text-lg font-bold">How quickly will you respond?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="hidden mt-4 faq-answer">
                                <p class="text-gray-300">Our average response time is 45 minutes in urban areas. For emergencies involving aggressive or severely injured animals, we aim to respond within 30 minutes.</p>
                            </div>
                        </div>
                        
                        <div class="card">
                            <button class="flex items-center justify-between w-full text-left faq-question">
                                <h3 class="text-lg font-bold">Do I need to stay with the animal?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="hidden mt-4 faq-answer">
                                <p class="text-gray-300">It's helpful if you can safely wait nearby, but not required. If you must leave, please provide specific location details and any landmarks that can help our team.</p>
                            </div>
                        </div>
                        
                        <div class="card">
                            <button class="flex items-center justify-between w-full text-left faq-question">
                                <h3 class="text-lg font-bold">What happens to the animal after rescue?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="hidden mt-4 faq-answer">
                                <p class="text-gray-300">All rescued animals receive medical care, rehabilitation, and are evaluated for adoption. We work with local shelters and foster networks to find loving homes.</p>
                            </div>
                        </div>
                        
                        <div class="card">
                            <button class="flex items-center justify-between w-full text-left faq-question">
                                <h3 class="text-lg font-bold">Will I be updated about the animal?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="hidden mt-4 faq-answer">
                                <p class="text-gray-300">If you provide contact information, we'll send you updates about the rescue and the animal's progress. You can also track your report using the Report ID.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="section-padding bg-gradient-to-r from-red-900/20 to-cyan-900/20">
            <div class="text-center container-custom">
                <h2 class="mb-6 section-title">Need Immediate Help?</h2>
                <p class="max-w-2xl mx-auto mb-10 section-subtitle">
                    If the animal is in immediate danger or showing aggressive behavior, call our emergency hotline right away
                </p>
                
                <div class="flex flex-col justify-center gap-6 sm:flex-row">
                    <a href="tel:555911264625" class="bg-red-500 primary-btn hover:bg-red-600">
                        <i class="mr-2 fas fa-phone"></i>
                        Call Emergency: (555) 911-ANIMAL
                    </a>
                    <a href="index.html" class="secondary-btn">
                        <i class="mr-2 fas fa-home"></i>
                        Back to Homepage
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-transparent to-[#0b2447] pt-16 pb-8">
            <div class="px-5 container-custom">
                <div class="grid gap-8 mb-12 md:grid-cols-4">
                    <div>
                        <a href="index.html" class="flex items-center gap-3 mb-6">
                            <div class="flex items-center justify-center w-12 h-12 gradient-bg rounded-xl">
                                <i class="text-xl text-white fas fa-paw"></i>
                            </div>
                            <div>
                                <span class="text-2xl font-bold">SafePaws</span>
                                <div class="text-xs text-gray-300">Protecting Every Paw</div>
                            </div>
                        </a>
                        <p class="mb-6 text-gray-300">
                            24/7 Animal Rescue & Emergency Response
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
                            <li><a href="index.html" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Home</a></li>
                            <li><a href="report-animal.html" class="font-medium text-cyan-400">Report Animal</a></li>
                            <li><a href="track-report.html" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Track Report</a></li>
                            <li><a href="index.html#adopt" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Adopt a Pet</a></li>
                            <li><a href="index.html#team" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Our Team</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="mb-6 text-lg font-bold">Emergency Services</h4>
                        <ul class="space-y-3">
                            <li><a href="report-animal.html#emergency" class="text-gray-300 transition-colors duration-300 hover:text-red-400">Emergency Hotline</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Animal Rescue</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Medical Emergency</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Aggressive Animals</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">After Hours Service</a></li>
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
                                <span class="text-gray-300">emergency@safepaws.org</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="text-red-400 fas fa-phone-alt"></i>
                                <span class="font-medium text-red-300">(555) 911-ANIMAL</span>
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
                            Emergency Response Available 24/7
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

            // Form handling
            let currentStep = 1;
            const totalSteps = 4;
            const formProgress = document.getElementById('form-progress');
            const steps = document.querySelectorAll('.step-indicator');
            
            // Update progress bar and step indicators
            function updateProgress() {
                // Update progress bar width
                const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
                formProgress.style.width = `${progressPercentage}%`;
                
                // Update step indicators
                steps.forEach((step, index) => {
                    const stepNumber = index + 1;
                    if (stepNumber < currentStep) {
                        step.classList.remove('active');
                        step.classList.add('completed');
                        step.innerHTML = '<i class="fas fa-check"></i>';
                    } else if (stepNumber === currentStep) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                        step.textContent = stepNumber;
                    } else {
                        step.classList.remove('active', 'completed');
                        step.textContent = stepNumber;
                    }
                });
            }
            
            // Show specific step
            function showStep(stepNumber) {
                // Hide all steps
                document.querySelectorAll('.form-step').forEach(step => {
                    step.classList.add('hidden');
                });
                
                // Show requested step
                const stepToShow = document.getElementById(`step-${stepNumber}`);
                if (stepToShow) {
                    stepToShow.classList.remove('hidden');
                    currentStep = stepNumber;
                    updateProgress();
                    
                    // If on review step, populate review
                    if (stepNumber === 4) {
                        populateReview();
                    }
                }
            }
            
            // Validate current step
            function validateStep(stepNumber) {
                let isValid = true;
                
                if (stepNumber === 1) {
                    const animalTypeSelected = document.querySelector('input[name="animal_type"]:checked');
                    if (!animalTypeSelected) {
                        alert('Please select an animal type');
                        isValid = false;
                    }
                }
                
                if (stepNumber === 2) {
                    const imageInput = document.getElementById('animal_photo');
                    const description = document.getElementById('description').value.trim();
                    
                    if (!imageInput.files || imageInput.files.length === 0) {
                        document.getElementById('image-error').classList.remove('hidden');
                        isValid = false;
                    } else {
                        document.getElementById('image-error').classList.add('hidden');
                    }
                    
                    if (!description) {
                        document.getElementById('description-error').classList.remove('hidden');
                        isValid = false;
                    } else {
                        document.getElementById('description-error').classList.add('hidden');
                    }
                }
                
                if (stepNumber === 3) {
                    const location = document.getElementById('location').value.trim();
                    const lastSeen = document.getElementById('last_seen').value;
                    
                    if (!location) {
                        document.getElementById('location-error').classList.remove('hidden');
                        isValid = false;
                    } else {
                        document.getElementById('location-error').classList.add('hidden');
                    }
                    
                    if (!lastSeen) {
                        document.getElementById('last-seen-error').classList.remove('hidden');
                        isValid = false;
                    } else {
                        document.getElementById('last-seen-error').classList.add('hidden');
                    }
                }
                
                if (stepNumber === 4) {
                    const termsAccepted = document.getElementById('terms').checked;
                    if (!termsAccepted) {
                        document.getElementById('terms-error').classList.remove('hidden');
                        isValid = false;
                    } else {
                        document.getElementById('terms-error').classList.add('hidden');
                    }
                }
                
                return isValid;
            }
            
            // Populate review step
            function populateReview() {
                // Animal type
                const animalType = document.querySelector('input[name="animal_type"]:checked');
                if (animalType) {
                    document.getElementById('review-type').textContent = animalType.value;
                }
                
                // Location
                const location = document.getElementById('location').value;
                document.getElementById('review-location').textContent = location || 'Not provided';
                
                // Last seen
                const lastSeen = document.getElementById('last_seen').value;
                if (lastSeen) {
                    const date = new Date(lastSeen);
                    document.getElementById('review-last-seen').textContent = date.toLocaleString();
                } else {
                    document.getElementById('review-last-seen').textContent = 'Not provided';
                }
                
                // Description
                const description = document.getElementById('description').value;
                document.getElementById('review-description').textContent = description || 'Not provided';
                
                // Contact info
                const contactName = document.getElementById('contact_name').value;
                const contactPhone = document.getElementById('contact_phone').value;
                const contactEmail = document.getElementById('contact_email').value;
                
                if (contactName || contactPhone || contactEmail) {
                    let contactDetails = [];
                    if (contactName) contactDetails.push(`Name: ${contactName}`);
                    if (contactPhone) contactDetails.push(`Phone: ${contactPhone}`);
                    if (contactEmail) contactDetails.push(`Email: ${contactEmail}`);
                    
                    document.getElementById('review-contact-details').textContent = contactDetails.join(', ');
                    document.getElementById('review-contact').classList.remove('hidden');
                } else {
                    document.getElementById('review-contact').classList.add('hidden');
                }
            }
            
            // Next step button handlers
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = parseInt(this.getAttribute('data-next'));
                    if (validateStep(currentStep)) {
                        showStep(nextStep);
                    }
                });
            });
            
            // Previous step button handlers
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = parseInt(this.getAttribute('data-prev'));
                    showStep(prevStep);
                });
            });
            
            // File upload handling
            const fileUploadArea = document.getElementById('file-upload-area');
            const fileInput = document.getElementById('animal_photo');
            const filePreview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');
            const imagePreview = document.getElementById('image-preview');
            const removeImageBtn = document.getElementById('remove-image');
            
            if (fileUploadArea && fileInput) {
                // Click to upload
                fileUploadArea.addEventListener('click', () => {
                    fileInput.click();
                });
                
                // Drag and drop
                fileUploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    fileUploadArea.classList.add('border-cyan-500', 'bg-cyan-500/10');
                });
                
                fileUploadArea.addEventListener('dragleave', () => {
                    fileUploadArea.classList.remove('border-cyan-500', 'bg-cyan-500/10');
                });
                
                fileUploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    fileUploadArea.classList.remove('border-cyan-500', 'bg-cyan-500/10');
                    
                    if (e.dataTransfer.files.length) {
                        fileInput.files = e.dataTransfer.files;
                        handleFileSelection(fileInput.files[0]);
                    }
                });
                
                // File input change
                fileInput.addEventListener('change', () => {
                    if (fileInput.files.length) {
                        handleFileSelection(fileInput.files[0]);
                    }
                });
                
                // Remove image
                removeImageBtn.addEventListener('click', () => {
                    fileInput.value = '';
                    filePreview.classList.add('hidden');
                });
            }
            
            function handleFileSelection(file) {
                if (file && file.type.startsWith('image/')) {
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File size must be less than 5MB');
                        return;
                    }
                    
                    // Show preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    
                    // Update file info
                    fileName.textContent = file.name;
                    fileSize.textContent = `${(file.size / (1024 * 1024)).toFixed(2)} MB`;
                    
                    // Show preview
                    filePreview.classList.remove('hidden');
                    document.getElementById('image-error').classList.add('hidden');
                } else {
                    alert('Please select a valid image file (JPG, PNG, etc.)');
                }
            }
            
            // Form submission
            const reportForm = document.getElementById('animal-report-form');
            const successMessage = document.getElementById('success-message');
            
            if (reportForm) {
                reportForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Validate all steps
                    let allValid = true;
                    for (let i = 1; i <= 4; i++) {
                        if (!validateStep(i)) {
                            allValid = false;
                            showStep(i);
                            break;
                        }
                    }
                    
                    if (!allValid) {
                        return;
                    }
                    
                    // Generate report ID
                    const reportId = 'SP-' + new Date().getFullYear() + '-' + Math.floor(10000 + Math.random() * 90000);
                    document.getElementById('report-id').textContent = reportId;
                    
                    // Show success message
                    reportForm.classList.add('hidden');
                    successMessage.classList.remove('hidden');
                    
                    // In real app, send data to server here
                    console.log('Form submitted successfully');
                    
                    // Scroll to success message
                    successMessage.scrollIntoView({ behavior: 'smooth' });
                });
            }
            
            // Reset form function
            function resetForm() {
                // Reset form fields
                document.getElementById('animal-report-form').reset();
                document.getElementById('file-preview').classList.add('hidden');
                document.getElementById('file-input').value = '';
                
                // Hide success message, show form
                successMessage.classList.add('hidden');
                reportForm.classList.remove('hidden');
                
                // Reset to step 1
                showStep(1);
                
                // Scroll to form
                document.getElementById('report-form').scrollIntoView({ behavior: 'smooth' });
            }
            
            // Copy emergency number
            function copyEmergencyNumber() {
                const number = '(555) 911-ANIMAL';
                navigator.clipboard.writeText(number).then(() => {
                    alert('Emergency number copied to clipboard: ' + number);
                });
            }
            
            // FAQ toggle
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', () => {
                    const answer = question.nextElementSibling;
                    const icon = question.querySelector('i');
                    
                    answer.classList.toggle('hidden');
                    icon.classList.toggle('fa-chevron-down');
                    icon.classList.toggle('fa-chevron-up');
                });
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
            
            const statsSection = document.querySelector('#report-hero');
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
            
            // Initialize progress bar
            updateProgress();
            
            // Set default date/time to now
            const now = new Date();
            const localDateTime = new Date(now.getTime() - now.getTimezoneOffset() * 60000).toISOString().slice(0, 16);
            document.getElementById('last_seen').value = localDateTime;
            
            // Language selector functionality
            document.querySelectorAll('.language-option, .mobile-language-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const lang = this.getAttribute('data-lang');
                    alert(`Language changed to: ${lang}`);
                    // Here you would typically make an AJAX call to set the language
                });
            });
            
            // Login function
            function openLogin() {
                alert('Login feature coming soon!');
            }
        </script>
    </body>
</html>