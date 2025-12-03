<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Collaborators - SafePaws</title>
    
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
        
        .status-available { 
            background-color: rgba(16, 185, 129, 0.2);
            color: #10b981;
        }
        
        .status-busy { 
            background-color: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }
        
        .status-offline { 
            background-color: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
        }
        
        .status-emergency { 
            background-color: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        /* Specialization Badges */
        .spec-general {
            @apply bg-blue-500/20 text-blue-300;
        }
        
        .spec-surgery {
            @apply bg-purple-500/20 text-purple-300;
        }
        
        .spec-emergency {
            @apply bg-red-500/20 text-red-300;
        }
        
        .spec-dentistry {
            @apply bg-green-500/20 text-green-300;
        }
        
        .spec-dermatology {
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
        
        .btn-warning {
            @apply bg-[#f59e0b] hover:bg-[#d97706] text-white px-4 py-2 rounded-lg font-medium 
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

        /* Vet Cards */
        .vet-card {
            @apply glass-card p-6 hover-lift;
        }
        
        .vet-avatar {
            @apply w-16 h-16 rounded-full mx-auto mb-4 border-2 border-white/20;
        }

        /* Clinic Cards */
        .clinic-card {
            @apply glass-card p-6 hover-lift;
        }
        
        .clinic-icon {
            @apply w-12 h-12 rounded-lg flex items-center justify-center text-xl mb-4;
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
                        <p class="text-xs text-gray-400">Vet Network</p>
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
                
                <a href="{{ url('/users') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Users & Teams</span>
                </a>
                
                <a href="{{ url('/veterinarians') }}" class="nav-link active">
                    <i class="fas fa-stethoscope"></i>
                    <span>Vet Collaborators</span>
                    <span class="ml-auto bg-green-500 text-white text-xs px-2 py-1 rounded-full">15</span>
                </a>
                
                <a href="{{ url('/clinics') }}" class="nav-link">
                    <i class="fas fa-hospital"></i>
                    <span>Partner Clinics</span>
                </a>
                
                <a href="{{ url('/medical') }}" class="nav-link">
                    <i class="fas fa-pills"></i>
                    <span>Medical Supplies</span>
                </a>
                
                <a href="{{ url('/appointments') }}" class="nav-link">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
                
                <a href="{{ url('/records') }}" class="nav-link">
                    <i class="fas fa-file-medical"></i>
                    <span>Medical Records</span>
                </a>
                
                <a href="{{ url('/settings') }}" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-64 p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Medical+Coordinator&background=0ea5e9&color=fff" 
                         alt="Medical Coordinator" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-white">Medical Coordinator</h4>
                        <p class="text-xs text-gray-400">Vet Network Manager</p>
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
                        <h2 class="text-xl font-bold text-white">Veterinarian Collaborators</h2>
                        <p class="text-sm text-gray-400">Manage veterinary partners and medical care</p>
                    </div>
                    
                    <!-- Right Side Actions -->
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/veterinarians/create') }}" class="btn-primary">
                            <i class="fas fa-user-plus"></i>
                            Add New Vet
                        </a>
                        <a href="{{ url('/clinics/create') }}" class="btn-secondary">
                            <i class="fas fa-hospital"></i>
                            Add Clinic
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
                                <div class="text-2xl font-bold text-white">15</div>
                                <div class="text-sm text-gray-400">Veterinarians</div>
                            </div>
                            <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-stethoscope text-green-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-green-400">
                            <i class="fas fa-arrow-up"></i> 3 new this month
                        </div>
                    </div>
                    
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">8</div>
                                <div class="text-sm text-gray-400">Partner Clinics</div>
                            </div>
                            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-hospital text-blue-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-blue-400">
                            <i class="fas fa-check-circle"></i> All certified
                        </div>
                    </div>
                    
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">12</div>
                                <div class="text-sm text-gray-400">Active Cases</div>
                            </div>
                            <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heartbeat text-yellow-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-yellow-400">
                            <i class="fas fa-clock"></i> 3 urgent
                        </div>
                    </div>
                    
                    <div class="glass-card p-6 hover-lift">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-2xl font-bold text-white">124</div>
                                <div class="text-sm text-gray-400">Animals Treated</div>
                            </div>
                            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heart text-purple-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-xs text-purple-400">
                            <i class="fas fa-paw"></i> This month
                        </div>
                    </div>
                </div>

                <!-- Available Vets -->
                <div class="glass-card p-6 mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-white">Available Veterinarians</h3>
                        <div class="flex gap-2">
                            <select class="bg-white/10 text-white text-sm rounded-lg px-3 py-2">
                                <option>All Specializations</option>
                                <option>General Practice</option>
                                <option>Surgery</option>
                                <option>Emergency</option>
                                <option>Dentistry</option>
                            </select>
                            <select class="bg-white/10 text-white text-sm rounded-lg px-3 py-2">
                                <option>All Status</option>
                                <option>Available</option>
                                <option>Busy</option>
                                <option>Offline</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Vet 1 -->
                        <div class="vet-card">
                            <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?q=80&w=200&auto=format&fit=crop" 
                                 alt="Dr. Sarah Johnson" 
                                 class="vet-avatar">
                            <div class="text-center">
                                <h4 class="font-bold text-lg">Dr. Sarah Johnson</h4>
                                <p class="text-sm text-gray-400">General Practice & Surgery</p>
                                <div class="flex items-center justify-center gap-2 mt-2">
                                    <span class="status-badge status-available">
                                        <i class="fas fa-circle text-xs"></i>
                                        Available
                                    </span>
                                    <span class="status-badge spec-general">
                                        General
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mt-4 space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Clinic:</span>
                                    <span class="text-white">Animal Care Center</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Experience:</span>
                                    <span class="text-white">8 years</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Cases Today:</span>
                                    <span class="text-white">3</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-2 mt-6">
                                <a href="{{ url('/veterinarians/1') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Profile
                                </a>
                                <button class="btn-success">
                                    <i class="fas fa-phone"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Vet 2 -->
                        <div class="vet-card">
                            <img src="https://images.unsplash.com/photo-1596276020589-4b04fca73c8a?q=80&w=200&auto=format&fit=crop" 
                                 alt="Dr. Michael Chen" 
                                 class="vet-avatar">
                            <div class="text-center">
                                <h4 class="font-bold text-lg">Dr. Michael Chen</h4>
                                <p class="text-sm text-gray-400">Emergency & Surgery</p>
                                <div class="flex items-center justify-center gap-2 mt-2">
                                    <span class="status-badge status-emergency">
                                        <i class="fas fa-exclamation"></i>
                                        In Surgery
                                    </span>
                                    <span class="status-badge spec-emergency">
                                        Emergency
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mt-4 space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Clinic:</span>
                                    <span class="text-white">City Animal Hospital</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Experience:</span>
                                    <span class="text-white">12 years</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Specialty:</span>
                                    <span class="text-white">Trauma Care</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-2 mt-6">
                                <a href="{{ url('/veterinarians/2') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Profile
                                </a>
                                <button class="btn-warning">
                                    <i class="fas fa-clock"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Vet 3 -->
                        <div class="vet-card">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=200&auto=format&fit=crop" 
                                 alt="Dr. Emily Rodriguez" 
                                 class="vet-avatar">
                            <div class="text-center">
                                <h4 class="font-bold text-lg">Dr. Emily Rodriguez</h4>
                                <p class="text-sm text-gray-400">Dermatology & Dentistry</p>
                                <div class="flex items-center justify-center gap-2 mt-2">
                                    <span class="status-badge status-available">
                                        <i class="fas fa-circle text-xs"></i>
                                        Available
                                    </span>
                                    <span class="status-badge spec-dermatology">
                                        Dermatology
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mt-4 space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Clinic:</span>
                                    <span class="text-white">Paws & Claws Clinic</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Experience:</span>
                                    <span class="text-white">6 years</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Next Available:</span>
                                    <span class="text-white">Now</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-2 mt-6">
                                <a href="{{ url('/veterinarians/3') }}" class="btn-primary flex-1 text-center justify-center">
                                    <i class="fas fa-eye"></i>
                                    View Profile
                                </a>
                                <a href="{{ url('/appointments/create') }}" class="btn-success">
                                    <i class="fas fa-calendar-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center mt-6">
                        <div class="text-sm text-gray-400">
                            Showing 3 of 15 available veterinarians
                        </div>
                        <a href="{{ url('/veterinarians') }}" class="btn-secondary">
                            <i class="fas fa-list"></i>
                            View All Vets
                        </a>
                    </div>
                </div>

                <!-- Veterinarians Table -->
                <div class="glass-card p-6 mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-white">All Veterinarian Collaborators</h3>
                        <div class="flex gap-2">
                            <input type="text" placeholder="Search vets..." class="bg-white/10 text-white text-sm rounded-lg px-3 py-2 w-48">
                            <button class="btn-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="dashboard-table">
                            <thead>
                                <tr>
                                    <th>Veterinarian</th>
                                    <th>Specialization</th>
                                    <th>Clinic</th>
                                    <th>Status</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Vet 1 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=0ea5e9&color=fff" 
                                                 alt="Dr. Sarah Johnson" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Dr. Sarah Johnson</div>
                                                <div class="text-xs text-gray-400">License: #VT-8452</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            <span class="status-badge spec-general">
                                                General
                                            </span>
                                            <span class="status-badge spec-surgery">
                                                Surgery
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Animal Care Center</div>
                                        <div class="text-xs text-gray-400">Downtown</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-available">
                                            <i class="fas fa-circle text-xs"></i>
                                            Available
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">(555) 123-4567</div>
                                        <div class="text-xs text-gray-400">sarah@vet.com</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/veterinarians/1') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/veterinarians/1/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-success text-sm px-3 py-1">
                                                <i class="fas fa-phone"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Vet 2 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Michael+Chen&background=10b981&color=fff" 
                                                 alt="Dr. Michael Chen" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Dr. Michael Chen</div>
                                                <div class="text-xs text-gray-400">License: #VT-9371</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            <span class="status-badge spec-emergency">
                                                Emergency
                                            </span>
                                            <span class="status-badge spec-surgery">
                                                Surgery
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">City Animal Hospital</div>
                                        <div class="text-xs text-gray-400">East Side</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-busy">
                                            <i class="fas fa-clock"></i>
                                            In Surgery
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">(555) 234-5678</div>
                                        <div class="text-xs text-gray-400">michael@vet.com</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/veterinarians/2') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/veterinarians/2/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-warning text-sm px-3 py-1">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Vet 3 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Emily+Rodriguez&background=ec4899&color=fff" 
                                                 alt="Dr. Emily Rodriguez" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Dr. Emily Rodriguez</div>
                                                <div class="text-xs text-gray-400">License: #VT-6283</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            <span class="status-badge spec-dermatology">
                                                Dermatology
                                            </span>
                                            <span class="status-badge spec-dentistry">
                                                Dentistry
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Paws & Claws Clinic</div>
                                        <div class="text-xs text-gray-400">West District</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-available">
                                            <i class="fas fa-circle text-xs"></i>
                                            Available
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">(555) 345-6789</div>
                                        <div class="text-xs text-gray-400">emily@vet.com</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/veterinarians/3') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/veterinarians/3/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/appointments/create') }}" class="btn-success text-sm px-3 py-1">
                                                <i class="fas fa-calendar"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Vet 4 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name=Robert+Wilson&background=f59e0b&color=fff" 
                                                 alt="Dr. Robert Wilson" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="font-medium text-white">Dr. Robert Wilson</div>
                                                <div class="text-xs text-gray-400">License: #VT-5194</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            <span class="status-badge spec-general">
                                                General
                                            </span>
                                            <span class="status-badge spec-dentistry">
                                                Dentistry
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Companion Vet Clinic</div>
                                        <div class="text-xs text-gray-400">North Area</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-offline">
                                            <i class="fas fa-moon"></i>
                                            Off Duty
                                        </span>
                                    </td>
                                    <td>
                                        <div class="text-sm">(555) 456-7890</div>
                                        <div class="text-xs text-gray-400">robert@vet.com</div>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/veterinarians/4') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/veterinarians/4/edit') }}" class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn-secondary text-sm px-3 py-1" disabled>
                                                <i class="fas fa-phone"></i>
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
                            Showing 1 to 4 of 15 veterinarians
                        </div>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 bg-[#0ea5e9] rounded-lg text-white">1</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">2</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">3</button>
                            <button class="px-3 py-1 bg-white/10 rounded-lg text-gray-300 hover:bg-white/20">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Partner Clinics & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Partner Clinics -->
                    <div class="glass-card p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-white">Partner Clinics</h3>
                            <a href="{{ url('/clinics') }}" class="text-sm text-[#0ea5e9] hover:text-[#0891b2]">
                                <i class="fas fa-list"></i>
                                View All
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Clinic 1 -->
                            <div class="clinic-card">
                                <div class="flex items-start gap-4">
                                    <div class="clinic-icon bg-blue-500/20 text-blue-400">
                                        <i class="fas fa-hospital"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-white">Animal Care Center</h4>
                                        <p class="text-sm text-gray-400">Downtown • 24/7 Emergency</p>
                                        <div class="mt-2 text-sm text-gray-300">
                                            <div class="flex justify-between">
                                                <span>Vets on duty:</span>
                                                <span class="text-white">3</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span>Beds available:</span>
                                                <span class="text-white">12</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <a href="{{ url('/clinics/1') }}" class="btn-primary flex-1 text-center justify-center">
                                        <i class="fas fa-eye"></i>
                                        View Clinic
                                    </a>
                                    <button class="btn-success">
                                        <i class="fas fa-directions"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Clinic 2 -->
                            <div class="clinic-card">
                                <div class="flex items-start gap-4">
                                    <div class="clinic-icon bg-green-500/20 text-green-400">
                                        <i class="fas fa-clinic-medical"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-white">City Animal Hospital</h4>
                                        <p class="text-sm text-gray-400">East Side • Surgery Center</p>
                                        <div class="mt-2 text-sm text-gray-300">
                                            <div class="flex justify-between">
                                                <span>Specialties:</span>
                                                <span class="text-white">Surgery, Emergency</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span>OR available:</span>
                                                <span class="text-white">Yes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <a href="{{ url('/clinics/2') }}" class="btn-primary flex-1 text-center justify-center">
                                        <i class="fas fa-eye"></i>
                                        View Clinic
                                    </a>
                                    <button class="btn-warning">
                                        <i class="fas fa-ambulance"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="glass-card p-6">
                        <h3 class="text-lg font-semibold text-white mb-6">Quick Actions</h3>
                        
                        <div class="space-y-4">
                            <a href="{{ url('/veterinarians/create') }}" class="w-full btn-primary text-left justify-start">
                                <i class="fas fa-user-plus"></i>
                                Add New Veterinarian
                            </a>
                            
                            <a href="{{ url('/clinics/create') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-hospital"></i>
                                Register New Clinic
                            </a>
                            
                            <a href="{{ url('/appointments/create') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-calendar-plus"></i>
                                Schedule Appointment
                            </a>
                            
                            <a href="{{ url('/medical/request') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-pills"></i>
                                Request Medical Supplies
                            </a>
                            
                            <a href="{{ url('/emergency') }}" class="w-full btn-warning text-left justify-start">
                                <i class="fas fa-ambulance"></i>
                                Emergency Contact
                            </a>
                            
                            <a href="{{ url('/reports/medical') }}" class="w-full btn-secondary text-left justify-start">
                                <i class="fas fa-file-medical"></i>
                                Medical Reports
                            </a>
                        </div>
                        
                        <div class="mt-6 p-4 bg-green-500/10 rounded-lg border border-green-500/20">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-heart text-green-400"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-white">124 Animals Treated</div>
                                    <div class="text-sm text-gray-300">This month • 98% recovery rate</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Cases -->
                <div class="glass-card p-6">
                    <h3 class="text-lg font-semibold text-white mb-6">Active Medical Cases</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="dashboard-table">
                            <thead>
                                <tr>
                                    <th>Case ID</th>
                                    <th>Animal</th>
                                    <th>Condition</th>
                                    <th>Veterinarian</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Case 1 -->
                                <tr>
                                    <td class="font-medium">#MC-2047</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                                <i class="fas fa-dog text-blue-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Buddy</div>
                                                <div class="text-xs text-gray-400">Golden Retriever</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Leg surgery recovery</div>
                                        <div class="text-xs text-gray-400">Post-op day 3</div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Dr. Sarah Johnson</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-available">
                                            Stable
                                        </span>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/records/MC-2047') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-file-medical"></i>
                                            </a>
                                            <button class="btn-secondary text-sm px-3 py-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Case 2 -->
                                <tr>
                                    <td class="font-medium">#MC-2046</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-pink-500/20 rounded-full flex items-center justify-center">
                                                <i class="fas fa-cat text-pink-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Mittens</div>
                                                <div class="text-xs text-gray-400">Tabby Cat</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Respiratory infection</div>
                                        <div class="text-xs text-gray-400">Under treatment</div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Dr. Emily Rodriguez</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-busy">
                                            Improving
                                        </span>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/records/MC-2046') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-file-medical"></i>
                                            </a>
                                            <button class="btn-success text-sm px-3 py-1">
                                                <i class="fas fa-syringe"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Case 3 -->
                                <tr>
                                    <td class="font-medium">#MC-2045</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                                <i class="fas fa-dog text-blue-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-white">Rocky</div>
                                                <div class="text-xs text-gray-400">Mixed Breed</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Emergency surgery</div>
                                        <div class="text-xs text-gray-400">In progress</div>
                                    </td>
                                    <td>
                                        <div class="text-sm">Dr. Michael Chen</div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-emergency">
                                            Critical
                                        </span>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ url('/records/MC-2045') }}" class="btn-primary text-sm px-3 py-1">
                                                <i class="fas fa-file-medical"></i>
                                            </a>
                                            <button class="btn-warning text-sm px-3 py-1">
                                                <i class="fas fa-user-md"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="border-t border-white/10 bg-[#0b2447]/80 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#0ea5e9] rounded-lg flex items-center justify-center">
                                <i class="fas fa-stethoscope text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-white">SafePaws Vet Network</div>
                                <div class="text-xs text-gray-400">Quality medical care • © 2023</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-400">
                            <div class="flex items-center gap-1">
                                <i class="fas fa-phone"></i>
                                <span>Emergency: (555) 911-911</span>
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
                                                <p class="text-xs text-gray-400">Vet Network</p>
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
                                    <a href="{{ url('/users') }}" class="nav-link">
                                        <i class="fas fa-users"></i>
                                        <span>Users & Teams</span>
                                    </a>
                                    <a href="{{ url('/veterinarians') }}" class="nav-link active">
                                        <i class="fas fa-stethoscope"></i>
                                        <span>Vet Collaborators</span>
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
        document.querySelectorAll('.btn-primary, .btn-secondary, .btn-success, .btn-warning').forEach(button => {
            button.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Vet status updates
        document.querySelectorAll('.btn-success').forEach(button => {
            if (button.innerHTML.includes('fa-phone')) {
                button.addEventListener('click', function() {
                    const card = this.closest('.vet-card');
                    const vetName = card.querySelector('h4').textContent;
                    alert(`Calling ${vetName}... Please wait for connection.`);
                    
                    // Simulate call status
                    button.innerHTML = '<i class="fas fa-phone-alt"></i>';
                    button.classList.remove('btn-success');
                    button.classList.add('btn-warning');
                    
                    setTimeout(() => {
                        button.innerHTML = '<i class="fas fa-phone"></i>';
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-success');
                    }, 3000);
                });
            }
        });

        // Emergency contact button
        document.querySelectorAll('.btn-warning').forEach(button => {
            if (button.innerHTML.includes('fa-ambulance')) {
                button.addEventListener('click', function() {
                    if (confirm('Are you sure you want to request emergency veterinary assistance? This will alert all available vets.')) {
                        alert('Emergency request sent! All available veterinarians have been notified.');
                        button.innerHTML = '<i class="fas fa-check"></i>';
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-success');
                        
                        setTimeout(() => {
                            button.innerHTML = '<i class="fas fa-ambulance"></i>';
                            button.classList.remove('btn-success');
                            button.classList.add('btn-warning');
                        }, 5000);
                    }
                });
            }
        });
    </script>
</body>
</html>