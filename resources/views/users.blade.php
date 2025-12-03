<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users & Teams - SafePaws</title>
    
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
        
        .status-active { 
            background-color: rgba(16, 185, 129, 0.2);
            color: #10b981;
        }
        
        .status-inactive { 
            background-color: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
        }
        
        .status-on-leave { 
            background-color: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }
        
        .status-busy { 
            background-color: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        /* Role Badges */
        .role-admin {
            @apply bg-purple-500/20 text-purple-300;
        }
        
        .role-rescue {
            @apply bg-blue-500/20 text-blue-300;
        }
        
        .role-vet {
            @apply bg-green-500/20 text-green-300;
        }
        
        .role-staff {
            @apply bg-yellow-500/20 text-yellow-300;
        }
        
        .role-volunteer {
            @apply bg-pink-500/20 text-pink-300;
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

        .btn-success {
            @apply bg-[#10b981] hover:bg-[#0da271] text-white px-4 py-2 rounded-lg font-medium 
                   transition-all duration-300 inline-flex items-center gap-2;
        }
        
        .btn-danger {
            @apply bg-[#ef4444] hover:bg-[#dc2626] text-white px-4 py-2 rounded-lg font-medium 
                   transition-all duration-300 inline-flex items-center gap-2;
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

        /* Team Cards */
        .team-card {
            @apply glass-card p-6 hover-lift;
        }
        
        .team-members {
            @apply flex -space-x-2;
        }
        
        .team-member {
            @apply w-8 h-8 rounded-full border-2 border-[#0b2447];
        }

        /* User Cards */
        .user-card {
            @apply glass-card p-6 hover-lift;
        }
        
        .user-avatar {
            @apply w-16 h-16 rounded-full mx-auto mb-4 border-2 border-white/20;
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
                        <p class="text-xs text-gray-400">Team Management</p>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-1">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ url('/reports') }}" class="nav-link">
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
                
                <a href="{{ url('/users') }}" class="nav-link active">
                    <i class="fas fa-users"></i>
                    <span>Users & Teams</span>
                    <span class="ml-auto bg-blue-500 text-white text-xs px-2 py-1 rounded-full">48</span>
                </a>
                
                <a href="{{ url('/veterinarians') }}" class="nav-link">
                    <i class="fas fa-stethoscope"></i>
                    <span>Vet Collaborators</span>
                </a>
                
                <a href="{{ url('/volunteers') }}" class="nav-link">
                    <i class="fas fa-hands-helping"></i>
                    <span>Volunteers</span>
                </a>
                
                <a href="{{ url('/roles') }}" class="nav-link">
                    <i class="fas fa-user-shield"></i>
                    <span>Roles & Permissions</span>
                </a>
                
                <a href="{{ url('/training') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Training</span>
                </a>
                
                <a href="{{ url('/settings') }}" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-64 p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=HR+Manager&background=0ea5e9&color=fff" 
                         alt="HR Manager" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-white">HR Manager</h4>
                        <p class="text-xs text-gray-400">Team Administrator</p>
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
                        <h2 class="text-xl font-bold text-white">Users & Teams Management</h2>
                        <p class="text-sm text-gray-400">Manage users, teams, and permissions</p>
                    </div>
                    
                    <!-- Right Side Actions -->
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/users/create') }}" class="btn-primary">
                            <i class="fas fa-user-plus"></i>
                            Add New User
                        </a>
                        <a href="{{ url('/teams/create') }}" class="btn-secondary">
                            <i class="fas fa-users"></i>
                            Create Team
                        </a>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-6">
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">48</div>
                                <div class="text-sm text-gray-400">Total Users</div>
                            </div>
                            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-blue-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-green-400">
                            <i class="fas fa-arrow-up"></i> 5 new this month
                        </div>
                    </div>
                    
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">8</div>
                                <div class="text-sm text-gray-400">Rescue Teams</div>
                            </div>
                            <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ambulance text-green-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-green-400">
                            <i class="fas fa-check-circle"></i> 6 active
                        </div>
                    </div>
                    
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">12</div>
                                <div class="text-sm text-gray-400">Active Volunteers</div>
                            </div>
                            <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-hands-helping text-yellow-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-yellow-400">
                            <i class="fas fa-clock"></i> 4 available
                        </div>
                    </div>
                    
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">15</div>
                                <div class="text-sm text-gray-400">Vet Collaborators</div>
                            </div>
                            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-stethoscope text-purple-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-purple-400">
                            <i class="fas fa-user-md"></i> On-call network
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="glass-card p-6 mb-8">
                    <div class="flex border-b border-white/10 mb-6">
                        <button class="px-4 py-2 border-b-2 border-[#0ea5e9] text-[#0ea5e9] font-medium">
                            All Users
                        </button>
                        <button class="px-4 py-2 text-gray-400 hover:text-white font-medium">
                            Rescue Teams
                        </button>
                        <button class="px-4 py-2 text-gray-400 hover:text-white font-medium">
                            Volunteers
                        </button>
                        <button class="px-4 py-2 text-gray-400 hover:text-white font-medium">
                            Administrators
                        </button>
                    </div>

                    <!-- Users Table -->
                    <div class="overflow-x-auto">
                        <table class="dashboard-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Team</th>
                                    <th>Status</th>
                                    <th>Last Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- User 1 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=John+Smith&background=0ea5e9&color=fff" 
                                                 alt="John Smith" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">John Smith</div>
                                                <div class="text-xs text-gray-400">john@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge role-rescue">
                                            Rescue Team Lead
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Team Alpha</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-active">
                                            <i class="fas fa-circle text-xs"></i>
                                            Active
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Today, 10:30 AM</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/users/1') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/users/1/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-danger text-sm px-3 py-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 2 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=ec4899&color=fff" 
                                                 alt="Sarah Johnson" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Sarah Johnson</div>
                                                <div class="text-xs text-gray-400">sarah@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge role-admin">
                                            Administrator
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Management</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-active">
                                            <i class="fas fa-circle text-xs"></i>
                                            Active
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Today, 9:15 AM</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/users/2') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/users/2/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-danger text-sm px-3 py-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 3 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Mike+Wilson&background=10b981&color=fff" 
                                                 alt="Mike Wilson" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Mike Wilson</div>
                                                <div class="text-xs text-gray-400">mike@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge role-vet">
                                            Veterinarian
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Medical Team</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-on-leave">
                                            <i class="fas fa-clock"></i>
                                            On Leave
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">2 days ago</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/users/3') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/users/3/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-danger text-sm px-3 py-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 4 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Emma+Davis&background=8b5cf6&color=fff" 
                                                 alt="Emma Davis" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Emma Davis</div>
                                                <div class="text-xs text-gray-400">emma@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge role-volunteer">
                                            Volunteer
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Team Charlie</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-active">
                                            <i class="fas fa-circle text-xs"></i>
                                            Active
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Yesterday, 3:45 PM</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/users/4') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/users/4/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-danger text-sm px-3 py-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- User 5 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Robert+Brown&background=f59e0b&color=fff" 
                                                 alt="Robert Brown" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Robert Brown</div>
                                                <div class="text-xs text-gray-400">robert@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge role-staff">
                                            Staff Member
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Adoption Center</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-busy">
                                            <i class="fas fa-exclamation"></i>
                                            On Mission
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">Today, 8:20 AM</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/users/5') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-phone"></i>
                                            </button>
                                            <button class="btn-danger text-sm px-3 py-1">
                                                <i class="fas fa-trash"></i>
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
                            Showing 1 to 5 of 48 users
                        </div>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 bg-[#0ea5e9] rounded-lg text-white">1</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">2</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">3</button>
                            <span class="px-3 py-1 text-gray-400">...</span>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">10</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Rescue Teams -->
                <div class="glass-card p-6 mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-white">Rescue Teams</h3>
                        <a href="{{ url('/teams') }}" class="text-sm text-[#0ea5e9] hover:text-[#0891b2]">
                            <i class="fas fa-list"></i>
                            View All Teams
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Team 1 -->
                        <div class="team-card">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h4 class="font-bold text-lg">Team Alpha</h4>
                                    <p class="text-sm text-gray-400">Captain: John Smith</p>
                                </div>
                                <span class="status-badge status-active">
                                    Active
                                </span>
                            </div>
                            
                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Members:</span>
                                    <span class="text-white">4/4</span>
                                </div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Active Missions:</span>
                                    <span class="text-white">2</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Success Rate:</span>
                                    <span class="text-green-400">98%</span>
                                </div>
                            </div>
                            
                            <div class="team-members mb-4">
                                <img src="https://ui-avatars.com/api/?name=John+S&background=0ea5e9&color=fff" 
                                     alt="John" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Mike+W&background=10b981&color=fff" 
                                     alt="Mike" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Sarah+L&background=ec4899&color=fff" 
                                     alt="Sarah" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Alex+T&background=f59e0b&color=fff" 
                                     alt="Alex" class="team-member">
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="{{ url('/teams/alpha') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Team
                                </a>
                                <a href="{{ url('/teams/alpha/edit') }}" class="btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Team 2 -->
                        <div class="team-card">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h4 class="font-bold text-lg">Team Bravo</h4>
                                    <p class="text-sm text-gray-400">Captain: Sarah Johnson</p>
                                </div>
                                <span class="status-badge status-busy">
                                    On Mission
                                </span>
                            </div>
                            
                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Members:</span>
                                    <span class="text-white">3/4</span>
                                </div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Active Missions:</span>
                                    <span class="text-white">1</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Success Rate:</span>
                                    <span class="text-green-400">95%</span>
                                </div>
                            </div>
                            
                            <div class="team-members mb-4">
                                <img src="https://ui-avatars.com/api/?name=Sarah+J&background=ec4899&color=fff" 
                                     alt="Sarah" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=David+K&background=8b5cf6&color=fff" 
                                     alt="David" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Lisa+M&background=0ea5e9&color=fff" 
                                     alt="Lisa" class="team-member">
                                <div class="team-member bg-white/10 flex items-center justify-center text-xs">
                                    +1
                                </div>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="{{ url('/teams/bravo') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Team
                                </a>
                                <a href="{{ url('/teams/bravo/edit') }}" class="btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Team 3 -->
                        <div class="team-card">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h4 class="font-bold text-lg">Team Charlie</h4>
                                    <p class="text-sm text-gray-400">Captain: Mike Wilson</p>
                                </div>
                                <span class="status-badge status-active">
                                    Standby
                                </span>
                            </div>
                            
                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Members:</span>
                                    <span class="text-white">4/4</span>
                                </div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Active Missions:</span>
                                    <span class="text-white">0</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Success Rate:</span>
                                    <span class="text-green-400">92%</span>
                                </div>
                            </div>
                            
                            <div class="team-members mb-4">
                                <img src="https://ui-avatars.com/api/?name=Mike+W&background=10b981&color=fff" 
                                     alt="Mike" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Emma+D&background=8b5cf6&color=fff" 
                                     alt="Emma" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Tom+B&background=f59e0b&color=fff" 
                                     alt="Tom" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Anna+R&background=ec4899&color=fff" 
                                     alt="Anna" class="team-member">
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="{{ url('/teams/charlie') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Team
                                </a>
                                <button class="btn-success">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Team 4 -->
                        <div class="team-card">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h4 class="font-bold text-lg">Medical Team</h4>
                                    <p class="text-sm text-gray-400">Lead: Dr. Robert Brown</p>
                                </div>
                                <span class="status-badge status-active">
                                    Available
                                </span>
                            </div>
                            
                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Members:</span>
                                    <span class="text-white">6/6</span>
                                </div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-gray-400">Active Cases:</span>
                                    <span class="text-white">8</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Recovery Rate:</span>
                                    <span class="text-green-400">96%</span>
                                </div>
                            </div>
                            
                            <div class="team-members mb-4">
                                <img src="https://ui-avatars.com/api/?name=Robert+B&background=f59e0b&color=fff" 
                                     alt="Robert" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=Maria+S&background=10b981&color=fff" 
                                     alt="Maria" class="team-member">
                                <img src="https://ui-avatars.com/api/?name=James+L&background=0ea5e9&color=fff" 
                                     alt="James" class="team-member">
                                <div class="team-member bg-white/10 flex items-center justify-center text-xs">
                                    +3
                                </div>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="{{ url('/teams/medical') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Team
                                </a>
                                <a href="{{ url('/teams/medical/edit') }}" class="btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Recent Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Quick Actions -->
                    <div class="glass-card p-6">
                        <h3 class="text-lg font-semibold text-white mb-6">Quick Actions</h3>
                        
                        <div class="space-y-4">
                            <a href="{{ url('/users/create') }}" class="w-full btn-primary text-left justify-start">
                                <i class="fas fa-user-plus"></i>
                                Add New User
                            </a>
                            
                            <a href="{{ url('/teams/create') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-users"></i>
                                Create New Team
                            </a>
                            
                            <a href="{{ url('/roles') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-user-shield"></i>
                                Manage Roles
                            </a>
                            
                            <a href="{{ url('/training') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-graduation-cap"></i>
                                Schedule Training
                            </a>
                            
                            <a href="{{ url('/users/import') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-file-import"></i>
                                Import Users
                            </a>
                            
                            <a href="{{ url('/reports/users') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-chart-bar"></i>
                                Generate Report
                            </a>
                        </div>
                    </div>

                    <!-- Recent User Activity -->
                    <div class="glass-card p-6">
                        <h3 class="text-lg font-semibold text-white mb-6">Recent User Activity</h3>
                        
                        <div class="space-y-4">
                            <!-- Activity 1 -->
                            <div class="flex items-start gap-3">
                                <img src="https://ui-avatars.com/api/?name=John+S&background=0ea5e9&color=fff" 
                                     alt="John" class="w-8 h-8 rounded-full">
                                <div class="flex-1">
                                    <p class="text-sm text-white">John Smith started a new rescue mission</p>
                                    <p class="text-xs text-gray-400">Mission #RC-2047 • 30 minutes ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 2 -->
                            <div class="flex items-start gap-3">
                                <img src="https://ui-avatars.com/api/?name=Sarah+J&background=ec4899&color=fff" 
                                     alt="Sarah" class="w-8 h-8 rounded-full">
                                <div class="flex-1">
                                    <p class="text-sm text-white">Sarah Johnson added new team member</p>
                                    <p class="text-xs text-gray-400">Team Bravo • 2 hours ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 3 -->
                            <div class="flex items-start gap-3">
                                <img src="https://ui-avatars.com/api/?name=Mike+W&background=10b981&color=fff" 
                                     alt="Mike" class="w-8 h-8 rounded-full">
                                <div class="flex-1">
                                    <p class="text-sm text-white">Mike Wilson completed training module</p>
                                    <p class="text-xs text-gray-400">Advanced Rescue Techniques • 1 day ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 4 -->
                            <div class="flex items-start gap-3">
                                <img src="https://ui-avatars.com/api/?name=Emma+D&background=8b5cf6&color=fff" 
                                     alt="Emma" class="w-8 h-8 rounded-full">
                                <div class="flex-1">
                                    <p class="text-sm text-white">Emma Davis updated profile information</p>
                                    <p class="text-xs text-gray-400">Volunteer • 2 days ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 5 -->
                            <div class="flex items-start gap-3">
                                <img src="https://ui-avatars.com/api/?name=Robert+B&background=f59e0b&color=fff" 
                                     alt="Robert" class="w-8 h-8 rounded-full">
                                <div class="flex-1">
                                    <p class="text-sm text-white">Robert Brown scheduled team meeting</p>
                                    <p class="text-xs text-gray-400">Medical Team • 3 days ago</p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ url('/activity') }}" class="w-full mt-6 btn-secondary inline-flex justify-center">
                            <i class="fas fa-history"></i>
                            View All Activity
                        </a>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="border-t border-white/10 bg-[#0b2447]/80 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#0ea5e9] rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-white">SafePaws Team Management</div>
                                <div class="text-xs text-gray-400">Building strong teams • © 2023</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-400">
                            <div class="flex items-center gap-1">
                                <i class="fas fa-phone"></i>
                                <span>HR: (555) 987-6543</span>
                            </div>
                            <a href="{{ url('/contact') }}" class="hover:text-white transition-colors">Contact</a>
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
                                                <p class="text-xs text-gray-400">Team Management</p>
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
                                    <a href="{{ url('/reports') }}" class="nav-link">
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
                                    <a href="{{ url('/users') }}" class="nav-link active">
                                        <i class="fas fa-users"></i>
                                        <span>Users & Teams</span>
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
        document.querySelectorAll('.btn-primary, .btn-secondary, .btn-success, .btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Tab switching functionality
        document.querySelectorAll('.glass-card .px-4.py-2').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.glass-card .px-4.py-2').forEach(t => {
                    t.classList.remove('border-b-2', 'border-[#0ea5e9]', 'text-[#0ea5e9]');
                    t.classList.add('text-gray-400', 'hover:text-white');
                });
                
                // Add active class to clicked tab
                this.classList.add('border-b-2', 'border-[#0ea5e9]', 'text-[#0ea5e9]');
                this.classList.remove('text-gray-400', 'hover:text-white');
            });
        });

        // Delete user confirmation
        document.querySelectorAll('.btn-danger').forEach(button => {
            if (button.innerHTML.includes('fa-trash')) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                        const row = this.closest('tr');
                        row.style.opacity = '0.5';
                        setTimeout(() => {
                            row.style.display = 'none';
                            alert('User deleted successfully!');
                        }, 500);
                    }
                });
            }
        });
    </script>
</body>
</html>