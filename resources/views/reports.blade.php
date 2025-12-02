<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Reports - SafePaws</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style type="text/tailwindcss">
        /* Custom Styles */
        :root {
            --primary: #0ea5e9;
            --primary-dark: #0891b2;
            --secondary: #071331;
            --accent: #f59e0b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #0b2447;
        }

        body {
            background-color: #071331;
            color: #ffffff;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* Status Badges */
        .status-badge {
            @apply px-3 py-1 text-xs font-semibold rounded-full inline-flex items-center gap-1;
        }
        
        .status-pending { 
            background-color: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }
        
        .status-assigned { 
            background-color: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
        }
        
        .status-in-progress { 
            background-color: rgba(139, 92, 246, 0.2);
            color: #8b5cf6;
        }
        
        .status-rescued { 
            background-color: rgba(16, 185, 129, 0.2);
            color: #10b981;
        }
        
        .status-closed { 
            background-color: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
        }

        /* Priority Badges */
        .priority-high {
            @apply bg-red-500/20 text-red-300;
        }
        
        .priority-medium {
            @apply bg-yellow-500/20 text-yellow-300;
        }
        
        .priority-low {
            @apply bg-green-500/20 text-green-300;
        }

        /* Cards */
        .glass-card {
            @apply bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl shadow-lg;
        }

        .hover-lift {
            @apply transition-all duration-300 hover:-translate-y-1 hover:shadow-xl;
        }

        /* Buttons */
        .btn-primary {
            @apply bg-[#0ea5e9] hover:bg-[#0891b2] text-white px-4 py-2 rounded-lg font-medium 
                   transition-all duration-300 inline-flex items-center gap-2;
        }
        
        .btn-secondary {
            @apply bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg font-medium 
                   transition-all duration-300 inline-flex items-center gap-2 border border-white/20;
        }

        /* Table Styles */
        .dashboard-table {
            @apply min-w-full bg-white/5 rounded-lg overflow-hidden;
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
            @apply hover:bg-white/10 transition-colors duration-200 border-b border-white/5;
        }

        /* Sidebar Navigation */
        .nav-link {
            @apply flex items-center gap-3 px-4 py-3 text-gray-300 hover:text-white 
                   hover:bg-white/10 rounded-lg transition-all duration-300;
        }
        
        .nav-link.active {
            @apply bg-[#0ea5e9]/20 text-[#0ea5e9] border-l-4 border-[#0ea5e9];
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Main Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#0b2447]/80 backdrop-blur-sm border-r border-white/10 hidden lg:block">
            <!-- Logo -->
            <div class="p-6 border-b border-white/10">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#0ea5e9] rounded-xl flex items-center justify-center">
                        <i class="fas fa-paw text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">SafePaws</h1>
                        <p class="text-xs text-gray-400">Admin Dashboard</p>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-1">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ url('/reports') }}" class="nav-link active">
                    <i class="fas fa-flag"></i>
                    <span>Animal Reports</span>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">24</span>
                </a>
                
                <a href="{{ url('/rescues') }}" class="nav-link">
                    <i class="fas fa-ambulance"></i>
                    <span>Rescue Operations</span>
                </a>
                
                <a href="{{ url('/adoptions') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Adoptions</span>
                </a>
                
                <a href="{{ url('/users') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Users & Teams</span>
                </a>
                
                <a href="{{ url('/veterinarians') }}" class="nav-link">
                    <i class="fas fa-stethoscope"></i>
                    <span>Vet Collaborators</span>
                </a>
                
                <a href="{{ url('/donations') }}" class="nav-link">
                    <i class="fas fa-donate"></i>
                    <span>Donations</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-64 p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=0ea5e9&color=fff" 
                         alt="Admin" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-white">Admin User</h4>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation -->
            <header class="sticky top-0 z-40 bg-[#0b2447]/95 backdrop-blur-sm border-b border-white/10">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="lg:hidden text-gray-300 hover:text-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Page Title -->
                    <div>
                        <h2 class="text-xl font-bold text-white">Animal Reports</h2>
                        <p class="text-sm text-gray-400">Manage and track all animal reports</p>
                    </div>
                    
                    <!-- Right Side Actions -->
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/reports/create') }}" class="btn-primary">
                            <i class="fas fa-plus"></i>
                            New Report
                        </a>
                    </div>
                </div>
            </header>

            <!-- Filters and Stats -->
            <div class="p-6">
                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="glass-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-flag text-blue-400"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white">142</div>
                                <div class="text-sm text-gray-400">Total Reports</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-400"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white">24</div>
                                <div class="text-sm text-gray-400">Pending</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ambulance text-purple-400"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white">18</div>
                                <div class="text-sm text-gray-400">In Progress</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check text-green-400"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white">89</div>
                                <div class="text-sm text-gray-400">Rescued</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="glass-card p-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <div class="flex-1">
                            <input type="text" placeholder="Search reports..." class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-gray-400">
                        </div>
                        <div class="flex gap-2">
                            <select class="bg-white/10 text-white text-sm rounded-lg px-3 py-2">
                                <option>All Status</option>
                                <option>Pending</option>
                                <option>Assigned</option>
                                <option>In Progress</option>
                                <option>Rescued</option>
                                <option>Closed</option>
                            </select>
                            <select class="bg-white/10 text-white text-sm rounded-lg px-3 py-2">
                                <option>All Priority</option>
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                            </select>
                            <select class="bg-white/10 text-white text-sm rounded-lg px-3 py-2">
                                <option>All Animals</option>
                                <option>Dog</option>
                                <option>Cat</option>
                                <option>Other</option>
                            </select>
                            <button class="btn-secondary">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Reports Table -->
                <div class="glass-card p-6">
                    <div class="overflow-x-auto">
                        <table class="dashboard-table">
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Animal Details</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Reported</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Report 1 -->
                                <tr>
                                    <td class="font-medium">#SP-1048</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-dog text-blue-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Injured Dog</div>
                                                <div class="text-xs text-gray-400">German Shepherd, leg injury</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Central Park</div>
                                        <div class="text-xs text-gray-400">Near fountain</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-in-progress">
                                            <i class="fas fa-ambulance"></i>
                                            Rescue In Progress
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge priority-high">
                                            High
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Today, 10:30 AM</div>
                                        <div class="text-xs text-gray-400">By John D.</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/reports/SP-1048') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/rescues/create') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-ambulance"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Report 2 -->
                                <tr>
                                    <td class="font-medium">#SP-1047</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-pink-500/20 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-cat text-pink-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Sick Stray Cat</div>
                                                <div class="text-xs text-gray-400">Tabby, appears weak</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Maple Street</div>
                                        <div class="text-xs text-gray-400">Behind supermarket</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-clock"></i>
                                            Pending
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge priority-medium">
                                            Medium
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Yesterday, 3:45 PM</div>
                                        <div class="text-xs text-gray-400">By Sarah M.</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/reports/SP-1047') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Report 3 -->
                                <tr>
                                    <td class="font-medium">#SP-1046</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-dog text-blue-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Aggressive Dog</div>
                                                <div class="text-xs text-gray-400">Pitbull, loose in neighborhood</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Oak Avenue</div>
                                        <div class="text-xs text-gray-400">House #45</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-assigned">
                                            <i class="fas fa-user-check"></i>
                                            Assigned
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge priority-high">
                                            High
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">2 days ago</div>
                                        <div class="text-xs text-gray-400">By Police Dept.</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/reports/SP-1046') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/rescues/create') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-ambulance"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Report 4 -->
                                <tr>
                                    <td class="font-medium">#SP-1045</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-dove text-green-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Injured Bird</div>
                                                <div class="text-xs text-gray-400">Pigeon, broken wing</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">City Park</div>
                                        <div class="text-xs text-gray-400">Near lake</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-rescued">
                                            <i class="fas fa-check"></i>
                                            Rescued
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge priority-low">
                                            Low
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">3 days ago</div>
                                        <div class="text-xs text-gray-400">By Visitor</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/reports/SP-1045') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/adoptions/create') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-home"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Report 5 -->
                                <tr>
                                    <td class="font-medium">#SP-1044</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-pink-500/20 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-cat text-pink-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Stray Kittens</div>
                                                <div class="text-xs text-gray-400">3 kittens, appears healthy</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Industrial Area</div>
                                        <div class="text-xs text-gray-400">Warehouse district</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-closed">
                                            <i class="fas fa-times"></i>
                                            Closed
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge priority-low">
                                            Low
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">1 week ago</div>
                                        <div class="text-xs text-gray-400">By Factory Worker</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/reports/SP-1044') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-redo"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-400">
                            Showing 1 to 5 of 142 reports
                        </div>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 bg-[#0ea5e9] rounded-lg text-white">1</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">2</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">3</button>
                            <span class="px-3 py-1 text-gray-400">...</span>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">28</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="border-t border-white/10 bg-[#0b2447]/80 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#0ea5e9] rounded-lg flex items-center justify-center">
                                <i class="fas fa-paw text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-white">SafePaws Reports</div>
                                <div class="text-xs text-gray-400">Tracking animal welfare • © 2023</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-400">
                            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Dashboard</a>
                            <a href="{{ url('/privacy') }}" class="hover:text-white transition-colors">Privacy</a>
                            <a href="{{ url('/help') }}" class="hover:text-white transition-colors">Help</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Mobile Menu Script -->
    <script>
        // Mobile sidebar functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileSidebar = document.getElementById('mobileSidebar');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                // Create mobile sidebar if it doesn't exist
                if (!document.getElementById('mobileSidebarContent')) {
                    const sidebarHTML = `
                        <div class="fixed inset-0 z-50 lg:hidden" id="mobileSidebar">
                            <div class="absolute inset-0 bg-black/50" id="sidebarOverlay"></div>
                            <div class="absolute left-0 top-0 bottom-0 w-64 bg-[#0b2447] transform -translate-x-full transition-transform duration-300" id="mobileSidebarContent">
                                <div class="p-4 border-b border-white/10">
                                    <div class="flex items-center justify-between">
                                        <a href="{{ url('/') }}" class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-[#0ea5e9] rounded-xl flex items-center justify-center">
                                                <i class="fas fa-paw text-white text-lg"></i>
                                            </div>
                                            <div>
                                                <h1 class="text-xl font-bold text-white">SafePaws</h1>
                                                <p class="text-xs text-gray-400">Admin Dashboard</p>
                                            </div>
                                        </a>
                                        <button id="closeSidebar" class="text-gray-400 hover:text-white">
                                            <i class="fas fa-times text-xl"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <nav class="p-4 space-y-1">
                                    <a href="{{ url('/') }}" class="nav-link">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                    <a href="{{ url('/reports') }}" class="nav-link active">
                                        <i class="fas fa-flag"></i>
                                        <span>Animal Reports</span>
                                    </a>
                                    <a href="{{ url('/rescues') }}" class="nav-link">
                                        <i class="fas fa-ambulance"></i>
                                        <span>Rescue Operations</span>
                                    </a>
                                    <a href="{{ url('/adoptions') }}" class="nav-link">
                                        <i class="fas fa-home"></i>
                                        <span>Adoptions</span>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    `;
                    
                    document.body.insertAdjacentHTML('beforeend', sidebarHTML);
                    
                    // Add event listeners for the new sidebar
                    const sidebarOverlay = document.getElementById('sidebarOverlay');
                    const closeSidebar = document.getElementById('closeSidebar');
                    const sidebarContent = document.getElementById('mobileSidebarContent');
                    
                    function openMobileSidebar() {
                        document.getElementById('mobileSidebar').classList.remove('hidden');
                        setTimeout(() => {
                            sidebarContent.classList.remove('-translate-x-full');
                        }, 10);
                    }

                    function closeMobileSidebar() {
                        sidebarContent.classList.add('-translate-x-full');
                        setTimeout(() => {
                            document.getElementById('mobileSidebar').classList.add('hidden');
                        }, 300);
                    }

                    mobileMenuBtn.addEventListener('click', openMobileSidebar);
                    closeSidebar.addEventListener('click', closeMobileSidebar);
                    sidebarOverlay.addEventListener('click', closeMobileSidebar);
                    
                    // Open the sidebar
                    openMobileSidebar();
                } else {
                    // Toggle existing sidebar
                    const sidebar = document.getElementById('mobileSidebar');
                    const sidebarContent = document.getElementById('mobileSidebarContent');
                    
                    if (sidebar.classList.contains('hidden')) {
                        sidebar.classList.remove('hidden');
                        setTimeout(() => {
                            sidebarContent.classList.remove('-translate-x-full');
                        }, 10);
                    } else {
                        sidebarContent.classList.add('-translate-x-full');
                        setTimeout(() => {
                            sidebar.classList.add('hidden');
                        }, 300);
                    }
                }
            });
        }

        // Update active nav link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                }
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Button hover effects
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach(button => {
            button.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    </script>
</body>
</html>