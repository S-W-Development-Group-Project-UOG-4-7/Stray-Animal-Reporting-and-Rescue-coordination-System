<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Report - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #071331;
            color: white;
        }
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        
        .status-pending { background-color: #fbbf24; color: #78350f; }
        .status-dispatched { background-color: #3b82f6; color: white; }
        .status-in_progress { background-color: #8b5cf6; color: white; }
        .status-rescued { background-color: #10b981; color: white; }
        .status-treated { background-color: #06b6d4; color: white; }
        .status-adopted { background-color: #ec4899; color: white; }
        .status-closed { background-color: #6b7280; color: white; }
        .status-expired { background-color: #ef4444; color: white; }
        
        .progress-bar-track {
            height: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #0ea5e9, #22d3ee);
            border-radius: 4px;
            transition: width 0.5s ease;
        }
        
        .timeline {
            position: relative;
            padding-left: 2rem;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #0ea5e9, #22d3ee);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2.5rem;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #0ea5e9;
            border: 2px solid white;
        }
        
        .timeline-item.completed::before {
            background: #10b981;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header/Navigation (similar to your existing one) -->
    <header class="sticky top-0 z-50 bg-[#071331] border-b border-white/10">
        <div class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl">
                        <i class="text-lg text-white fas fa-paw"></i>
                    </div>
                    <div>
                        <span class="text-xl font-bold">SafePaws</span>
                        <div class="text-[10px] text-gray-300 leading-tight">Protecting Every Paw</div>
                    </div>
                </a>
                
                <a href="{{ route('animal.report.form') }}" class="px-4 py-2 text-sm font-medium text-white transition-colors bg-red-500 rounded-full hover:bg-red-600">
                    <i class="mr-2 fas fa-exclamation-triangle"></i>
                    Report Animal
                </a>
            </div>
        </div>
    </header>

    <main class="container px-6 py-12 mx-auto">
        @if($isExpired)
        <div class="p-6 mb-8 border bg-red-900/30 border-red-500/50 rounded-xl">
            <div class="flex items-center gap-3">
                <i class="text-2xl text-red-400 fas fa-exclamation-triangle"></i>
                <div>
                    <h3 class="text-xl font-bold text-red-300">Report Expired</h3>
                    <p class="mt-1 text-gray-300">
                        This report has expired as it was submitted more than 30 days ago. 
                        For current reports, please submit a new report form.
                    </p>
                </div>
            </div>
        </div>
        @endif

        <div class="grid gap-8 lg:grid-cols-3">
            <!-- Report Details Card -->
            <div class="lg:col-span-2">
                <div class="p-8 glass-card">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h1 class="mb-2 text-3xl font-bold">Report Details</h1>
                            <div class="flex items-center gap-4">
                                <span class="status-badge status-{{ $report->status }}">
                                    {{ str_replace('_', ' ', $report->status) }}
                                </span>
                                @if($isExpired)
                                <span class="status-badge status-expired">
                                    Expired
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Report ID</p>
                            <p class="text-2xl font-bold text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text">
                                {{ $report->report_id }}
                            </p>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium">Report Progress</span>
                            <span class="text-sm text-gray-300">
                                @php
                                    $progress = [
                                        'pending' => 25,
                                        'dispatched' => 50,
                                        'in_progress' => 75,
                                        'rescued' => 90,
                                        'treated' => 95,
                                        'adopted' => 100,
                                        'closed' => 100
                                    ];
                                @endphp
                                {{ $progress[$report->status] ?? 0 }}%
                            </span>
                        </div>
                        <div class="progress-bar-track">
                            <div class="progress-bar-fill" style="width: {{ $progress[$report->status] ?? 0 }}%"></div>
                        </div>
                    </div>

                    <!-- Report Information -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <h3 class="mb-4 text-lg font-bold text-cyan-400">Animal Information</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-400">Type</p>
                                    <p class="font-medium">{{ $report->animal_type }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Last Seen</p>
                                    <p class="font-medium">{{ $report->last_seen->format('F j, Y \a\t g:i A') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-400">Location</p>
                                    <p class="font-medium">{{ $report->location }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="mb-4 text-lg font-bold text-cyan-400">Contact Information</h3>
                            <div class="space-y-3">
                                @if($report->contact_name)
                                <div>
                                    <p class="text-sm text-gray-400">Name</p>
                                    <p class="font-medium">{{ $report->contact_name }}</p>
                                </div>
                                @endif
                                @if($report->contact_phone)
                                <div>
                                    <p class="text-sm text-gray-400">Phone</p>
                                    <p class="font-medium">{{ $report->contact_phone }}</p>
                                </div>
                                @endif
                                @if($report->contact_email)
                                <div>
                                    <p class="text-sm text-gray-400">Email</p>
                                    <p class="font-medium">{{ $report->contact_email }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h3 class="mb-4 text-lg font-bold text-cyan-400">Description</h3>
                        <div class="p-4 rounded-lg bg-white/5">
                            <p class="text-gray-300">{{ $report->description }}</p>
                        </div>
                    </div>

                    <!-- Animal Photo -->
                    @if($report->animal_photo_url)
                    <div>
                        <h3 class="mb-4 text-lg font-bold text-cyan-400">Animal Photo</h3>
                        <div class="max-w-md">
                            <img src="{{ $report->animal_photo_url }}" 
                                 alt="Reported animal" 
                                 class="w-full h-auto shadow-lg rounded-xl">
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Timeline & Actions -->
            <div>
                <div class="p-6 mb-6 glass-card">
                    <h3 class="mb-4 text-lg font-bold text-cyan-400">Report Timeline</h3>
                    <div class="timeline">
                        @php
                            $statuses = [
                                'pending' => 'Report Submitted',
                                'dispatched' => 'Team Dispatched',
                                'in_progress' => 'Rescue in Progress',
                                'rescued' => 'Animal Rescued',
                                'treated' => 'Medical Treatment',
                                'adopted' => 'Animal Adopted',
                                'closed' => 'Case Closed'
                            ];
                            
                            $statusOrder = ['pending', 'dispatched', 'in_progress', 'rescued', 'treated', 'adopted', 'closed'];
                            $currentIndex = array_search($report->status, $statusOrder);
                        @endphp
                        
                        @foreach($statusOrder as $index => $status)
                            @if($index <= $currentIndex)
                                <div class="timeline-item completed">
                                    <div class="mb-2">
                                        <p class="font-medium">{{ $statuses[$status] }}</p>
                                        <p class="text-sm text-gray-400">
                                            @if($index == 0)
                                                {{ $report->created_at->format('M j, g:i A') }}
                                            @else
                                                <!-- You can store actual timestamps for each status change in your database -->
                                                Estimated time
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @elseif(!$isExpired)
                                <div class="timeline-item">
                                    <div class="mb-2">
                                        <p class="font-medium text-gray-400">{{ $statuses[$status] }}</p>
                                        <p class="text-sm text-gray-500">Pending</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Report Metadata -->
                <div class="p-6 glass-card">
                    <h3 class="mb-4 text-lg font-bold text-cyan-400">Report Information</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-400">Submitted On</p>
                            <p class="font-medium">{{ $report->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Last Updated</p>
                            <p class="font-medium">{{ $report->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Valid Until</p>
                            <p class="font-medium {{ $isExpired ? 'text-red-400' : '' }}">
                                {{ $report->created_at->addDays(30)->format('F j, Y') }}
                                @if($isExpired)
                                    <span class="text-sm">(Expired)</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    @if(!$isExpired)
                    <div class="pt-6 mt-6 border-t border-white/10">
                        <h4 class="mb-3 text-lg font-bold text-cyan-400">Need Help?</h4>
                        <p class="mb-4 text-sm text-gray-300">
                            If you need to provide additional information or have questions about this report.
                        </p>
                        <a href="mailto:emergency@safepaws.org" class="block w-full py-3 text-center transition-colors border rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
                            <i class="mr-2 fas fa-envelope"></i>
                            Contact Rescue Team
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-8 mt-12 border-t border-white/10">
        <div class="container px-6 mx-auto text-center">
            <div class="flex flex-col items-center gap-4 md:flex-row md:justify-between">
                <p class="text-gray-400">
                    © {{ date('Y') }} SafePaws. All rights reserved.
                </p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('animal.report.form') }}" class="transition-colors text-cyan-400 hover:text-cyan-300">
                        Report Another Animal
                    </a>
                    <a href="{{ route('home') }}" class="transition-colors text-cyan-400 hover:text-cyan-300">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Auto-refresh the page every 60 seconds for status updates
        @if(!$isExpired && in_array($report->status, ['pending', 'dispatched', 'in_progress']))
        setTimeout(() => {
            window.location.reload();
        }, 60000);
        @endif
    </script>
</body>
</html>