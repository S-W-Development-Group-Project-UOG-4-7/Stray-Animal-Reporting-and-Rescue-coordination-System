<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'SafePaws')</title>
        @stack('styles')
        
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style type="text/tailwindcss">
            {{-- Your CSS styles here (same as original) --}}
        </style>
    </head>
    <body class="overflow-x-hidden text-white">
        <!-- Floating Background Elements -->
        <div class="floating-element floating-element-1"></div>
        <div class="floating-element floating-element-2"></div>

        <!-- Navigation -->
        <header class="fixed top-0 z-50 w-full border-b glass-effect border-white/10">
            <div class="px-5 py-4 container-custom">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 shadow-lg gradient-bg rounded-xl shadow-cyan-500/30">
                            <i class="text-xl text-white fas fa-paw"></i>
                        </div>
                        <div>
                            <span class="text-2xl font-bold">SafePaws</span>
                            <div class="text-xs text-gray-300">Protecting Every Paw</div>
                        </div>
                    </a>

                    <!-- Desktop Navigation -->
                    <nav class="items-center hidden gap-1 lg:flex">
                        <a href="{{ route('home') }}#home" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('home') }}#about" class="nav-link">About</a>
                        
                        <div class="relative dropdown">
                            <button class="flex items-center gap-1 nav-link">
                                Our Work <i class="text-xs fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('home') }}#sterilization" class="dropdown-item">
                                    <i class="mr-3 fas fa-stethoscope text-cyan-400"></i>
                                    Sterilization & Vaccination
                                </a>
                                <a href="{{ route('home') }}#rescue" class="dropdown-item">
                                    <i class="mr-3 fas fa-heart text-cyan-400"></i>
                                    Rescue Operations
                                </a>
                                <a href="{{ route('adoption.list') }}" class="dropdown-item">
                                    <i class="mr-3 fas fa-home text-cyan-400"></i>
                                    Adoption Programs
                                </a>
                                <a href="{{ route('home') }}#shelters" class="dropdown-item">
                                    <i class="mr-3 fas fa-shield-alt text-cyan-400"></i>
                                    Safe Shelters
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('adoption.list') }}" class="nav-link {{ request()->is('adoption*') ? 'active' : '' }}">Adopt</a>
                        <a href="{{ route('home') }}#success" class="nav-link">Success Stories</a>
                        <a href="{{ route('home') }}#contact" class="nav-link">Contact</a>
                        
                        <div class="flex items-center gap-4 ml-6">
                            <a href="{{ route('home') }}#report" class="primary-btn">
                                <i class="fas fa-bullhorn"></i>
                                Report Animal
                            </a>
                            <a href="{{ route('adoption.list') }}" class="secondary-btn">
                                <i class="fas fa-paw"></i>
                                Adopt
                            </a>
                        </div>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="text-2xl lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden px-5 py-6 border-t lg:hidden glass-effect border-white/10">
                <div class="space-y-4">
                    <a href="{{ route('home') }}#home" class="block px-4 py-3 rounded-lg hover:bg-white/5">Home</a>
                    <a href="{{ route('home') }}#about" class="block px-4 py-3 rounded-lg hover:bg-white/5">About</a>
                    <a href="{{ route('home') }}#work" class="block px-4 py-3 rounded-lg hover:bg-white/5">Our Work</a>
                    <a href="{{ route('adoption.list') }}" class="block px-4 py-3 rounded-lg hover:bg-white/5">Adopt a Pet</a>
                    <a href="{{ route('home') }}#success" class="block px-4 py-3 rounded-lg hover:bg-white/5">Success Stories</a>
                    <a href="{{ route('home') }}#contact" class="block px-4 py-3 rounded-lg hover:bg-white/5">Contact</a>
                    
                    <div class="pt-4 border-t border-white/10">
                        <a href="{{ route('home') }}#report" class="justify-center w-full mb-3 text-center primary-btn">
                            <i class="fas fa-bullhorn"></i>
                            Report Animal
                        </a>
                        <a href="{{ route('adoption.list') }}" class="justify-center w-full text-center secondary-btn">
                            <i class="fas fa-paw"></i>
                            Adopt a Pet
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

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
                            <li><a href="{{ route('home') }}#home" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Home</a></li>
                            <li><a href="{{ route('home') }}#about" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">About Us</a></li>
                            <li><a href="{{ route('home') }}#report" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Report Animal</a></li>
                            <li><a href="{{ route('adoption.list') }}" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Adopt a Pet</a></li>
                            <li><a href="{{ route('home') }}#track" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Track Report</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="mb-6 text-lg font-bold">Adoption Info</h4>
                        <ul class="space-y-3">
                            <li><a href="#how-to-adopt" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Adoption Process</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Adoption Fees</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Requirements</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">FAQ</a></li>
                            <li><a href="#" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Success Stories</a></li>
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
                                <span class="text-gray-300">adoptions@safepaws.org</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-clock text-cyan-400"></i>
                                <span class="text-gray-300">Mon-Sat: 9AM-6PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="pt-8 border-t border-white/10">
                    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                        <p class="text-sm text-gray-400">
                            © {{ date('Y') }} SafePaws. All rights reserved. | 
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

        @stack('scripts')
        
        <script>
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

            // Smooth scrolling for navigation links
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