<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Track Report - SafePaws</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <style type="text/tailwindcss">
            @keyframes pulse-glow {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.7; }
            }

            @keyframes slide-in {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
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

            .primary-btn {
                @apply gradient-bg text-white font-medium px-8 py-4 rounded-full hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .secondary-btn {
                @apply border-2 border-[#0ea5e9] text-[#0ea5e9] font-medium px-8 py-4 rounded-full hover:bg-[#0ea5e9] hover:text-white transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .card {
                @apply glass-effect rounded-2xl p-6 md:p-8;
            }

            .status-card {
                @apply card border-l-4;
            }

            .status-submitted {
                border-left-color: #0ea5e9;
                background: linear-gradient(90deg, rgba(14, 165, 233, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            }

            .status-reviewed {
                border-left-color: #22d3ee;
                background: linear-gradient(90deg, rgba(34, 211, 238, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            }

            .status-dispatched {
                border-left-color: #8b5cf6;
                background: linear-gradient(90deg, rgba(139, 92, 246, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            }

            .status-rescued {
                border-left-color: #10b981;
                background: linear-gradient(90deg, rgba(16, 185, 129, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            }

            .status-completed {
                border-left-color: #f59e0b;
                background: linear-gradient(90deg, rgba(245, 158, 11, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            }

            .status-timeline {
                position: relative;
                padding-left: 30px;
            }

            .status-timeline::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 3px;
                background: rgba(255, 255, 255, 0.1);
            }

            .timeline-step {
                position: relative;
                margin-bottom: 40px;
            }

            .timeline-step:last-child {
                margin-bottom: 0;
            }

            .timeline-step::before {
                content: '';
                position: absolute;
                left: -34px;
                top: 5px;
                width: 15px;
                height: 15px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.2);
                border: 3px solid #071331;
            }

            .timeline-step.active::before {
                background: #0ea5e9;
                box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.2);
            }

            .timeline-step.completed::before {
                background: #10b981;
            }

            .timeline-step.completed .timeline-content {
                opacity: 0.8;
            }

            .timeline-icon {
                @apply w-10 h-10 rounded-full flex items-center justify-center text-white text-lg;
            }

            .stat-badge {
                @apply px-3 py-1 rounded-full text-xs font-medium;
            }

            .status-badge-pending {
                @apply bg-yellow-500/20 text-yellow-300;
            }

            .status-badge-active {
                @apply bg-cyan-500/20 text-cyan-300;
            }

            .status-badge-completed {
                @apply bg-green-500/20 text-green-300;
            }

            .status-badge-closed {
                @apply bg-gray-500/20 text-gray-300;
            }

            .emergency-badge {
                @apply bg-red-500/20 text-red-300 px-3 py-1 rounded-full text-xs font-medium;
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

            /* Navigation styles */
            .nav-glass {
                background: rgba(7, 19, 49, 0.85);
                backdrop-filter: blur(15px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            }

            .nav-separator {
                @apply w-px h-6 bg-white/10 mx-2;
            }

            .report-btn {
                @apply flex items-center gap-2 px-4 py-2.5 rounded-full bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 transition-all duration-300 text-sm font-medium text-red-300 hover:text-white;
            }

            .login-btn {
                @apply flex items-center gap-2 px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm font-medium text-white/90 hover:text-white;
            }

            .nav-actions {
                @apply flex items-center gap-2 ml-4;
            }
        </style>
    </head>
    <body class="overflow-x-hidden text-white">
        <!-- Floating Background Elements -->
        <div class="floating-element floating-element-1"></div>
        <div class="floating-element floating-element-2"></div>

        <!-- Navigation -->
        <header class="fixed top-0 z-50 w-full nav-glass">
            <div class="px-5 py-3 max-w-[1400px] mx-auto">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
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
                        <a href="{{ route('home') }}#about" class="nav-link">About</a>
                        <a href="{{ route('home') }}#work" class="nav-link">Our Work</a>
                        <a href="{{ route('home') }}#involve" class="nav-link">Get Involved</a>
                        <a href="{{ route('home') }}#success" class="nav-link">Success Stories</a>
                        <a href="{{ route('home') }}#contact" class="nav-link">Contact</a>
                        
                        <!-- Navigation Actions -->
                        <div class="nav-actions">
                            <!-- Report Animal Button -->
                            <button class="report-btn" onclick="window.location.href='{{ route('reportanimal
                            
                            .form') }}'">
                                <i class="fas fa-exclamation-triangle"></i>
                                Report Animal
                            </button>

                            <!-- Donate Button -->
                            <a href="{{ route('home') }}#donate" class="border px-3 py-1.5 text-xs rounded-lg transition-all duration-200 bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
                                <i class="mr-1 fas fa-heart"></i>
                                Donate
                            </a>

                            <div class="nav-separator"></div>

                            <!-- Track Report Button - Active on this page -->
                            <button class="flex items-center gap-2 px-4 py-2 text-sm font-medium border rounded-lg bg-cyan-500/20 border-cyan-500/30 text-cyan-300">
                                <i class="fas fa-search"></i>
                                Track Report
                            </button>

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
                    <a href="{{ route('home') }}#about" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">About</a>
                    <a href="{{ route('home') }}#work" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Our Work</a>
                    <a href="{{ route('home') }}#involve" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Get Involved</a>
                    <a href="{{ route('home') }}#success" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Success Stories</a>
                    <a href="{{ route('home') }}#contact" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Contact</a>
                    
                    <!-- Action Buttons for Mobile -->
                    <div class="pt-3 mt-3 space-y-2 border-t border-white/10">
                        <button class="justify-center w-full report-btn" onclick="window.location.href='{{ route('animal.report.form') }}'">
                            <i class="fas fa-exclamation-triangle"></i>
                            Report Animal
                        </button>
                        
                        <button class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-cyan-500/20 border border-cyan-500/30 text-cyan-300 text-sm">
                            <i class="fas fa-search"></i>
                            Track Report
                        </button>
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

        <!-- Main Content -->
        <main class="pb-16 pt-28">
            <div class="max-w-[1400px] mx-auto px-5">
                <!-- Page Header -->
                <div class="mb-12 text-center">
                    <h1 class="mb-4 text-4xl font-bold md:text-5xl lg:text-6xl">
                        Track Your <span class="gradient-text">Report</span>
                    </h1>
                    <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">
                        Monitor the status of your animal rescue report in real-time
                    </p>
                </div>

                <!-- Search Form -->
                <div class="max-w-2xl mx-auto mb-12">
                    <div class="p-6 card">
                        <h2 class="mb-4 text-2xl font-bold">Enter Report Details</h2>
                        <p class="mb-6 text-gray-300">Enter your Report ID and contact information to track your report</p>
                        
                        <form id="track-report-form" class="space-y-6">
                            <div>
                                <label for="report_id" class="block mb-2 font-medium">Report ID</label>
                                <div class="relative">
                                    <i class="absolute fas fa-hashtag left-4 top-4 text-cyan-400"></i>
                                    <input type="text" id="report_id" name="report_id" 
                                           class="w-full py-3 pl-12 pr-4 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/30"
                                           placeholder="e.g. SP-2025-2835-1A7B" 
                                           value="{{ request()->input('id', 'SP-2025-2835-1A7B') }}">
                                </div>
                            </div>
                            
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label for="contact_email" class="block mb-2 font-medium">Email Address</label>
                                    <input type="email" id="contact_email" name="contact_email" 
                                           class="w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                                           placeholder="rose2335041@gmail.com"
                                           value="rose2335041@gmail.com">
                                </div>
                                <div>
                                    <label for="contact_phone" class="block mb-2 font-medium">Phone Number</label>
                                    <input type="tel" id="contact_phone" name="contact_phone" 
                                           class="w-full px-4 py-3 transition-all duration-300 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                                           placeholder="0755028786"
                                           value="0755028786">
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full primary-btn">
                                <i class="mr-2 fas fa-search"></i>
                                Track Report Status
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Report Status Timeline -->
                <div id="report-details" class="max-w-6xl mx-auto animate-slide-in">
                    <!-- Report Summary -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div class="p-6 status-card status-submitted">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="mb-2 text-xl font-bold">Report ID: SP-2025-2835-1A7B</h3>
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-active">Active</span>
                                        <span class="emergency-badge">
                                            <i class="mr-1 fas fa-exclamation-triangle"></i>
                                            Emergency
                                        </span>
                                    </div>
                                </div>
                                <button class="text-gray-400 hover:text-white" onclick="printReport()">
                                    <i class="text-lg fas fa-print"></i>
                                </button>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div>
                                    <p class="text-sm text-gray-400">Submitted</p>
                                    <p class="font-medium">12/28/2025, 9:58 PM</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Last Updated</p>
                                    <p class="font-medium">12/28/2025, 10:30 PM</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Priority</p>
                                    <p class="font-medium text-red-400">High</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Response Time</p>
                                    <p class="font-medium">~45 minutes</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 status-card status-rescued">
                            <h3 class="mb-4 text-xl font-bold">Animal Information</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-400">Type</p>
                                    <p class="font-medium">Dog</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Condition</p>
                                    <p class="font-medium text-red-400">Injured</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Location</p>
                                    <p class="font-medium">Central Park Area</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Reporter</p>
                                    <p class="font-medium">Rose Mamy</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-400">Description</p>
                                <p class="font-medium">Medium-sized brown dog, appears dirty and injured, limping on front left leg</p>
                            </div>
                        </div>
                    </div>

                    <!-- Status Timeline -->
                    <div class="p-6 card">
                        <h3 class="mb-6 text-2xl font-bold gradient-text">Rescue Progress Timeline</h3>
                        
                        <div class="status-timeline">
                            <!-- Step 1: Submitted -->
                            <div class="timeline-step completed">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon gradient-bg">
                                                <i class="fas fa-paper-plane"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Report Submitted</h4>
                                                <p class="text-gray-400">12/28/2025, 9:58 PM</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-completed">Completed</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Your report has been received and is being reviewed by our emergency response team.</p>
                                </div>
                            </div>

                            <!-- Step 2: Under Review -->
                            <div class="timeline-step completed">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon gradient-bg">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Under Review</h4>
                                                <p class="text-gray-400">12/28/2025, 10:05 PM</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-completed">Completed</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Emergency response coordinator has reviewed the report and dispatched rescue team.</p>
                                    <div class="p-4 mt-3 rounded-lg ml-14 bg-white/5">
                                        <p class="text-sm text-gray-400">Coordinator Note:</p>
                                        <p class="text-gray-300">"High priority - injured animal in public area. Dispatching Team Alpha immediately."</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Team Dispatched -->
                            <div class="timeline-step completed">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon" style="background: linear-gradient(135deg, #8b5cf6, #a855f7);">
                                                <i class="fas fa-ambulance"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Rescue Team Dispatched</h4>
                                                <p class="text-gray-400">12/28/2025, 10:15 PM</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-completed">Completed</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Rescue Team Alpha has been dispatched to the location. ETA: 25 minutes.</p>
                                    <div class="grid grid-cols-2 gap-4 p-4 mt-3 rounded-lg ml-14 bg-white/5">
                                        <div>
                                            <p class="text-sm text-gray-400">Team:</p>
                                            <p class="font-medium">Alpha Team</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-400">Members:</p>
                                            <p class="font-medium">Sarah, Mike, David</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Animal Located -->
                            <div class="timeline-step active">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon" style="background: linear-gradient(135deg, #10b981, #34d399);">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Animal Located</h4>
                                                <p class="text-gray-400">12/28/2025, 10:30 PM</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-active">In Progress</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Rescue team has located the injured dog at Central Park near the fountain. Initial assessment shows leg injury.</p>
                                    <div class="p-4 mt-3 rounded-lg ml-14 bg-white/5">
                                        <p class="text-sm text-gray-400">Field Update from Sarah (Rescue Team):</p>
                                        <p class="text-gray-300">"Found the dog. Front left leg appears injured, but animal is calm. Administering first aid and preparing for transport."</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Medical Treatment -->
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                                                <i class="fas fa-stethoscope"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Medical Treatment</h4>
                                                <p class="text-gray-400">Pending</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-pending">Pending</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Animal will receive full medical examination and treatment at our emergency clinic.</p>
                                </div>
                            </div>

                            <!-- Step 6: Safe Shelter -->
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon" style="background: linear-gradient(135deg, #8b5cf6, #a855f7);">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Safe Shelter</h4>
                                                <p class="text-gray-400">Pending</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-pending">Pending</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Animal will be transferred to our shelter for recovery and rehabilitation.</p>
                                </div>
                            </div>

                            <!-- Step 7: Adoption/Release -->
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="timeline-icon" style="background: linear-gradient(135deg, #10b981, #34d399);">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold">Adoption or Release</h4>
                                                <p class="text-gray-400">Pending</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-pending">Pending</span>
                                    </div>
                                    <p class="text-gray-300 ml-14">Once healthy, animal will be evaluated for adoption or safe release.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact & Actions -->
                    <div class="grid gap-6 mt-8 md:grid-cols-2">
                        <div class="p-6 card">
                            <h3 class="mb-4 text-xl font-bold">Contact Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <i class="text-cyan-400 fas fa-user"></i>
                                    <div>
                                        <p class="text-sm text-gray-400">Reporter</p>
                                        <p class="font-medium">Rose Mamy</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="text-cyan-400 fas fa-phone"></i>
                                    <div>
                                        <p class="text-sm text-gray-400">Phone</p>
                                        <p class="font-medium">0755028786</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="text-cyan-400 fas fa-envelope"></i>
                                    <div>
                                        <p class="text-sm text-gray-400">Email</p>
                                        <p class="font-medium">rose2335041@gmail.com</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="text-red-400 fas fa-exclamation-triangle"></i>
                                    <div>
                                        <p class="text-sm text-gray-400">Emergency Contact</p>
                                        <p class="font-medium text-red-300">(555) 911-ANIMAL</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 card">
                            <h3 class="mb-4 text-xl font-bold">Actions</h3>
                            <div class="space-y-4">
                                <button onclick="updateReport()" class="flex items-center justify-between w-full p-4 transition-all duration-300 rounded-lg hover:bg-white/5 group">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-10 h-10 rounded-full gradient-bg">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Update Report</p>
                                            <p class="text-sm text-gray-400">Add more information or photos</p>
                                        </div>
                                    </div>
                                    <i class="text-gray-400 transition-transform group-hover:translate-x-2 fas fa-arrow-right"></i>
                                </button>
                                
                                <button onclick="contactTeam()" class="flex items-center justify-between w-full p-4 transition-all duration-300 rounded-lg hover:bg-white/5 group">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-10 h-10 rounded-full gradient-bg">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Contact Rescue Team</p>
                                            <p class="text-sm text-gray-400">Send message to responding team</p>
                                        </div>
                                    </div>
                                    <i class="text-gray-400 transition-transform group-hover:translate-x-2 fas fa-arrow-right"></i>
                                </button>
                                
                                <button onclick="shareReport()" class="flex items-center justify-between w-full p-4 transition-all duration-300 rounded-lg hover:bg-white/5 group">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-10 h-10 rounded-full gradient-bg">
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Share Report</p>
                                            <p class="text-sm text-gray-400">Share status with friends or family</p>
                                        </div>
                                    </div>
                                    <i class="text-gray-400 transition-transform group-hover:translate-x-2 fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Gallery -->
                    <div class="p-6 mt-8 card">
                        <h3 class="mb-6 text-2xl font-bold gradient-text">Photos</h3>
                        <div class="grid gap-4 md:grid-cols-3">
                            <div class="overflow-hidden rounded-xl">
                                <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=800&auto=format&fit=crop" 
                                     alt="Reported animal" 
                                     class="object-cover w-full h-48 transition-transform duration-300 hover:scale-105">
                                <p class="p-3 text-sm text-center text-gray-400">Submitted Photo</p>
                            </div>
                            <div class="overflow-hidden rounded-xl">
                                <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w-800&auto=format&fit=crop" 
                                     alt="Rescue team" 
                                     class="object-cover w-full h-48 transition-transform duration-300 hover:scale-105">
                                <p class="p-3 text-sm text-center text-gray-400">Rescue Team</p>
                            </div>
                            <div class="overflow-hidden rounded-xl">
                                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?q=80&w=800&auto=format&fit=crop" 
                                     alt="Animal shelter" 
                                     class="object-cover w-full h-48 transition-transform duration-300 hover:scale-105">
                                <p class="p-3 text-sm text-center text-gray-400">Safe Shelter</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Multiple Reports Section -->
                <div class="max-w-6xl mx-auto mt-16">
                    <h2 class="mb-6 text-2xl font-bold text-center">Your Recent Reports</h2>
                    
                    <div class="overflow-hidden rounded-2xl glass-effect">
                        <table class="w-full">
                            <thead class="border-b border-white/10">
                                <tr>
                                    <th class="p-4 text-left">Report ID</th>
                                    <th class="p-4 text-left">Animal</th>
                                    <th class="p-4 text-left">Status</th>
                                    <th class="p-4 text-left">Date</th>
                                    <th class="p-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-white/5 hover:bg-white/5">
                                    <td class="p-4">
                                        <a href="#" class="font-medium text-cyan-400 hover:underline">SP-2025-2835-1A7B</a>
                                        <span class="text-xs emergency-badge">Emergency</span>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <i class="text-lg fas fa-dog"></i>
                                            <div>
                                                <p class="font-medium">Dog</p>
                                                <p class="text-sm text-gray-400">Injured, limping</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-active">In Progress</span>
                                    </td>
                                    <td class="p-4">
                                        <p>12/28/2025</p>
                                        <p class="text-sm text-gray-400">9:58 PM</p>
                                    </td>
                                    <td class="p-4">
                                        <button onclick="window.location.href='{{ route('tracking-status') }}?id=SP-2025-2835-1A7B'" 
                                                class="px-3 py-1 text-sm transition-colors duration-300 border rounded-lg text-cyan-400 border-cyan-500/30 hover:bg-cyan-500/10">
                                            Track
                                        </button>
                                    </td>
                                </tr>
                                
                                <tr class="border-b border-white/5 hover:bg-white/5">
                                    <td class="p-4">
                                        <a href="#" class="font-medium text-cyan-400 hover:underline">SP-2025-2730-8C2D</a>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <i class="text-lg fas fa-cat"></i>
                                            <div>
                                                <p class="font-medium">Cat</p>
                                                <p class="text-sm text-gray-400">Stray, hungry</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-completed">Rescued</span>
                                    </td>
                                    <td class="p-4">
                                        <p>12/27/2025</p>
                                        <p class="text-sm text-gray-400">3:20 PM</p>
                                    </td>
                                    <td class="p-4">
                                        <button onclick="window.location.href='{{ route('track.report') }}?id=SP-2025-2730-8C2D'" 
                                                class="px-3 py-1 text-sm transition-colors duration-300 border rounded-lg text-cyan-400 border-cyan-500/30 hover:bg-cyan-500/10">
                                            View
                                        </button>
                                    </td>
                                </tr>
                                
                                <tr class="hover:bg-white/5">
                                    <td class="p-4">
                                        <a href="#" class="font-medium text-cyan-400 hover:underline">SP-2025-2625-4E9F</a>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <i class="text-lg fas fa-dog"></i>
                                            <div>
                                                <p class="font-medium">Dog</p>
                                                <p class="text-sm text-gray-400">Lost, no collar</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 text-sm rounded-full status-badge-closed">Closed</span>
                                    </td>
                                    <td class="p-4">
                                        <p>12/26/2025</p>
                                        <p class="text-sm text-gray-400">11:45 AM</p>
                                    </td>
                                    <td class="p-4">
                                        <button onclick="window.location.href='{{ route('track.report') }}?id=SP-2025-2625-4E9F'" 
                                                class="px-3 py-1 text-sm transition-colors duration-300 border rounded-lg text-cyan-400 border-cyan-500/30 hover:bg-cyan-500/10">
                                            View
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-transparent to-[#0b2447] pt-12 pb-8">
            <div class="max-w-[1400px] mx-auto px-5">
                <div class="text-center">
                    <p class="text-sm text-gray-400">
                        © 2025 SafePaws. All rights reserved. | 
                        <a href="#" class="transition-colors duration-300 hover:text-cyan-400">Privacy Policy</a> | 
                        <a href="#" class="transition-colors duration-300 hover:text-cyan-400">Terms of Service</a>
                    </p>
                    <p class="mt-2 text-sm text-gray-400">
                        Emergency Response Available 24/7 • (555) 911-ANIMAL
                    </p>
                </div>
            </div>
        </footer>

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

            // Form submission
            const trackForm = document.getElementById('track-report-form');
            
            if (trackForm) {
                trackForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const reportId = document.getElementById('report_id').value;
                    const email = document.getElementById('contact_email').value;
                    const phone = document.getElementById('contact_phone').value;
                    
                    // Simple validation
                    if (!reportId) {
                        alert('Please enter a Report ID');
                        return;
                    }
                    
                    if (!email && !phone) {
                        alert('Please enter at least one contact method (email or phone)');
                        return;
                    }
                    
                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="mr-2 fas fa-spinner fa-spin"></i> Searching...';
                    submitBtn.disabled = true;
                    
                    // Simulate API call
                    setTimeout(() => {
                        // Scroll to report details
                        document.getElementById('report-details').scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                        
                        // Reset button
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        
                        // Show success message (you could add a toast notification here)
                        console.log('Report tracked:', { reportId, email, phone });
                    }, 1500);
                });
            }

            // Action functions
            function printReport() {
                window.print();
            }

            function updateReport() {
                const reportId = document.getElementById('report_id').value || 'SP-2025-2835-1A7B';
                alert(`Redirecting to update form for report: ${reportId}`);
                // In a real app: window.location.href = `/reports/${reportId}/update`;
            }

            function contactTeam() {
                alert('Opening contact form to message the rescue team...');
                // In a real app: open a modal with a contact form
            }

            function shareReport() {
                const reportId = document.getElementById('report_id').value || 'SP-2025-2835-1A7B';
                const shareUrl = window.location.href.split('?')[0] + `?id=${reportId}`;
                
                if (navigator.share) {
                    navigator.share({
                        title: `SafePaws Report: ${reportId}`,
                        text: `Track the status of this animal rescue report on SafePaws`,
                        url: shareUrl,
                    });
                } else {
                    // Fallback: copy to clipboard
                    navigator.clipboard.writeText(shareUrl).then(() => {
                        alert('Report link copied to clipboard!');
                    });
                }
            }

            function openLogin() {
                alert('Login feature coming soon!');
            }

            // Auto-populate from URL parameters
            document.addEventListener('DOMContentLoaded', function() {
                const urlParams = new URLSearchParams(window.location.search);
                const reportId = urlParams.get('id');
                
                if (reportId) {
                    document.getElementById('report_id').value = reportId;
                    
                    // Auto-submit form if ID is provided
                    setTimeout(() => {
                        trackForm.dispatchEvent(new Event('submit'));
                    }, 500);
                }
            });
        </script>
    </body>
</html>