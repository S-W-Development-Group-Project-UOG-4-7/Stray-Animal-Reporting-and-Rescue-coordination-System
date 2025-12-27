<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption {{ $adoption->application_id }} - SafePaws</title>
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
        .success-btn {
            @apply bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md font-medium transition duration-300;
        }
        .danger-btn {
            @apply bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md font-medium transition duration-300;
        }
        .status-badge {
            @apply px-3 py-1 text-xs font-semibold rounded-full;
        }
        .status-pending { @apply bg-yellow-500/20 text-yellow-300; }
        .status-approved { @apply bg-green-500/20 text-green-300; }
        .status-rejected { @apply bg-red-500/20 text-red-300; }
        .status-completed { @apply bg-blue-500/20 text-blue-300; }
        .status-review { @apply bg-purple-500/20 text-purple-300; }
        .status-homecheck { @apply bg-orange-500/20 text-orange-300; }
    </style>
</head>
<body class="text-white">
    <div class="max-w-4xl mx-auto px-5 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('rescue.adoptions') }}" class="text-[#0ea5e9] hover:underline flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Adoptions
            </a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <!-- Header -->
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Adoption Application</h1>
                    <p class="text-gray-400">{{ $adoption->application_id }}</p>
                </div>
                <span class="status-badge
                    @if($adoption->status == 'Pending Review') status-pending
                    @elseif($adoption->status == 'Home Check Scheduled') status-homecheck
                    @elseif($adoption->status == 'Ready for Pickup') status-approved
                    @elseif($adoption->status == 'Completed') status-completed
                    @else status-rejected
                    @endif">
                    {{ $adoption->status }}
                </span>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Left Column - Applicant Info -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">Applicant Information</h3>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Name</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->applicant_name }}</div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Email</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->applicant_email }}</div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Phone</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->applicant_phone }}</div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Address</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->applicant_address }}</div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Applicant Type</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->applicant_type }}</div>
                    </div>

                    @if($adoption->applicant_details)
                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Details</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->applicant_details }}</div>
                    </div>
                    @endif
                </div>

                <!-- Right Column - Animal & Status Info -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">Animal Information</h3>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Animal</div>
                        <div class="text-lg text-white font-medium flex items-center gap-2">
                            {{ $adoption->animal->name }} ({{ $adoption->animal->species }})
                        </div>
                        <div class="text-sm text-gray-400">#SP{{ str_pad($adoption->animal->id, 3, '0', STR_PAD_LEFT) }} • {{ $adoption->animal->breed ?? 'Mixed' }}</div>
                    </div>

                    @if($adoption->animal->image)
                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Photo</div>
                        <img src="{{ asset('storage/' . $adoption->animal->image) }}" alt="{{ $adoption->animal->name }}" class="w-48 h-48 object-cover rounded-lg">
                    </div>
                    @endif

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Status</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->status }}</div>
                    </div>

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Applied</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->created_at->format('F d, Y') }}</div>
                        <div class="text-sm text-gray-400">{{ $adoption->created_at->diffForHumans() }}</div>
                    </div>

                    @if($adoption->assignedUser)
                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Assigned To</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->assignedUser->name }}</div>
                    </div>
                    @endif

                    <div class="border-b border-white/10 pb-3">
                        <div class="text-sm text-gray-400 mb-1">Last Updated</div>
                        <div class="text-lg text-white font-medium">{{ $adoption->updated_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>

            <!-- Notes Section -->
            @if($adoption->notes)
            <div class="bg-white/5 p-6 rounded-lg border border-white/10 mb-6">
                <h3 class="text-lg font-bold text-white mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#0ea5e9]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Notes
                </h3>
                <p class="text-gray-300 leading-relaxed">{{ $adoption->notes }}</p>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex gap-4 flex-wrap">
                @if($adoption->status == 'Pending Review')
                <form action="{{ route('rescue.adoptions.approve', $adoption->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full primary-btn text-center">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Approve Application
                    </button>
                </form>

                <form action="{{ route('rescue.adoptions.reject', $adoption->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full danger-btn text-center">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Reject Application
                    </button>
                </form>
                @elseif($adoption->status == 'Home Check Scheduled' || $adoption->status == 'Ready for Pickup')
                <form action="{{ route('rescue.adoptions.approve', $adoption->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full success-btn text-center">
                        Complete Adoption
                    </button>
                </form>
                @endif

                <a href="{{ route('rescue.adoptions') }}" class="outline-btn">
                    Back to Adoptions
                </a>
            </div>
        </div>
    </div>
</body>
</html>
