<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Reports - SafePaws</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <style type="text/tailwindcss">
            @keyframes slide-in {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
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

            .primary-btn {
                @apply gradient-bg text-white font-medium px-8 py-4 rounded-full hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .secondary-btn {
                @apply border-2 border-[#0ea5e9] text-[#0ea5e9] font-medium px-8 py-4 rounded-full hover:bg-[#0ea5e9] hover:text-white transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .card {
                @apply glass-effect rounded-2xl p-6 md:p-8;
            }

            .status-badge {
                @apply px-3 py-1 rounded-full text-xs font-medium;
            }

            .status-submitted {
                @apply bg-blue-500/20 text-blue-300;
            }

            .status-under_review {
                @apply bg-cyan-500/20 text-cyan-300;
            }

            .status-team_dispatched {
                @apply bg-purple-500/20 text-purple-300;
            }

            .status-rescued {
                @apply bg-green-500/20 text-green-300;
            }

            .status-completed {
                @apply bg-yellow-500/20 text-yellow-300;
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

            .report-btn {
                @apply flex items-center gap-2 px-4 py-2.5 rounded-full bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 transition-all duration-300 text-sm font-medium text-red-300 hover:text-white;
            }

            .login-btn {
                @apply flex items-center gap-2 px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm font-medium text-white/90 hover:text-white;
            }

            .nav-actions {
                @apply flex items-center gap-2 ml-4;
            }

            .nav-separator {
                @apply w-px h-6 bg-white/10 mx-2;
            }
        </style>
        @php
use Illuminate\Support\Str;
@endphp
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
                            <button class="report-btn" onclick="window.location.href='{{ route('animal.report.form') }}'">
                                <i class="fas fa-exclamation-triangle"></i>
                                Report Animal
                            </button>

                            <!-- Donate Button -->
                            <a href="{{ route('home') }}#donate" class="border px-3 py-1.5 text-xs rounded-lg transition-all duration-200 bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
                                <i class="mr-1 fas fa-heart"></i>
                                Donate
                            </a>

                            <div class="nav-separator"></div>

                            <!-- My Reports Button - Active on this page -->
                            <button class="flex items-center gap-2 px-4 py-2 text-sm font-medium border rounded-lg bg-cyan-500/20 border-cyan-500/30 text-cyan-300">
                                <i class="fas fa-history"></i>
                                My Reports
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
                            <i class="fas fa-history"></i>
                            My Reports
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
        <main class="pb-16 pt-28 animate-slide-in">
            <div class="max-w-[1400px] mx-auto px-5">
                <!-- Page Header -->
                <div class="mb-12 text-center">
                    <h1 class="mb-4 text-4xl font-bold md:text-5xl lg:text-6xl">
                        My <span class="gradient-text">Reports</span>
                    </h1>
                    <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl">
                        Track all your submitted animal rescue reports
                    </p>
                    
                    <div class="flex flex-col items-center justify-center gap-4 mt-8 sm:flex-row">
    <div class="px-6 py-3 card">
        <p class="text-sm text-gray-400">Total Reports</p>
        <p class="text-3xl font-bold">{{ $total_reports ?? 0 }}</p>
    </div>
    <div class="px-6 py-3 card">
        <p class="text-sm text-gray-400">Active Reports</p>
        <p class="text-3xl font-bold">{{ $active_reports ?? 0 }}</p>
    </div>
    <div class="px-6 py-3 card">
        <p class="text-sm text-gray-400">Completed</p>
        <p class="text-3xl font-bold">{{ $completed_reports ?? 0 }}</p>
    </div>
</div>
                </div>

                <!-- Reports List -->
                <div class="mb-12">
                    @if(empty($reports))
                        <!-- Empty State -->
                        <div class="max-w-2xl mx-auto text-center card">
                            <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full gradient-bg">
                                <i class="text-2xl text-white fas fa-inbox"></i>
                            </div>
                            <h3 class="mb-3 text-2xl font-bold">No Reports Yet</h3>
                            <p class="mb-6 text-gray-300">You haven't submitted any animal rescue reports yet.</p>
                            <a href="{{ route('animal.report.form') }}" class="primary-btn">
                                <i class="mr-2 fas fa-exclamation-triangle"></i>
                                Report Your First Animal
                            </a>
                        </div>
                    @else
                       <!-- Reports Table -->
<div class="overflow-hidden rounded-2xl glass-effect">
    <table class="w-full">
        <thead class="border-b border-white/10">
            <tr>
                <th class="p-4 text-left">Report ID</th>
                <th class="p-4 text-left">Animal & Details</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Date</th>
                <th class="p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr class="transition-colors duration-200 border-b border-white/5 hover:bg-white/5">
                <td class="p-4">
                    <a href="{{ route('track.report', $report->report_id) }}" class="font-medium text-cyan-400 hover:underline">
                        {{ $report->report_id }}
                    </a>
                    @if($report->animal_type === 'Aggressive/Dangerous')
                    <span class="text-xs emergency-badge">Emergency</span>
                    @endif
                </td>
                <td class="p-4">
                    <div class="flex items-center gap-3">
                        <!-- Animal icon based on type -->
                        <div class="flex items-center justify-center w-10 h-10 rounded-full {{ $report->animal_type === 'Aggressive/Dangerous' ? 'bg-red-500/20' : 'bg-cyan-500/20' }}">
                            @if($report->animal_type === 'Aggressive/Dangerous')
                            <i class="text-red-400 fas fa-exclamation-triangle"></i>
                            @elseif(in_array($report->animal_type, ['Sick/Injured', 'Abandoned']))
                            <i class="fas fa-heartbeat text-cyan-400"></i>
                            @else
                            <i class="text-gray-400 fas fa-paw"></i>
                            @endif
                        </div>
                        <div>
                            <p class="font-medium">{{ $report->animal_type }}</p>
                            <p class="text-sm text-gray-400 truncate max-w-[200px]">{{ Str::limit($report->description, 50) }}</p>
                            <p class="text-xs text-gray-500">{{ $report->location }}</p>
                        </div>
                    </div>
                </td>
                <td class="p-4">
                    <span class="status-badge {{ $report->getStatusBadgeClass() }}">
                        {{ $report->getStatusText() }}
                    </span>
                </td>
                <td class="p-4">
                    <p>{{ $report->created_at->format('M d, Y') }}</p>
                    <p class="text-sm text-gray-400">{{ $report->created_at->format('h:i A') }}</p>
                </td>
                <td class="p-4">
                    <div class="flex gap-2">
                        <a href="{{ route('track.report', $report->report_id) }}" 
                           class="px-3 py-1.5 text-sm transition-all duration-300 border rounded-lg text-cyan-400 border-cyan-500/30 hover:bg-cyan-500/10">
                            <i class="mr-1 fas fa-search"></i>
                            Track
                        </a>
                        <button onclick="shareReport('{{ $report->report_id }}')" 
                                class="px-3 py-1.5 text-sm transition-all duration-300 border rounded-lg text-gray-400 border-gray-500/30 hover:bg-gray-500/10">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col justify-center gap-6 sm:flex-row">
                    <a href="{{ route('animal.report.form') }}" class="primary-btn">
                        <i class="mr-2 fas fa-plus"></i>
                        Submit New Report
                    </a>
                    <a href="{{ route('home') }}" class="secondary-btn">
                        <i class="mr-2 fas fa-home"></i>
                        Back to Home
                    </a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-transparent to-[#0b2447] pt-12 pb-8">
            <div class="max-w-[1400px] mx-auto px-5">
                <div class="text-center">
                    <p class="text-sm text-gray-400">
                        © {{ date('Y') }} SafePaws. All rights reserved. | 
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

            function shareReport(reportId) {
                const shareUrl = window.location.origin + '/track/' + reportId;
                
                if (navigator.share) {
                    navigator.share({
                        title: 'SafePaws Report: ' + reportId,
                        text: 'Check the status of this animal rescue report',
                        url: shareUrl,
                    });
                } else {
                    navigator.clipboard.writeText(shareUrl).then(() => {
                        alert('Report link copied to clipboard!');
                    });
                }
            }

            function openLogin() {
                alert('Login feature coming soon!');
            }
        </script>
    </body>
</html>