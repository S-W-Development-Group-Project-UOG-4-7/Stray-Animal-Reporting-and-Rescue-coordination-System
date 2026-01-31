<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SafePaws — Protect Our Paws | Awareness Hub</title>
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

            .card {
                @apply glass-effect rounded-2xl p-6 md:p-8 hover-grow;
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

            .feature-icon {
                @apply w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center text-white text-2xl mb-6;
            }

            /* New Styles for Awareness Page */
            .form-card {
                @apply glass-effect rounded-2xl p-6 md:p-8 border border-cyan-500/20;
            }

            .form-input {
                @apply w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30 transition-all duration-300;
            }

            .form-label {
                @apply block mb-2 text-sm font-medium text-gray-300;
            }

            .form-select {
                @apply w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30 transition-all duration-300 appearance-none;
            }

            .file-upload {
                @apply w-full p-8 border-2 border-dashed border-white/20 rounded-xl text-center transition-all duration-300 hover:border-cyan-500/50 hover:bg-white/5 cursor-pointer;
            }

            .community-post {
                @apply glass-effect rounded-2xl p-6 mb-6 border border-white/10 hover:border-cyan-500/30 transition-all duration-300 relative;
            }

            .comment-box {
                @apply bg-white/5 rounded-xl p-4 mb-3 border border-white/5 relative;
            }

            .avatar {
                @apply w-10 h-10 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white font-bold;
            }

            .avatar-small {
                @apply w-8 h-8 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white text-sm font-bold;
            }

            .guideline-item {
                @apply flex items-start gap-3 p-3 rounded-lg bg-white/5 hover:bg-white/10 transition-colors duration-300;
            }

            .tab-button {
                @apply px-4 py-2 rounded-lg font-medium transition-all duration-300;
            }

            .tab-button.active {
                @apply bg-cyan-500/20 text-cyan-400 border border-cyan-500/30;
            }

            .nav-glass {
                background: rgba(7, 19, 49, 0.85);
                backdrop-filter: blur(15px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            }

            .stats-counter {
                font-size: 2.5rem;
                font-weight: bold;
                background: linear-gradient(90deg, #0ea5e9, #22d3ee);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
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

            /* Beautiful separator */
            .nav-separator {
                @apply w-px h-6 bg-white/10 mx-2;
            }

            /* Enhanced Features */
            .post-actions {
                @apply absolute top-4 right-4 flex gap-2;
            }

            .edit-btn {
                @apply px-3 py-1.5 rounded-lg text-sm font-medium bg-cyan-500/20 text-cyan-400 hover:bg-cyan-500/30 transition-all duration-300;
            }

            .delete-btn {
                @apply px-3 py-1.5 rounded-lg text-sm font-medium bg-red-500/20 text-red-400 hover:bg-red-500/30 transition-all duration-300;
            }

            .comment-actions {
                @apply absolute top-3 right-3 flex gap-1;
            }

            .like-btn {
                @apply flex items-center gap-1 text-gray-400 hover:text-red-400 transition-colors duration-300;
            }

            .like-btn.liked {
                @apply text-red-500;
            }

            .share-btn {
                @apply flex items-center gap-1 text-gray-400 hover:text-cyan-400 transition-colors duration-300;
            }

            .tag {
                @apply px-3 py-1 rounded-full text-xs font-semibold;
            }

            .article-tag {
                @apply tag bg-gradient-to-r from-purple-600 to-purple-800 text-white;
            }

            .video-tag {
                @apply tag bg-gradient-to-r from-red-600 to-red-800 text-white;
            }

            .image-tag {
                @apply tag bg-gradient-to-r from-green-600 to-green-800 text-white;
            }

         /* Modal Styles */
.modal-overlay {
    @apply fixed inset-0 bg-black/70 z-50;
    display: none;
}

.modal-overlay.active {
    display: block;
}

.modal-content {
    @apply fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 glass-effect rounded-2xl p-8 z-50 max-w-lg w-full;
    display: none;
}

.modal-content.active {
    display: block;
}

            /* YouTube Video Styles */
            .youtube-input {
                @apply w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/30 transition-all duration-300 mb-4;
            }

            .image-preview {
                @apply mt-4 rounded-xl overflow-hidden max-h-96 relative;
            }

            .remove-image {
                @apply absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors duration-300;
            }

            .video-preview {
                @apply relative rounded-xl overflow-hidden mb-4;
                padding-bottom: 56.25%;
                height: 0;
            }

            .video-preview iframe,
            .video-preview video {
                @apply absolute top-0 left-0 w-full h-full;
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
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                        <a href="#about" class="nav-link">About</a>
                        
                        <a href="{{ route('awareness') }}" class="nav-link active">
                            Protect Our Paws
                        </a>

                        <div class="relative dropdown">
                            <button class="flex items-center gap-1 nav-link">
                                Get Involved <i class="text-xs fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#volunteer" class="dropdown-item">
                                    <i class="mr-3 fas fa-hands-helping text-cyan-400"></i>
                                    Volunteer
                                </a>
                                <a href="{{ route('home') }}" class="dropdown-item">
                                    <i class="mr-3 fas fa-home text-cyan-400"></i>
                                    Home
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
                        
                        <!-- Navigation Actions -->
                        <div class="nav-actions">
                           <a href="{{ route('animal.report.form') }}" class="report-btn">
                                <i class="fas fa-exclamation-triangle"></i>
                                Report Animal
                            </a>

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
                    <a href="{{ route('awareness') }}" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Protect Our Paws</a>
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
                            <button class="flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm" data-lang="en">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-blue-500 to-red-500">
                                    EN
                                </div>
                                <span>English</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm" data-lang="es">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-red-500 to-yellow-500">
                                    ES
                                </div>
                                <span>Español</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm" data-lang="fr">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-blue-600 rounded-full bg-gradient-to-r from-blue-500 to-white">
                                    FR
                                </div>
                                <span>Français</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm" data-lang="de">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold text-white rounded-full bg-gradient-to-r from-black to-red-500 to-yellow-500">
                                    DE
                                </div>
                                <span>Deutsch</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm" data-lang="ja">
                                <div class="flex items-center justify-center w-5 h-5 text-xs font-bold rounded-full bg-gradient-to-r from-red-500 to-white">
                                    日
                                </div>
                                <span>日本語</span>
                            </button>
                            <button class="flex items-center justify-center gap-2 w-full p-2.5 rounded-lg hover:bg-white/5 text-sm" data-lang="si">
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
        <section class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
            <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
            <div class="px-5 container-custom">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="animate-slide-in">
                        <h1 class="mb-6 title">
                            <span class="gradient-text">Protect Our Paws</span> Community Hub
                        </h1>
                        <p class="mb-10 subtitle">
                            Share stories, raise awareness, and join conversations about stray animal welfare. Together, we can make a difference.
                        </p>
                        <div class="grid grid-cols-3 gap-6 mb-12">
                            <div class="text-center">
                                <div class="stats-counter" data-count="1542">0</div>
                                <p class="text-gray-300">Stories Shared</p>
                            </div>
                            <div class="text-center">
                                <div class="stats-counter" data-count="836">0</div>
                                <p class="text-gray-300">Community Members</p>
                            </div>
                            <div class="text-center">
                                <div class="stats-counter" data-count="329">0</div>
                                <p class="text-gray-300">Awareness Campaigns</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="relative z-10">
                            <img src="https://images.unsplash.com/photo-1559190394-df5a28aab5c5?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=9a6f6d5c5b5e5b5e5b5e5b5e5b5e5b5e" 
                                 alt="Community of animal lovers" 
                                 class="rounded-3xl shadow-2xl shadow-cyan-500/20 w-full h-[500px] object-cover">
                        </div>
                        <div class="absolute w-64 h-64 -bottom-6 -right-6 gradient-bg rounded-3xl -z-10 animate-float"></div>
                        <div class="absolute w-48 h-48 -top-6 -left-6 bg-purple-500/30 rounded-3xl -z-10 animate-float" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="section-padding">
            <div class="container-custom">
                <div class="grid gap-8 lg:grid-cols-3">
                    <!-- Left Column: Share Content Form -->
                    <div class="lg:col-span-2">
                        <div class="mb-8">
                            <h2 class="mb-2 text-3xl font-bold">Share Your Content</h2>
                            <p class="text-gray-300">Upload articles, videos, or images to raise awareness about stray animal welfare</p>
                        </div>

                        <form id="shareForm" class="space-y-6 form-card">
                            <!-- Author Name -->
                            <div>
                                <label for="authorName" class="form-label">Your Name (For Demo)</label>
                                <input type="text" id="authorName" class="form-input" placeholder="Enter your name" required>
                                <p class="mt-1 text-xs text-gray-400">Note: This is for demo. In production, your name will come from login.</p>
                            </div>

                            <!-- Content Type -->
                            <div>
                                <label class="form-label">Content Type</label>
                                <div class="flex gap-2">
                                    <button type="button" class="tab-button active" data-type="article">
                                        <i class="mr-2 fas fa-newspaper"></i> Article
                                    </button>
                                    <button type="button" class="tab-button" data-type="video">
                                        <i class="mr-2 fas fa-video"></i> Video
                                    </button>
                                    <button type="button" class="tab-button" data-type="image">
                                        <i class="mr-2 fas fa-image"></i> Image
                                    </button>
                                </div>
                                <input type="hidden" id="contentType" value="article">
                            </div>

                            <!-- Title -->
                            <div>
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-input" placeholder="Enter a descriptive title" required>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" rows="4" class="form-input" placeholder="Describe your content..." required></textarea>
                            </div>

                            <!-- Media Upload Section -->
                            <div id="mediaUploadSection">
                                <!-- YouTube URL Input (for video type) -->
                                <div id="youtubeSection" class="hidden">
                                    <label class="form-label">YouTube Video URL (Optional)</label>
                                    <input type="text" id="youtubeUrl" class="youtube-input" placeholder="Paste YouTube video URL here...">
                                    <p class="mb-4 text-sm text-gray-400">Example: https://www.youtube.com/watch?v=VIDEO_ID</p>
                                    
                                    <!-- YouTube Preview -->
                                    <div id="youtubePreview" class="hidden video-preview"></div>
                                </div>

                                <!-- File Upload -->
                                <div id="fileUploadSection">
                                    <label class="form-label">Upload File (Optional)</label>
                                    <div class="file-upload" id="dropZone">
                                        <i class="mb-4 text-3xl text-gray-400 fas fa-cloud-upload-alt"></i>
                                        <p class="mb-2 text-gray-300" id="uploadText">Choose file or drag & drop (optional)</p>
                                        <p class="text-sm text-gray-400" id="fileTypeText">Images & Videos up to 50MB</p>
                                        <input type="file" id="fileUpload" class="hidden" accept="image/*,video/*">
                                    </div>
                                    <div id="fileName" class="mt-2 text-sm text-gray-400"></div>
                                    
                                    <!-- Media Preview -->
                                    <div id="mediaPreview" class="hidden image-preview"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full primary-btn">
                                <i class="fas fa-share-alt"></i> Share with Community
                            </button>
                        </form>

                        <!-- Community Guidelines -->
                        <div class="mt-8 form-card">
                            <h3 class="mb-6 text-xl font-bold">Community Guidelines</h3>
                            <div class="space-y-3">
                                <div class="guideline-item">
                                    <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                    <span>Share genuine experiences and helpful information</span>
                                </div>
                                <div class="guideline-item">
                                    <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                    <span>Be respectful in comments and discussions</span>
                                </div>
                                <div class="guideline-item">
                                    <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                    <span>Images should be clear and not distressing</span>
                                </div>
                                <div class="guideline-item">
                                    <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                    <span>Respect animal privacy and dignity</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Community Posts -->
                    <div>
                        <div class="mb-8">
                            <h2 class="mb-2 text-3xl font-bold">Community Posts</h2>
                            <p class="text-gray-300">Latest stories and discussions from our community</p>
                        </div>

                        <!-- Posts Container -->
                        <div id="postsContainer">
                            <!-- Posts will be loaded here dynamically -->
                        </div>

                        <!-- Loading Indicator -->
                        <div id="loadingIndicator" class="text-center text-gray-400 py-8">
                            <i class="fas fa-paw animate-pulse"></i>
                            <p class="mt-2">Loading posts...</p>
                        </div>

                        <!-- No Posts Message -->
                        <div id="noPostsMessage" class="hidden text-center py-8">
                            <i class="text-4xl text-gray-400 fas fa-paw"></i>
                            <p class="mt-2 text-gray-400">No posts yet. Be the first to share!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Resources Section -->
        <section class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
            <div class="container-custom">
                <div class="mb-12 text-center">
                    <h2 class="section-title">Awareness Resources</h2>
                    <p class="section-subtitle">Educational materials to help you make a difference</p>
                </div>

                <div class="grid gap-6 md:grid-cols-3">
                    <div class="card">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Educational Guides</h3>
                        <p class="mb-4 text-gray-300">Download our free guides on responsible pet ownership, first aid for animals, and community care.</p>
                        <a href="#" class="text-cyan-400 hover:text-cyan-300">
                            Download Guides <i class="ml-2 fas fa-arrow-down"></i>
                        </a>
                    </div>

                    <div class="card">
                        <div class="feature-icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Video Library</h3>
                        <p class="mb-4 text-gray-300">Watch tutorials, rescue stories, and educational content from animal welfare experts.</p>
                        <a href="#" class="text-cyan-400 hover:text-cyan-300">
                            Watch Videos <i class="ml-2 fas fa-play"></i>
                        </a>
                    </div>

                    <div class="card">
                        <div class="feature-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold">Volunteer Toolkit</h3>
                        <p class="mb-4 text-gray-300">Everything you need to start helping animals in your community, from TNR guides to fundraising tips.</p>
                        <a href="#" class="text-cyan-400 hover:text-cyan-300">
                            Get Toolkit <i class="ml-2 fas fa-tools"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-transparent to-[#0b2447] pt-16 pb-8">
            <div class="px-5 container-custom">
                <div class="grid gap-8 mb-12 md:grid-cols-4">
                    <div>
                        <a href="{{ route('home') }}" class="flex items-center gap-3 mb-6">
                            <div class="flex items-center justify-center w-12 h-12 gradient-bg rounded-xl">
                                <i class="text-xl text-white fas fa-paw"></i>
                            </div>
                            <div>
                                <span class="text-2xl font-bold">SafePaws</span>
                                <div class="text-xs text-gray-300">Protecting Every Paw</div>
                            </div>
                        </a>
                        <p class="mb-6 text-gray-300">
                            Join our community dedicated to raising awareness and protecting animals in need.
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
                            <li><a href="{{ route('home') }}" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Home</a></li>
                            <li><a href="{{ route('awareness') }}" class="text-cyan-400">Awareness Hub</a></li>
                            <li><a href="{{ route('donation') }}" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Donate</a></li>
                            <li><a href="{{ route('animal.report.form') }}" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Report Animal</a></li>
                            <li><a href="#resources" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Resources</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="mb-6 text-lg font-bold">Community</h4>
                        <ul class="space-y-3">
                            <li><a href="#guidelines" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Community Guidelines</a></li>
                            <li><a href="#stories" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Success Stories</a></li>
                            <li><a href="#events" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Local Events</a></li>
                            <li><a href="#volunteer" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Volunteer Opportunities</a></li>
                            <li><a href="#forum" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Discussion Forum</a></li>
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
                                <span class="text-gray-300">awareness@safepaws.org</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-clock text-cyan-400"></i>
                                <span class="text-gray-300">Community Support: 9AM-6PM Daily</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="pt-8 border-t border-white/10">
                    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                        <p class="text-sm text-gray-400">
                            © <span id="current-year"></span> SafePaws Awareness Hub. All rights reserved. | 
                            <a href="#" class="transition-colors duration-300 hover:text-cyan-400">Privacy Policy</a> | 
                            <a href="#" class="transition-colors duration-300 hover:text-cyan-400">Community Rules</a>
                        </p>
                        <p class="text-sm text-gray-400">
                            Spread awareness, save lives <i class="mx-1 text-red-400 fas fa-heart"></i>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Edit Post Modal -->
        <div id="editPostModal" class="modal-overlay">
            <div class="modal-content">
                <button onclick="closeEditModal()" class="absolute text-gray-400 top-4 right-4 hover:text-white">
                    <i class="text-xl fas fa-times"></i>
                </button>
                <h3 class="mb-6 text-2xl font-bold">Edit Your Post</h3>
                <form id="editPostForm" class="space-y-6">
                    <input type="hidden" id="editPostId">
                    
                    <div>
                        <label for="editTitle" class="form-label">Title</label>
                        <input type="text" id="editTitle" class="form-input" required>
                    </div>
                    
                    <div>
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea id="editDescription" rows="4" class="form-input" required></textarea>
                    </div>
                    
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 primary-btn">
                            <i class="fas fa-save"></i>
                            Save Changes
                        </button>
                        <button type="button" onclick="closeEditModal()" class="flex-1 secondary-btn">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Comment Modal -->
        <div id="editCommentModal" class="modal-overlay">
            <div class="modal-content" style="max-width: 500px;">
                <button onclick="closeEditCommentModal()" class="absolute text-gray-400 top-4 right-4 hover:text-white">
                    <i class="text-xl fas fa-times"></i>
                </button>
                <h3 class="mb-6 text-2xl font-bold">Edit Your Comment</h3>
                <form id="editCommentForm" class="space-y-6">
                    <input type="hidden" id="editCommentId">
                    <input type="hidden" id="editCommentPostId">
                    
                    <div>
                        <textarea id="editCommentText" rows="4" class="form-input" required></textarea>
                    </div>
                    
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 primary-btn">
                            <i class="fas fa-save"></i>
                            Update Comment
                        </button>
                        <button type="button" onclick="closeEditCommentModal()" class="flex-1 secondary-btn">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

     <script>
    // ==============================
    // GLOBAL VARIABLES
    // ==============================
    let posts = JSON.parse(localStorage.getItem('safePawsPosts')) || [];
    let currentUser = localStorage.getItem('currentUser') || '';
    window.uploadedVideos = window.uploadedVideos || {}; // Cache for video object URLs
    
    // Sample initial posts
    const initialPosts = [
        {
            id: 1,
            type: 'article',
            title: 'The Importance of Community Feeding Programs',
            description: 'In our neighborhood, we started a community feeding program for stray animals. Every Sunday, volunteers gather to prepare and distribute food. The impact has been incredible - healthier animals and fewer conflicts.',
            author: 'Sarah Johnson',
            date: '2 days ago',
            likes: 42,
            likedBy: [],
            media: {
                type: 'image',
                url: 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?q=80&w=800&auto=format&fit=crop'
            },
            comments: [
                { id: 1, author: 'Mike Chen', text: 'This is amazing! How can I start something similar in my area?', date: '1 day ago' },
                { id: 2, author: 'Lisa Park', text: 'We did this too! It really brings the community together.', date: '12 hours ago' }
            ]
        },
        {
            id: 2,
            type: 'video',
            title: 'Rescuing Abandoned Puppies - Full Documentary',
            description: 'Follow our journey as we rescue a litter of abandoned puppies found in an empty lot. This video documents their recovery and journey to finding forever homes.',
            author: 'Animal Rescue Team',
            date: '1 week ago',
            likes: 128,
            likedBy: [],
            media: {
                type: 'youtube',
                url: 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            },
            comments: [
                { id: 1, author: 'David Miller', text: 'Thank you for sharing this! The transformation is incredible.', date: '6 days ago' },
                { id: 2, author: 'Emma Wilson', text: 'This video made me cry. Thank you for your work!', date: '5 days ago' }
            ]
        },
        {
            id: 3,
            type: 'image',
            title: 'Before & After: Miracle the Street Cat',
            description: 'Found Miracle malnourished and injured on the streets. After 3 months of care, she\'s now a healthy, loving companion. Never underestimate the power of care and compassion.',
            author: 'Alex Morgan',
            date: '3 days ago',
            likes: 56,
            likedBy: [],
            media: {
                type: 'image',
                url: 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=800&auto=format&fit=crop'
            },
            comments: [
                { id: 1, author: 'Tom Harris', text: 'What an amazing transformation! How did you gain her trust?', date: '2 days ago' },
                { id: 2, author: 'Alex Morgan', text: 'It took patience and lots of gentle interactions. Started with food, then gentle petting once she was comfortable.', date: '1 day ago' }
            ]
        }
    ];

    // ==============================
    // INITIALIZATION
    // ==============================
    document.addEventListener('DOMContentLoaded', function() {
        // Set current year
        document.getElementById('current-year').textContent = new Date().getFullYear();
        
        // Load current user from localStorage
        if (currentUser) {
            document.getElementById('authorName').value = currentUser;
        }
        
        // Initialize with sample posts if empty
        if (posts.length === 0) {
            posts = initialPosts;
            localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        }
        
        // Setup event listeners
        setupEventListeners();
        
        // Render posts
        renderPosts();
        
        // Animate counters
        animateCounters();
        
        // Clean up any orphaned video URLs on page load
        cleanupVideoURLs();
    });

    // ==============================
    // EVENT LISTENERS SETUP
    // ==============================
    function setupEventListeners() {
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

        // Content type tabs
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const selectedType = button.dataset.type;
                document.getElementById('contentType').value = selectedType;
                
                // Get references to elements
                const youtubeSection = document.getElementById('youtubeSection');
                const fileUploadSection = document.getElementById('fileUploadSection');
                const uploadText = document.getElementById('uploadText');
                const fileTypeText = document.getElementById('fileTypeText');
                const fileInput = document.getElementById('fileUpload');
                const youtubeUrlInput = document.getElementById('youtubeUrl');
                const youtubePreview = document.getElementById('youtubePreview');
                const mediaPreview = document.getElementById('mediaPreview');
                const fileName = document.getElementById('fileName');
                
                // Clear all media previews (but NOT the name field!)
                fileInput.value = '';
                youtubeUrlInput.value = '';
                youtubePreview.classList.add('hidden');
                youtubePreview.innerHTML = '';
                mediaPreview.classList.add('hidden');
                mediaPreview.innerHTML = '';
                fileName.textContent = '';
                fileName.classList.remove('text-cyan-400');
                
                // Show/hide sections based on content type
                if (selectedType === 'video') {
                    // Show BOTH YouTube AND file upload for video type
                    youtubeSection.classList.remove('hidden');
                    fileUploadSection.classList.remove('hidden');
                    uploadText.textContent = 'Choose video file or drag & drop (optional)';
                    fileTypeText.textContent = 'MP4, MOV, AVI up to 50MB';
                    fileInput.setAttribute('accept', 'video/*');
                } else if (selectedType === 'image') {
                    // Only file upload for image type
                    youtubeSection.classList.add('hidden');
                    fileUploadSection.classList.remove('hidden');
                    uploadText.textContent = 'Choose image file or drag & drop (optional)';
                    fileTypeText.textContent = 'JPG, PNG, GIF up to 50MB';
                    fileInput.setAttribute('accept', 'image/*');
                } else {
                    // Article type
                    youtubeSection.classList.add('hidden');
                    fileUploadSection.classList.remove('hidden');
                    uploadText.textContent = 'Choose file or drag & drop (optional)';
                    fileTypeText.textContent = 'Images & Videos up to 50MB';
                    fileInput.setAttribute('accept', 'image/*,video/*');
                }
            });
        });

        // File upload functionality
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileUpload');
        const fileName = document.getElementById('fileName');
        const mediaPreview = document.getElementById('mediaPreview');

        dropZone.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length) {
                const file = e.target.files[0];
                fileName.textContent = `Selected: ${file.name} (${(file.size / (1024*1024)).toFixed(2)}MB)`;
                fileName.classList.add('text-cyan-400');
                
                // Clear YouTube preview and input if file is uploaded
                const youtubeUrlInput = document.getElementById('youtubeUrl');
                const youtubePreview = document.getElementById('youtubePreview');
                youtubeUrlInput.value = '';
                youtubePreview.classList.add('hidden');
                youtubePreview.innerHTML = '';
                
                // Check file type based on content type
                const contentType = document.getElementById('contentType').value;
                if (contentType === 'video' && !file.type.startsWith('video/')) {
                    alert('Please select a video file for video posts');
                    fileInput.value = '';
                    fileName.textContent = '';
                    fileName.classList.remove('text-cyan-400');
                    return;
                }
                
                if (contentType === 'image' && !file.type.startsWith('image/')) {
                    alert('Please select an image file for image posts');
                    fileInput.value = '';
                    fileName.textContent = '';
                    fileName.classList.remove('text-cyan-400');
                    return;
                }
                
                // Check file size (50MB limit)
                if (file.size > 50 * 1024 * 1024) {
                    alert('File size must be less than 50MB');
                    fileInput.value = '';
                    fileName.textContent = '';
                    fileName.classList.remove('text-cyan-400');
                    return;
                }
                
                // Show preview
                if (file.type.startsWith('video/')) {
                    // For video files, create object URL for preview
                    const videoUrl = URL.createObjectURL(file);
                    mediaPreview.innerHTML = `
                        <video controls class="w-full h-64">
                            <source src="${videoUrl}" type="${file.type}">
                            Your browser does not support the video tag.
                        </video>
                        <button type="button" onclick="removeMedia()" class="remove-image">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    
                    // Store the preview URL for cleanup
                    if (!window.previewVideoURLs) window.previewVideoURLs = [];
                    window.previewVideoURLs.push(videoUrl);
                } else {
                    // For image files, use FileReader
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        mediaPreview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="w-full h-64 object-cover">
                            <button type="button" onclick="removeMedia()" class="remove-image">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        mediaPreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
                
                mediaPreview.classList.remove('hidden');
            }
        });

        // YouTube URL input
        const youtubeUrlInput = document.getElementById('youtubeUrl');
        const youtubePreview = document.getElementById('youtubePreview');
        
        youtubeUrlInput.addEventListener('input', (e) => {
            const url = e.target.value.trim();
            
            // Clear file upload if YouTube URL is entered
            if (url) {
                fileInput.value = '';
                fileName.textContent = '';
                fileName.classList.remove('text-cyan-400');
                mediaPreview.classList.add('hidden');
                mediaPreview.innerHTML = '';
                
                // Clean up any preview video URLs
                if (window.previewVideoURLs && window.previewVideoURLs.length > 0) {
                    window.previewVideoURLs.forEach(url => URL.revokeObjectURL(url));
                    window.previewVideoURLs = [];
                }
            }
            
            if (url) {
                const videoId = extractYouTubeId(url);
                if (videoId) {
                    youtubePreview.innerHTML = `
                        <iframe src="https://www.youtube.com/embed/${videoId}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    `;
                    youtubePreview.classList.remove('hidden');
                } else if (url.length > 10) {
                    youtubePreview.innerHTML = `
                        <div class="p-4 text-center text-red-400 bg-red-500/10 rounded-lg">
                            <i class="mb-2 text-xl fas fa-exclamation-triangle"></i>
                            <p>Invalid YouTube URL format</p>
                        </div>
                    `;
                    youtubePreview.classList.remove('hidden');
                } else {
                    youtubePreview.classList.add('hidden');
                }
            } else {
                youtubePreview.classList.add('hidden');
            }
        });

        // Drag and drop functionality
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-cyan-500', 'bg-white/10');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-cyan-500', 'bg-white/10');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-cyan-500', 'bg-white/10');
            
            if (e.dataTransfer.files.length) {
                const file = e.dataTransfer.files[0];
                
                // Check file size before proceeding
                if (file.size > 50 * 1024 * 1024) {
                    alert('File size must be less than 50MB');
                    return;
                }
                
                // Create a new FileList to set on the input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
                
                // Trigger change event
                const event = new Event('change', { bubbles: true });
                fileInput.dispatchEvent(event);
            }
        });

        // Form submission
        document.getElementById('shareForm').addEventListener('submit', (e) => {
            e.preventDefault();
            createPost();
        });

        // Edit form submissions
        document.getElementById('editPostForm').addEventListener('submit', (e) => {
            e.preventDefault();
            updatePost();
        });

        document.getElementById('editCommentForm').addEventListener('submit', (e) => {
            e.preventDefault();
            updateComment();
        });

        // Close modals when clicking outside
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Close mobile menu if open
                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
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
    }

    // ==============================
    // POSTS MANAGEMENT
    // ==============================
    function renderPosts() {
        const postsContainer = document.getElementById('postsContainer');
        const loadingIndicator = document.getElementById('loadingIndicator');
        const noPostsMessage = document.getElementById('noPostsMessage');
        
        // Show loading
        loadingIndicator.style.display = 'block';
        noPostsMessage.classList.add('hidden');
        postsContainer.innerHTML = '';
        
        // Sort posts by ID (newest first)
        const sortedPosts = [...posts].sort((a, b) => b.id - a.id);
        
        // Small delay to show loading animation
        setTimeout(() => {
            loadingIndicator.style.display = 'none';
            
            if (sortedPosts.length === 0) {
                noPostsMessage.classList.remove('hidden');
            } else {
                sortedPosts.forEach(post => {
                    const postElement = createPostElement(post);
                    postsContainer.appendChild(postElement);
                });
            }
        }, 300);
    }

    function createPostElement(post) {
        const div = document.createElement('div');
        div.className = 'community-post animate-slide-in';
        div.id = `post-${post.id}`;
        
        // Check if current user is post author
        const isAuthor = post.author === currentUser;
        const isLiked = post.likedBy && post.likedBy.includes(currentUser);
        
        // Create media HTML based on type
        let mediaHTML = '';
        if (post.media) {
            if (post.media.type === 'image') {
                mediaHTML = `
                    <img src="${post.media.url}" 
                         alt="Post image" 
                         class="object-cover w-full mb-4 rounded-xl h-48">
                `;
            } else if (post.media.type === 'youtube') {
                mediaHTML = `
                    <div class="video-preview mb-4">
                        <iframe src="${post.media.url}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                `;
            } else if (post.media.type === 'uploaded_video') {
                mediaHTML = `
                    <div class="video-preview mb-4">
                        <video controls class="w-full h-full" poster="https://images.unsplash.com/photo-1536431311719-398b6704d4cc?q=80&w=800&auto=format&fit=crop">
                            <source src="${post.media.url}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="absolute bottom-2 left-2 bg-black/50 text-white text-xs px-2 py-1 rounded">
                            ${post.media.fileName || 'Uploaded Video'}
                        </div>
                    </div>
                `;
            }
        }
        
        // Create tag based on content type
        let tagHTML = '';
        if (post.type === 'article') {
            tagHTML = '<span class="article-tag"><i class="mr-1 fas fa-newspaper"></i> Article</span>';
        } else if (post.type === 'video') {
            tagHTML = '<span class="video-tag"><i class="mr-1 fas fa-video"></i> Video</span>';
        } else if (post.type === 'image') {
            tagHTML = '<span class="image-tag"><i class="mr-1 fas fa-image"></i> Image</span>';
        }
        
        // Create comments HTML
        let commentsHTML = '';
        if (post.comments && post.comments.length > 0) {
            commentsHTML = post.comments.map(comment => {
                const isCommentAuthor = comment.author === currentUser;
                return `
                    <div class="comment-box" id="comment-${comment.id}">
                        ${isCommentAuthor ? `
                            <div class="comment-actions">
                                <button onclick="openEditComment(${comment.id}, ${post.id})" class="edit-btn px-2 py-1 text-xs">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteComment(${comment.id}, ${post.id})" class="delete-btn px-2 py-1 text-xs">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        ` : ''}
                        <div class="flex items-center gap-3 mb-3">
                            <div class="avatar-small">${comment.author.charAt(0)}</div>
                            <div>
                                <h5 class="text-sm font-bold">${comment.author}</h5>
                                <p class="text-xs text-gray-400">${comment.date}</p>
                            </div>
                        </div>
                        <p class="text-gray-300">${comment.text}</p>
                    </div>
                `;
            }).join('');
        }
        
        // Create post HTML
        div.innerHTML = `
            ${isAuthor ? `
                <div class="post-actions">
                    <button onclick="openEditPost(${post.id})" class="edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button onclick="deletePost(${post.id})" class="delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            ` : ''}
            
            <div class="flex items-center gap-3 mb-4">
                <div class="avatar">${post.author.charAt(0)}</div>
                <div>
                    <div class="flex items-center gap-2">
                        <h4 class="font-bold">${post.author}</h4>
                        ${tagHTML}
                    </div>
                    <p class="text-sm text-gray-400">${post.date}</p>
                </div>
            </div>
            
            <h3 class="mb-3 text-xl font-bold">${post.title}</h3>
            
            ${mediaHTML}
            
            <p class="mb-4 text-gray-300">${post.description}</p>
            
            <div class="flex gap-4 pt-4 border-t border-white/10">
                <button onclick="likePost(${post.id})" class="like-btn ${isLiked ? 'liked' : ''}">
                    <i class="fas fa-heart"></i> 
                    <span>${post.likes || 0}</span>
                </button>
                <button class="share-btn" onclick="sharePost(${post.id})">
                    <i class="fas fa-share"></i> Share
                </button>
                <button class="flex items-center gap-1 text-gray-400 hover:text-cyan-400">
                    <i class="fas fa-comment"></i> <span>${post.comments ? post.comments.length : 0}</span>
                </button>
            </div>

            <!-- Comments Section -->
            <div class="mt-6">
                <h4 class="mb-4 font-bold">Comments (${post.comments ? post.comments.length : 0})</h4>
                
                <!-- Comments List -->
                <div id="comments-${post.id}" class="mb-6">
                    ${commentsHTML}
                </div>
                
                <!-- Add Comment -->
                <div class="mt-4">
                    <div class="flex gap-3">
                        <input type="text" 
                               id="comment-author-${post.id}" 
                               class="form-input flex-1" 
                               placeholder="Your name" 
                               value="${currentUser}"
                               required>
                        <textarea id="comment-input-${post.id}" 
                                  class="form-input flex-2" 
                                  placeholder="Add a comment..." 
                                  rows="1"></textarea>
                    </div>
                    <div class="flex justify-end mt-2">
                        <button onclick="addComment(${post.id})" 
                                class="px-4 py-2 text-sm rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/30 text-cyan-300 hover:text-white transition-all duration-300">
                            Post Comment
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        return div;
    }

    // ==============================
    // CRUD OPERATIONS - POSTS
    // ==============================
    function createPost() {
        const authorName = document.getElementById('authorName').value.trim();
        const contentType = document.getElementById('contentType').value;
        const title = document.getElementById('title').value.trim();
        const description = document.getElementById('description').value.trim();
        const fileInput = document.getElementById('fileUpload');
        const youtubeUrl = document.getElementById('youtubeUrl').value.trim();
        
        if (!authorName || !title || !description) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Save current user
        currentUser = authorName;
        localStorage.setItem('currentUser', currentUser);
        
        // Create new post
        const newPost = {
            id: posts.length > 0 ? Math.max(...posts.map(p => p.id)) + 1 : 1,
            type: contentType,
            title: title,
            description: description,
            author: authorName,
            date: 'Just now',
            likes: 0,
            likedBy: [],
            comments: []
        };
        
        // Handle media based on content type
        if (contentType === 'video') {
            // For video type: check YouTube first
            if (youtubeUrl) {
                // YouTube video
                const videoId = extractYouTubeId(youtubeUrl);
                if (videoId) {
                    newPost.media = {
                        type: 'youtube',
                        url: `https://www.youtube.com/embed/${videoId}`
                    };
                    savePost(newPost);
                } else {
                    alert('Please enter a valid YouTube URL');
                    return;
                }
            } else if (fileInput.files.length > 0) {
                // Uploaded video file
                const file = fileInput.files[0];
                if (!file.type.startsWith('video/')) {
                    alert('Please upload a video file for video posts');
                    return;
                }
                
                // Check file size (50MB limit)
                if (file.size > 50 * 1024 * 1024) {
                    alert('Video file must be less than 50MB');
                    return;
                }
                
                // Create object URL for the video file
                const objectUrl = URL.createObjectURL(file);
                
                newPost.media = {
                    type: 'uploaded_video',
                    url: objectUrl,
                    fileName: file.name,
                    fileSize: file.size
                };
                
                // Store the video in cache for cleanup
                window.uploadedVideos[newPost.id] = {
                    url: objectUrl,
                    file: file
                };
                
                savePost(newPost);
            } else {
                // No media for video type (optional)
                savePost(newPost);
            }
        } else if (contentType === 'image') {
            // For image type, only uploaded images
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (!file.type.startsWith('image/')) {
                    alert('Please upload an image file for image posts');
                    return;
                }
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    newPost.media = {
                        type: 'image',
                        url: e.target.result
                    };
                    savePost(newPost);
                };
                
                reader.readAsDataURL(file);
            } else {
                // No media for image type (optional)
                savePost(newPost);
            }
        } else {
            // For article type, media is optional
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.type.startsWith('video/')) {
                    // Video for article type
                    const objectUrl = URL.createObjectURL(file);
                    newPost.media = {
                        type: 'uploaded_video',
                        url: objectUrl,
                        fileName: file.name,
                        fileSize: file.size
                    };
                    
                    // Store the video in cache for cleanup
                    window.uploadedVideos[newPost.id] = {
                        url: objectUrl,
                        file: file
                    };
                    
                    savePost(newPost);
                } else {
                    // Image for article type
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        newPost.media = {
                            type: 'image',
                            url: e.target.result
                        };
                        savePost(newPost);
                    };
                    
                    reader.readAsDataURL(file);
                }
            } else {
                // No media
                savePost(newPost);
            }
        }
    }

    function savePost(newPost) {
        // Add to posts array
        posts.unshift(newPost);
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Reset form - BUT DON'T RESET THE NAME FIELD!
        resetForm();
        
        // Clean up preview video URLs
        if (window.previewVideoURLs && window.previewVideoURLs.length > 0) {
            window.previewVideoURLs.forEach(url => URL.revokeObjectURL(url));
            window.previewVideoURLs = [];
        }
        
        // Update posts container
        const postsContainer = document.getElementById('postsContainer');
        const noPostsMessage = document.getElementById('noPostsMessage');
        const loadingIndicator = document.getElementById('loadingIndicator');
        
        // Hide no posts message if showing
        if (noPostsMessage && !noPostsMessage.classList.contains('hidden')) {
            noPostsMessage.classList.add('hidden');
        }
        
        // Hide loading indicator if showing
        if (loadingIndicator && loadingIndicator.style.display !== 'none') {
            loadingIndicator.style.display = 'none';
        }
        
        // Create and prepend the new post element
        const postElement = createPostElement(newPost);
        postsContainer.insertBefore(postElement, postsContainer.firstChild);
        
        // Scroll to new post
        setTimeout(() => {
            const newPostElement = document.getElementById(`post-${newPost.id}`);
            if (newPostElement) {
                newPostElement.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
                // Add highlight effect
                newPostElement.classList.add('border-cyan-500/50');
                setTimeout(() => {
                    newPostElement.classList.remove('border-cyan-500/50');
                }, 2000);
            }
        }, 100);
        
        // Show success message
        showNotification('Post shared successfully!');
        
        // Update stats
        updateStats();
    }

    function openEditPost(postId) {
        const post = posts.find(p => p.id === postId);
        if (!post) return;
        
        // Check if user is the author
        if (post.author !== currentUser) {
            alert('You can only edit your own posts');
            return;
        }
        
        // Set values in edit modal
        document.getElementById('editPostId').value = postId;
        document.getElementById('editTitle').value = post.title;
        document.getElementById('editDescription').value = post.description;
        
        // Show modal
        document.getElementById('editPostModal').classList.remove('hidden');
    }

    function updatePost() {
        const postId = parseInt(document.getElementById('editPostId').value);
        const title = document.getElementById('editTitle').value.trim();
        const description = document.getElementById('editDescription').value.trim();
        
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        // Check if user is the author
        if (posts[postIndex].author !== currentUser) {
            alert('You can only edit your own posts');
            return;
        }
        
        // Update post
        posts[postIndex].title = title;
        posts[postIndex].description = description;
        posts[postIndex].date = 'Updated just now';
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Update UI
        const postElement = document.getElementById(`post-${postId}`);
        if (postElement) {
            const titleElement = postElement.querySelector('h3.text-xl');
            const descElement = postElement.querySelector('p.text-gray-300');
            const dateElement = postElement.querySelector('.text-sm.text-gray-400');
            
            if (titleElement) titleElement.textContent = title;
            if (descElement) descElement.textContent = description;
            if (dateElement) dateElement.textContent = 'Updated just now';
        }
        
        closeEditModal();
        showNotification('Post updated successfully!');
    }

    function deletePost(postId) {
        if (!confirm('Are you sure you want to delete this post? All comments will also be deleted.')) {
            return;
        }
        
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        // Check if user is the author
        if (posts[postIndex].author !== currentUser) {
            alert('You can only delete your own posts');
            return;
        }
        
        // Clean up video object URL if exists
        if (window.uploadedVideos && window.uploadedVideos[postId]) {
            URL.revokeObjectURL(window.uploadedVideos[postId].url);
            delete window.uploadedVideos[postId];
        }
        
        // Remove post from array
        posts.splice(postIndex, 1);
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Remove from UI
        const postElement = document.getElementById(`post-${postId}`);
        if (postElement) {
            postElement.remove();
        }
        
        // Show message if no posts left
        if (posts.length === 0) {
            const noPostsMessage = document.getElementById('noPostsMessage');
            if (noPostsMessage) {
                noPostsMessage.classList.remove('hidden');
            }
        }
        
        showNotification('Post deleted successfully!');
        updateStats();
    }

    // ==============================
    // COMMENTS MANAGEMENT
    // ==============================
    function addComment(postId) {
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        const authorInput = document.getElementById(`comment-author-${postId}`);
        const commentInput = document.getElementById(`comment-input-${postId}`);
        
        const author = authorInput.value.trim();
        const text = commentInput.value.trim();
        
        if (!author || !text) {
            alert('Please enter your name and comment');
            return;
        }
        
        // Save current user
        currentUser = author;
        localStorage.setItem('currentUser', currentUser);
        
        // Also update the name field in the main form
        document.getElementById('authorName').value = author;
        
        // Create new comment
        const newComment = {
            id: Date.now(),
            author: author,
            text: text,
            date: 'Just now'
        };
        
        // Add comment to post
        if (!posts[postIndex].comments) {
            posts[postIndex].comments = [];
        }
        posts[postIndex].comments.push(newComment);
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Update UI
        const commentsContainer = document.getElementById(`comments-${postId}`);
        const commentElement = document.createElement('div');
        commentElement.className = 'comment-box';
        commentElement.id = `comment-${newComment.id}`;
        
        const isCommentAuthor = newComment.author === currentUser;
        commentElement.innerHTML = `
            ${isCommentAuthor ? `
                <div class="comment-actions">
                    <button onclick="openEditComment(${newComment.id}, ${postId})" class="edit-btn px-2 py-1 text-xs">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="deleteComment(${newComment.id}, ${postId})" class="delete-btn px-2 py-1 text-xs">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            ` : ''}
            <div class="flex items-center gap-3 mb-3">
                <div class="avatar-small">${author.charAt(0)}</div>
                <div>
                    <h5 class="text-sm font-bold">${author}</h5>
                    <p class="text-xs text-gray-400">${newComment.date}</p>
                </div>
            </div>
            <p class="text-gray-300">${text}</p>
        `;
        
        commentsContainer.appendChild(commentElement);
        
        // Update comment count
        const commentCountElement = document.querySelector(`#post-${postId} .fa-comment + span`);
        if (commentCountElement) {
            commentCountElement.textContent = posts[postIndex].comments.length;
        }
        
        // Clear input
        commentInput.value = '';
        
        showNotification('Comment added successfully!');
    }

    function openEditComment(commentId, postId) {
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        const commentIndex = posts[postIndex].comments.findIndex(c => c.id === commentId);
        if (commentIndex === -1) return;
        
        const comment = posts[postIndex].comments[commentIndex];
        
        // Check if user is the author
        if (comment.author !== currentUser) {
            alert('You can only edit your own comments');
            return;
        }
        
        // Set values in modal
        document.getElementById('editCommentId').value = commentId;
        document.getElementById('editCommentPostId').value = postId;
        document.getElementById('editCommentText').value = comment.text;
        
        // Show modal
        document.getElementById('editCommentModal').classList.remove('hidden');
    }

    function updateComment() {
        const commentId = parseInt(document.getElementById('editCommentId').value);
        const postId = parseInt(document.getElementById('editCommentPostId').value);
        const text = document.getElementById('editCommentText').value.trim();
        
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        const commentIndex = posts[postIndex].comments.findIndex(c => c.id === commentId);
        if (commentIndex === -1) return;
        
        // Check if user is the author
        if (posts[postIndex].comments[commentIndex].author !== currentUser) {
            alert('You can only edit your own comments');
            return;
        }
        
        // Update comment
        posts[postIndex].comments[commentIndex].text = text;
        posts[postIndex].comments[commentIndex].date = 'Edited just now';
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Update UI
        const commentElement = document.getElementById(`comment-${commentId}`);
        if (commentElement) {
            const textElement = commentElement.querySelector('p.text-gray-300');
            const dateElement = commentElement.querySelector('.text-xs.text-gray-400');
            
            if (textElement) textElement.textContent = text;
            if (dateElement) dateElement.textContent = 'Edited just now';
        }
        
        closeEditCommentModal();
        showNotification('Comment updated successfully!');
    }

    function deleteComment(commentId, postId) {
        if (!confirm('Are you sure you want to delete this comment?')) {
            return;
        }
        
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        const commentIndex = posts[postIndex].comments.findIndex(c => c.id === commentId);
        if (commentIndex === -1) return;
        
        // Check if user is the author
        if (posts[postIndex].comments[commentIndex].author !== currentUser) {
            alert('You can only delete your own comments');
            return;
        }
        
        // Remove comment
        posts[postIndex].comments.splice(commentIndex, 1);
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Remove from UI
        const commentElement = document.getElementById(`comment-${commentId}`);
        if (commentElement) {
            commentElement.remove();
        }
        
        // Update comment count
        const commentCountElement = document.querySelector(`#post-${postId} .fa-comment + span`);
        if (commentCountElement) {
            commentCountElement.textContent = posts[postIndex].comments.length;
        }
        
        showNotification('Comment deleted successfully!');
    }

    // ==============================
    // UTILITY FUNCTIONS
    // ==============================
    function likePost(postId) {
        const postIndex = posts.findIndex(p => p.id === postId);
        if (postIndex === -1) return;
        
        // Initialize likedBy array if not exists
        if (!posts[postIndex].likedBy) {
            posts[postIndex].likedBy = [];
        }
        
        // Toggle like
        if (posts[postIndex].likedBy.includes(currentUser)) {
            // Unlike
            posts[postIndex].likedBy = posts[postIndex].likedBy.filter(user => user !== currentUser);
            posts[postIndex].likes = Math.max(0, (posts[postIndex].likes || 0) - 1);
        } else {
            // Like
            posts[postIndex].likedBy.push(currentUser);
            posts[postIndex].likes = (posts[postIndex].likes || 0) + 1;
        }
        
        // Save to localStorage
        localStorage.setItem('safePawsPosts', JSON.stringify(posts));
        
        // Update UI
        const likeBtn = document.querySelector(`#post-${postId} .like-btn`);
        const likeCount = document.querySelector(`#post-${postId} .like-btn span`);
        
        if (likeBtn && likeCount) {
            likeBtn.classList.toggle('liked', posts[postIndex].likedBy.includes(currentUser));
            likeCount.textContent = posts[postIndex].likes;
        }
        
        showNotification(posts[postIndex].likedBy.includes(currentUser) ? 'Post liked!' : 'Post unliked');
    }

    function sharePost(postId) {
        const post = posts.find(p => p.id === postId);
        if (!post) return;
        
        // Create shareable URL
        const url = window.location.href.split('#')[0] + `#post-${postId}`;
        
        // Copy to clipboard
        navigator.clipboard.writeText(url).then(() => {
            showNotification('Link copied to clipboard! Share it with your friends.');
        }).catch(err => {
            console.error('Failed to copy: ', err);
            showNotification('Failed to copy link. Please try again.');
        });
    }

    function extractYouTubeId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    function resetForm() {
        // Reset form inputs - BUT KEEP THE NAME FIELD!
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        document.getElementById('fileUpload').value = '';
        document.getElementById('fileName').textContent = '';
        document.getElementById('fileName').classList.remove('text-cyan-400');
        document.getElementById('mediaPreview').classList.add('hidden');
        document.getElementById('mediaPreview').innerHTML = '';
        document.getElementById('youtubeUrl').value = '';
        document.getElementById('youtubePreview').classList.add('hidden');
        document.getElementById('youtubePreview').innerHTML = '';
        
        // Reset content type to article
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
        const articleTab = document.querySelector('.tab-button[data-type="article"]');
        if (articleTab) {
            articleTab.classList.add('active');
        }
        document.getElementById('contentType').value = 'article';
        
        // Reset sections visibility
        const youtubeSection = document.getElementById('youtubeSection');
        const fileUploadSection = document.getElementById('fileUploadSection');
        const uploadText = document.getElementById('uploadText');
        const fileTypeText = document.getElementById('fileTypeText');
        const fileInput = document.getElementById('fileUpload');
        
        if (youtubeSection) youtubeSection.classList.add('hidden');
        if (fileUploadSection) fileUploadSection.classList.remove('hidden');
        if (uploadText) uploadText.textContent = 'Choose file or drag & drop (optional)';
        if (fileTypeText) fileTypeText.textContent = 'Images & Videos up to 50MB';
        if (fileInput) fileInput.setAttribute('accept', 'image/*,video/*');
    }

    function removeMedia() {
        // Clean up preview video URL if it exists
        const videoElement = document.querySelector('#mediaPreview video');
        if (videoElement) {
            const source = videoElement.querySelector('source');
            if (source && source.src.startsWith('blob:')) {
                URL.revokeObjectURL(source.src);
            }
        }
        
        document.getElementById('fileUpload').value = '';
        document.getElementById('fileName').textContent = '';
        document.getElementById('fileName').classList.remove('text-cyan-400');
        document.getElementById('mediaPreview').classList.add('hidden');
        document.getElementById('mediaPreview').innerHTML = '';
    }

    function closeEditModal() {
        document.getElementById('editPostModal').classList.add('hidden');
    }

    function closeEditCommentModal() {
        document.getElementById('editCommentModal').classList.add('hidden');
    }

    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-20 right-5 bg-gradient-to-r from-green-600 to-green-800 text-white px-6 py-3 rounded-xl shadow-lg z-50 animate-slide-in';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    function animateCounters() {
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
        
        const heroSection = document.querySelector('section');
        if (heroSection) {
            observer.observe(heroSection);
        }
    }

    function updateStats() {
        const totalPosts = posts.length;
        const totalComments = posts.reduce((sum, post) => sum + (post.comments ? post.comments.length : 0), 0);
        
        // Update counter elements if they exist
        const postsCounter = document.querySelector('.stats-counter[data-count="1542"]');
        const membersCounter = document.querySelector('.stats-counter[data-count="836"]');
        
        if (postsCounter) {
            postsCounter.setAttribute('data-count', totalPosts);
            postsCounter.textContent = totalPosts;
        }
    }

    function cleanupVideoURLs() {
        // Clean up any orphaned video URLs from previous sessions
        if (window.uploadedVideos) {
            Object.keys(window.uploadedVideos).forEach(postId => {
                // Check if post still exists
                const postExists = posts.some(post => post.id == postId);
                if (!postExists) {
                    URL.revokeObjectURL(window.uploadedVideos[postId].url);
                    delete window.uploadedVideos[postId];
                }
            });
        }
    }

    // Navigation functions from original code
    function reportAnimal() {
        window.location.href = "{{ route('animal.report.form') }}";
    }

    function openLogin() {
        alert('Login feature will be integrated by another team member. For now, you can enter your name in the form above.');
    }

    // Expose functions to global scope for button onclick events
    window.likePost = likePost;
    window.addComment = addComment;
    window.openEditPost = openEditPost;
    window.deletePost = deletePost;
    window.openEditComment = openEditComment;
    window.deleteComment = deleteComment;
    window.closeEditModal = closeEditModal;
    window.closeEditCommentModal = closeEditCommentModal;
    window.sharePost = sharePost;
    window.removeMedia = removeMedia;
    window.reportAnimal = reportAnimal;
    window.openLogin = openLogin;
</script>
    </body>
</html>