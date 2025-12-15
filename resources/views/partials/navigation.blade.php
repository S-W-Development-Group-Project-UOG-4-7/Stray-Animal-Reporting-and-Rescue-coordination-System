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