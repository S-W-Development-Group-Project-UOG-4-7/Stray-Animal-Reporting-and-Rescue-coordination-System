<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report History - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status-pending { background: rgba(251, 191, 36, 0.2); color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.3); }
        .status-under_review { background: rgba(59, 130, 246, 0.2); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.3); }
        .status-rescue_dispatched { background: rgba(139, 92, 246, 0.2); color: #8b5cf6; border: 1px solid rgba(139, 92, 246, 0.3); }
        .status-rescue_completed { background: rgba(34, 197, 94, 0.2); color: #22c55e; border: 1px solid rgba(34, 197, 94, 0.3); }
        .status-closed { background: rgba(107, 114, 128, 0.2); color: #6b7280; border: 1px solid rgba(107, 114, 128, 0.3); }
        
        .gradient-text {
            background: linear-gradient(90deg, #0ea5e9, #22d3ee, #67e8f9);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body>
    <div class="min-h-screen p-4 md:p-8">
        <div class="mx-auto max-w-7xl">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-4xl font-bold gradient-text">Report History</h1>
                        <p class="text-gray-300">All submitted animal reports</p>
                    </div>
                    <a href="{{ route('report-animal.create') }}" 
                       class="flex items-center gap-2 px-6 py-3 text-white transition-all duration-300 rounded-full bg-cyan-500 hover:bg-cyan-600">
                        <i class="fas fa-plus"></i>
                        New Report
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-1 gap-4 mb-8 md:grid-cols-4">
                    <div class="p-6 glass-effect rounded-2xl">
                        <div class="text-2xl font-bold text-cyan-400">{{ $reports->count() }}</div>
                        <div class="text-gray-300">Total Reports</div>
                    </div>
                    <div class="p-6 glass-effect rounded-2xl">
                        <div class="text-2xl font-bold text-yellow-400">
                            {{ $reports->where('status', 'pending')->count() }}
                        </div>
                        <div class="text-gray-300">Pending</div>
                    </div>
                    <div class="p-6 glass-effect rounded-2xl">
                        <div class="text-2xl font-bold text-blue-400">
                            {{ $reports->whereIn('status', ['under_review', 'rescue_dispatched'])->count() }}
                        </div>
                        <div class="text-gray-300">In Progress</div>
                    </div>
                    <div class="p-6 glass-effect rounded-2xl">
                        <div class="text-2xl font-bold text-green-400">
                            {{ $reports->whereIn('status', ['rescue_completed', 'closed'])->count() }}
                        </div>
                        <div class="text-gray-300">Completed</div>
                    </div>
                </div>
            </div>

            <!-- Reports Table -->
            <div class="overflow-hidden glass-effect rounded-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-white/5">
                                <th class="p-4 text-left">Report ID</th>
                                <th class="p-4 text-left">Animal Type</th>
                                <th class="p-4 text-left">Location</th>
                                <th class="p-4 text-left">Date Reported</th>
                                <th class="p-4 text-left">Status</th>
                                <th class="p-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $report)
                            <tr class="border-t border-white/10 hover:bg-white/5">
                                <td class="p-4">
                                    <div class="font-mono font-bold text-cyan-400">{{ $report->report_id }}</div>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2">
                                        @if($report->animal_type == 'Aggressive')
                                            <i class="text-red-400 fas fa-exclamation-triangle"></i>
                                        @elseif($report->animal_type == 'Sick/Injured')
                                            <i class="fas fa-heartbeat text-cyan-400"></i>
                                        @elseif($report->animal_type == 'Stray/Lost')
                                            <i class="text-blue-400 fas fa-home"></i>
                                        @else
                                            <i class="text-yellow-400 fas fa-sad-tear"></i>
                                        @endif
                                        <span>{{ $report->animal_type }}</span>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="max-w-xs truncate">{{ $report->location }}</div>
                                </td>
                                <td class="p-4">
                                    {{ $report->created_at->format('M d, Y h:i A') }}
                                </td>
                                <td class="p-4">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'status-pending',
                                            'under_review' => 'status-under_review',
                                            'rescue_dispatched' => 'status-rescue_dispatched',
                                            'rescue_completed' => 'status-rescue_completed',
                                            'closed' => 'status-closed',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Pending',
                                            'under_review' => 'Under Review',
                                            'rescue_dispatched' => 'Rescue Dispatched',
                                            'rescue_completed' => 'Rescue Completed',
                                            'closed' => 'Closed',
                                        ];
                                    @endphp
                                    <span class="status-badge {{ $statusClasses[$report->status] }}">
                                        {{ $statusLabels[$report->status] }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('report-animal.show', $report->report_id) }}" 
                                           class="px-3 py-1 text-sm transition-colors duration-200 rounded-lg bg-white/10 hover:bg-white/20">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('report.track', $report->report_id) }}" 
                                           class="px-3 py-1 text-sm transition-colors duration-200 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-300 hover:text-white">
                                            <i class="fas fa-search"></i> Track
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-400">
                                    <i class="mb-4 text-4xl fas fa-inbox"></i>
                                    <p class="text-xl">No reports found</p>
                                    <a href="{{ route('report-animal.create') }}" class="inline-block mt-4 text-cyan-400 hover:underline">
                                        Submit your first report
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($reports->hasPages())
                <div class="p-4 border-t border-white/10">
                    {{ $reports->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>