<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report #{{ $report->id }} - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #071331;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .primary-btn {
            @apply bg-[#0ea5e9] hover:bg-[#0891b2] text-white px-6 py-3 rounded-md font-medium transition duration-300;
        }
        .outline-btn {
            @apply border border-[#0ea5e9] text-[#0ea5e9] hover:bg-[#0ea5e9] hover:text-white px-5 py-2 rounded-md font-medium transition duration-300;
        }
        .status-badge {
            @apply px-3 py-1 text-xs font-semibold rounded-full;
        }
        .status-pending { @apply bg-yellow-500/20 text-yellow-300; }
        .status-assigned { @apply bg-blue-500/20 text-blue-300; }
        .status-in-progress { @apply bg-purple-500/20 text-purple-300; }
        .status-completed { @apply bg-green-500/20 text-green-300; }
    </style>
</head>
<body class="text-white">
    <div class="max-w-4xl mx-auto px-5 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('rescue.dashboard') }}" class="text-[#0ea5e9] hover:underline flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <!-- Header -->
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">{{ $report->title ?? 'Animal Report' }}</h1>
                    <p class="text-gray-400">Report #{{ $report->id }}</p>
                </div>
                <span class="status-badge status-{{ str_replace('_', '-', $report->status) }}">
                    {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                </span>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Animal Type</div>
                        <div class="text-lg text-white font-medium">{{ $report->animal_type ?? 'Not specified' }}</div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Location</div>
                        <div class="text-lg text-white font-medium flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#0ea5e9]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $report->location }}
                        </div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Reported</div>
                        <div class="text-lg text-white font-medium">{{ $report->created_at->format('F d, Y') }}</div>
                        <div class="text-sm text-gray-400">{{ $report->created_at->diffForHumans() }}</div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Status</div>
                        <div class="text-lg text-white font-medium">{{ ucfirst(str_replace('_', ' ', $report->status)) }}</div>
                    </div>

                    @if($report->assigned_to)
                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Assigned To</div>
                        <div class="text-lg text-white font-medium">Rescue Team Member #{{ $report->assigned_to }}</div>
                    </div>
                    @endif

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Last Updated</div>
                        <div class="text-lg text-white font-medium">{{ $report->updated_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            @if($report->description)
            <div class="bg-white/5 p-6 rounded-lg border border-white/10 mb-6">
                <h3 class="text-lg font-bold text-white mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#0ea5e9]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Description
                </h3>
                <p class="text-gray-300 leading-relaxed">{{ $report->description }}</p>
            </div>
            @endif

            <!-- Timeline -->
            <div class="bg-white/5 p-6 rounded-lg border border-white/10 mb-6">
                <h3 class="text-lg font-bold text-white mb-4">Timeline</h3>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <div class="w-0.5 h-full bg-white/10"></div>
                        </div>
                        <div class="pb-4">
                            <div class="font-medium text-white">Report Created</div>
                            <div class="text-sm text-gray-400">{{ $report->created_at->format('M d, Y h:i A') }}</div>
                        </div>
                    </div>

                    @if($report->status != 'pending')
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            @if($report->status != 'assigned')
                            <div class="w-0.5 h-full bg-white/10"></div>
                            @endif
                        </div>
                        <div class="pb-4">
                            <div class="font-medium text-white">Assigned to Team</div>
                            <div class="text-sm text-gray-400">{{ $report->updated_at->format('M d, Y h:i A') }}</div>
                        </div>
                    </div>
                    @endif

                    @if($report->status == 'in_progress' || $report->status == 'completed')
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                            @if($report->status == 'completed')
                            <div class="w-0.5 h-full bg-white/10"></div>
                            @endif
                        </div>
                        <div class="pb-4">
                            <div class="font-medium text-white">In Progress</div>
                            <div class="text-sm text-gray-400">Rescue operation ongoing</div>
                        </div>
                    </div>
                    @endif

                    @if($report->status == 'completed')
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                        <div>
                            <div class="font-medium text-white">Completed</div>
                            <div class="text-sm text-gray-400">Rescue successful</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4">
                @if($report->status == 'pending')
                <form action="{{ route('rescue.reports.accept', $report->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full primary-btn text-center">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Accept Assignment
                    </button>
                </form>
                @endif

                <a href="{{ route('rescue.dashboard') }}" class="outline-btn">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>
