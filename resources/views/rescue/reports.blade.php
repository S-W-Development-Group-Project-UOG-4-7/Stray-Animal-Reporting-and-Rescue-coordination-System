<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafePaws — Animal Reports Management</title>
    
    <!-- Laravel Vite directive -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Tailwind CSS as backup -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style type="text/tailwindcss">
        /* Reuse same styles from rescue-team dashboard */
        @keyframes paw-touch {
            0%,
            80%,
            100% {
                opacity: 0;
                transform: translateY(0) scale(1);
            }
            10%,
            50% {
                opacity: 1;
                transform: translateY(-10px) scale(1.1);
            }
        }

        @keyframes paw-tap {
            0%,
            100% {
                transform: scale(1);
            }
            50% {
                transform: scale(0.9);
            }
        }

        .animate-paw {
            animation: paw-touch 2s infinite;
        }

        /* Typography */
        .title {
            @apply text-[1.75rem] md:text-[3.125rem] leading-[1.05] font-semibold tracking-wide;
        }
        .subtitle {
            @apply text-[1.125rem] md:text-[1.625rem] font-light;
        }

        /* Buttons */
        .primary-btn {
            @apply bg-[#0ea5e9] hover:bg-[#0891b2] text-white px-6 py-3 rounded-md font-medium inline-flex items-center gap-2 transition duration-300;
        }
        .outline-btn {
            @apply border border-[#0ea5e9] text-[#0ea5e9] hover:bg-[#0ea5e9] hover:text-white px-5 py-2 rounded-md font-medium transition duration-300;
        }
        
        .success-btn {
            @apply bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md font-medium transition duration-300;
        }
        .warning-btn {
            @apply bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md font-medium transition duration-300;
        }
        .danger-btn {
            @apply bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md font-medium transition duration-300;
        }
        
        .emergency-btn {
            @apply bg-gradient-to-r from-red-600 to-orange-500 hover:from-red-700 hover:to-orange-600 text-white px-6 py-3 rounded-md font-bold inline-flex items-center gap-2 transition duration-300 shadow-lg shadow-red-500/25;
        }

        /* Card styles */
        .card {
            @apply bg-white/5 p-6 md:p-8 rounded-xl shadow-md border border-white/10;
        }
        
        .emergency-card {
            @apply bg-gradient-to-r from-red-900/30 to-orange-900/20 p-6 md:p-8 rounded-xl shadow-md border border-red-500/30;
        }

        /* Status badges */
        .status-badge {
            @apply px-3 py-1 text-xs font-semibold rounded-full;
        }
        .status-pending { @apply bg-yellow-500/20 text-yellow-300; }
        .status-assigned { @apply bg-blue-500/20 text-blue-300; }
        .status-in-progress { @apply bg-purple-500/20 text-purple-300; }
        .status-rescued { @apply bg-green-500/20 text-green-300; }
        .status-urgent { @apply bg-red-500/20 text-red-300; }
        .status-flood { @apply bg-gradient-to-r from-blue-500/30 to-cyan-500/30 text-white; }
        .status-emergency { @apply bg-gradient-to-r from-red-500/30 to-orange-500/30 text-white animate-pulse; }

        .gray-border {
            @apply border-t-[8px] border-[#0b2447];
        }

        body {
            background-color: #071331;
            font-family: system-ui, -apple-system, sans-serif;
        }

        /* Table styles */
        .table-container {
            @apply overflow-x-auto rounded-lg border border-white/10;
        }
        
        .dashboard-table {
            @apply min-w-full bg-white/5;
        }
        
        .dashboard-table thead {
            @apply bg-white/10;
        }
        
        .dashboard-table th {
            @apply px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider;
        }
        
        .dashboard-table td {
            @apply px-6 py-4 whitespace-nowrap text-sm text-gray-200;
        }
        
        .dashboard-table tbody tr {
            @apply hover:bg-white/10 border-b border-white/5 transition duration-150;
        }
        
        .flood-row {
            @apply bg-gradient-to-r from-blue-900/10 to-cyan-900/10 hover:from-blue-900/20 hover:to-cyan-900/20;
        }
        
        .emergency-row {
            @apply bg-gradient-to-r from-red-900/10 to-orange-900/10 hover:from-red-900/20 hover:to-orange-900/20 animate-pulse;
        }

        /* Filter styles */
        .filter-card {
            @apply bg-white/5 p-4 rounded-lg border border-white/10;
        }
        
        .filter-label {
            @apply block text-sm font-medium text-gray-300 mb-1;
        }
        
        .filter-select {
            @apply bg-white/10 border border-white/20 text-white rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-[#0ea5e9];
        }
        
        /* FIX: Make dropdown options visible */
        .filter-select option {
            @apply bg-[#071331] text-white;
        }
        
        /* Fix for all dropdowns */
        select option {
            @apply bg-[#071331] text-white;
        }
        
        .filter-input {
            @apply bg-white/10 border border-white/20 text-white rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-[#0ea5e9];
        }
        
        /* Map styles */
        .flood-map {
            @apply w-full h-64 md:h-80 rounded-lg bg-gradient-to-br from-blue-900 to-gray-900 overflow-hidden relative;
        }
        
        .flood-zone {
            @apply absolute rounded-full border-2 border-blue-400/50 bg-blue-500/20 backdrop-blur-sm flex items-center justify-center text-white font-bold;
        }
        
        /* Alert styles */
        .alert-banner {
            @apply bg-gradient-to-r from-red-600 to-orange-500 text-white p-4 rounded-lg mb-6 animate-pulse shadow-lg;
        }
        
        /* Progress bar */
        .progress-bar {
            @apply h-2 bg-white/10 rounded-full overflow-hidden;
        }
        
        .progress-fill {
            @apply h-full bg-gradient-to-r from-green-500 to-blue-500 transition-all duration-500;
        }
        
        /* Additional fixes for better visibility */
        .text-visible {
            @apply text-gray-200;
        }
        
        h1, h2, h3, h4, h5, h6 {
            @apply text-gray-100;
        }
    </style>
</head>
<body class="text-white">
    <!-- Copy the SAME navbar from rescue-team.blade.php -->
    <header class="sticky top-0 z-50 bg-[#071331]/95 backdrop-blur-sm border-b border-white/10">
        <div class="flex items-center justify-between px-5 py-4 mx-auto max-w-7xl md:px-12">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <svg width="42" height="42" viewBox="0 0 64 64" fill="none">
                    <rect width="64" height="64" rx="12" fill="#0ea5e9"></rect>
                    <path d="M34.5 36c4-1 8.5 0 11 3 2.5 3 1.8 7.4-0.6 10.7C43.9 53 39.6 54 34.5 54c-5 0-9.7-1-12.6-3.8C17.2 47.4 16.4 43 18.9 40c2.7-3.2 6.9-4.2 11.6-4z" fill="#fff"></path>
                    <circle cx="22.5" cy="20.5" r="6" fill="#fff"></circle>
                    <circle cx="31.5" cy="14.5" r="5" fill="#fff"></circle>
                    <circle cx="43.5" cy="18.5" r="4.5" fill="#fff"></circle>
                </svg>
                <span class="text-xl font-semibold text-white">SafePaws</span>
            </a>

            <!-- Desktop Menu -->
            <nav class="items-center hidden gap-6 text-sm font-medium text-white md:flex">
                <a href="{{ route('rescue.dashboard') }}" class="transition hover:text-yellow-300">DASHBOARD</a>
                <a href="{{ route('rescue.reports') }}" class="transition hover:text-yellow-300 text-yellow-300">ANIMAL REPORTS</a>
                <a href="{{ route('rescue.animals') }}" class="transition hover:text-yellow-300">ANIMALS</a>
                <a href="{{ route('rescue.adoptions') }}" class="transition hover:text-yellow-300">ADOPTIONS</a>

                <!-- User dropdown -->
                <div class="relative ml-4">
                    <button class="flex items-center gap-2 dropdown-btn">
                        <div class="w-8 h-8 bg-[#0ea5e9] rounded-full flex items-center justify-center">
                            <span class="font-semibold">RT</span>
                        </div>
                        <span>Rescue Team</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute right-0 hidden w-48 mt-2 rounded shadow-lg dropdown bg-blue-500/90 backdrop-blur-sm">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 transition hover:bg-red-400">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Mobile menu button -->
            <button class="md:hidden" id="mobileMenuBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile menu -->
        <div class="hidden md:hidden" id="mobileMenu">
            <div class="px-5 py-4 space-y-4 bg-[#0b2447]">
                <a href="{{ url('/') }}" class="block py-2">Home</a>
                <a href="{{ route('rescue.dashboard') }}" class="block py-2">Dashboard</a>
                <a href="{{ route('rescue.reports') }}" class="block py-2 text-yellow-300">Animal Reports</a>
                <a href="{{ route('rescue.status') }}" class="block py-2">My Assignments</a>
                <a href="{{ route('rescue.animals') }}" class="block py-2">Animals</a>
                <a href="{{ route('rescue.adoptions') }}" class="block py-2">Adoptions</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="block py-2 text-red-400">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-5 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white">Animal Reports Management</h1>
            <p class="text-gray-300 mt-2">Manage all incoming animal reports, assign to team members, and track progress.</p>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Filters Section -->
        <div class="card mb-6">
            <h2 class="text-xl font-bold mb-4">Filter Reports</h2>
            <form method="GET" action="{{ route('rescue.reports') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Status Filter -->
                    <div>
                        <label class="filter-label">Status</label>
                        <select name="status" class="filter-select">
                            <option value="" class="text-white bg-[#071331]">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }} class="text-white bg-[#071331]">Pending</option>
                            <option value="assigned" {{ request('status') == 'assigned' ? 'selected' : '' }} class="text-white bg-[#071331]">Assigned</option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }} class="text-white bg-[#071331]">In Progress</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }} class="text-white bg-[#071331]">Completed</option>
                        </select>
                    </div>

                    <!-- Animal Type Filter -->
                    <div>
                        <label class="filter-label">Animal Type</label>
                        <select name="animal_type" class="filter-select">
                            <option value="" class="text-white bg-[#071331]">All Types</option>
                            <option value="dog" {{ request('animal_type') == 'dog' ? 'selected' : '' }} class="text-white bg-[#071331]">Dog</option>
                            <option value="cat" {{ request('animal_type') == 'cat' ? 'selected' : '' }} class="text-white bg-[#071331]">Cat</option>
                            <option value="bird" {{ request('animal_type') == 'bird' ? 'selected' : '' }} class="text-white bg-[#071331]">Bird</option>
                            <option value="rabbit" {{ request('animal_type') == 'rabbit' ? 'selected' : '' }} class="text-white bg-[#071331]">Rabbit</option>
                            <option value="other" {{ request('animal_type') == 'other' ? 'selected' : '' }} class="text-white bg-[#071331]">Other</option>
                        </select>
                    </div>

                    <!-- Location Filter -->
                    <div>
                        <label class="filter-label">Location</label>
                        <input type="text" name="location" value="{{ request('location') }}" class="filter-input" placeholder="Search location...">
                    </div>

                    <!-- Date Filter -->
                    <div>
                        <label class="filter-label">Reported Date</label>
                        <input type="date" name="date" value="{{ request('date') }}" class="filter-input">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 mt-4">
                    <button type="submit" class="primary-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Apply Filters
                    </button>
                    <button type="button" class="outline-btn" onclick="window.location.href='{{ route('rescue.reports') }}'">Clear Filters</button>
                </div>
            </form>
        </div>

        <!-- Reports Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-6">
            <div class="filter-card">
                <div class="text-2xl font-bold text-white">{{ $stats['total'] }}</div>
                <div class="text-sm text-gray-300">Total Reports</div>
            </div>
            <div class="filter-card">
                <div class="text-2xl font-bold text-white">{{ $stats['pending'] }}</div>
                <div class="text-sm text-gray-300">Pending</div>
            </div>
            <div class="filter-card">
                <div class="text-2xl font-bold text-white">{{ $stats['assigned'] }}</div>
                <div class="text-sm text-gray-300">Assigned</div>
            </div>
            <div class="filter-card">
                <div class="text-2xl font-bold text-white">{{ $stats['in_progress'] }}</div>
                <div class="text-sm text-gray-300">In Progress</div>
            </div>
            <div class="filter-card">
                <div class="text-2xl font-bold text-white">{{ $stats['completed'] }}</div>
                <div class="text-sm text-gray-300">Completed</div>
            </div>
        </div>

        <!-- Reports Table -->
        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-white">All Incoming Reports</h2>
                <div class="flex gap-2">
                    <button class="outline-btn text-sm" onclick="window.location.reload()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Refresh
                    </button>
                </div>
            </div>
            
            <div class="table-container">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Animal Type</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Reported</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                        <tr>
                            <td class="font-medium">#{{ $report->report_id }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z"/>
                                        </svg>
                                    </div>
                                    <span>{{ $report->animal_type ?? 'Unknown' }}</span>
                                </div>
                            </td>
                            <td>{{ $report->location }}</td>
                            <td><span class="status-badge status-{{ str_replace('_', '-', $report->status) }}">{{ ucfirst(str_replace('_', ' ', $report->status)) }}</span></td>
                            <td>{{ $report->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="flex gap-2">
                                    @if($report->status == 'pending')
                                    <form action="{{ route('rescue.reports.accept', $report->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="text-xs primary-btn px-3 py-1">Accept</button>
                                    </form>
                                    @endif
                                    <a href="{{ route('rescue.reports.show', $report->id) }}" class="text-xs outline-btn px-3 py-1">View</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-400">No reports found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="flex items-center justify-between mt-6">
                <div class="text-sm text-gray-400">
                    Showing {{ $reports->firstItem() ?? 0 }}-{{ $reports->lastItem() ?? 0 }} of {{ $reports->total() }} reports
                </div>

                @if($reports->hasPages())
                <div class="flex items-center gap-2">
                    @if($reports->onFirstPage())
                        <span class="px-3 py-1 rounded bg-white/5 text-gray-500">← Previous</span>
                    @else
                        <a href="{{ $reports->previousPageUrl() }}" class="px-3 py-1 rounded hover:bg-white/10 text-white">← Previous</a>
                    @endif

                    @foreach ($reports->getUrlRange(1, $reports->lastPage()) as $page => $url)
                        @if ($page == $reports->currentPage())
                            <button class="px-3 py-1 rounded bg-[#0ea5e9] text-white">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="px-3 py-1 rounded hover:bg-white/10 text-white">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($reports->hasMorePages())
                        <a href="{{ $reports->nextPageUrl() }}" class="px-3 py-1 rounded hover:bg-white/10 text-white">Next →</a>
                    @else
                        <span class="px-3 py-1 rounded bg-white/5 text-gray-500">Next →</span>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Dropdown functionality
        document.querySelectorAll('.dropdown-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdown = this.closest('.relative').querySelector('.dropdown');
                dropdown.classList.toggle('hidden');
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', () => {
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        });

        // Filter functions
        function applyFilters() {
            alert("Filter functionality will be implemented in future update.");
        }

        function clearFilters() {
            window.location.reload();
        }
    </script>
</body>
</html>