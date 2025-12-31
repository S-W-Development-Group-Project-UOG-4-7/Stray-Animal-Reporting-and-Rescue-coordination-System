<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track & Manage Reports - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSRF token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { background-color: #071331; color: white; font-family: 'Poppins', sans-serif; }
        .status-badge { @apply px-3 py-1 rounded-full text-sm font-medium; }
        .status-pending { @apply bg-yellow-500/20 text-yellow-300 border border-yellow-500/30; }
        .status-under-investigation { @apply bg-orange-500/20 text-orange-300 border border-orange-500/30; }
        .status-rescue { @apply bg-blue-500/20 text-blue-300 border border-blue-500/30; }
        .status-treatment { @apply bg-purple-500/20 text-purple-300 border border-purple-500/30; }
        .status-adoption { @apply bg-green-500/20 text-green-300 border border-green-500/30; }
        .status-resolved { @apply bg-green-500/20 text-green-300 border border-green-500/30; }
        .report-card { @apply bg-white/5 border border-white/10 rounded-2xl p-6 transition-all duration-300 hover:border-white/20; }
        
        /* Timeline Styles for Tracking Page */
        .timeline-container {
            @apply relative pl-8;
        }
        .timeline-item {
            @apply relative pb-8;
        }
        .timeline-dot {
            @apply absolute w-6 h-6 rounded-full flex items-center justify-center -left-8;
        }
        .timeline-line {
            @apply absolute left-[-15px] top-6 bottom-0 w-0.5;
        }
        .timeline-item:last-child .timeline-line {
            @apply hidden;
        }
        
        /* Status Colors */
        .status-dot-pending { @apply bg-yellow-500; }
        .status-dot-under-investigation { @apply bg-orange-500; }
        .status-dot-rescue { @apply bg-blue-500; }
        .status-dot-treatment { @apply bg-purple-500; }
        .status-dot-adoption { @apply bg-green-500; }
        .status-dot-resolved { @apply bg-green-500; }
        
        .status-line-active { @apply bg-cyan-500/30; }
        .status-line-inactive { @apply bg-gray-700; }
    </style>
</head>
<body class="min-h-screen p-4 md:p-8">

<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-4 text-cyan-400 hover:text-cyan-300">
                    <i class="fas fa-arrow-left"></i> Back to Home
                </a>
                <h1 class="mb-2 text-3xl font-bold md:text-4xl">Track & Manage Reports</h1>
                <p class="text-gray-300">Enter your report ID to track status or manage your reports</p>
            </div>
            <!-- View Reports History Button -->
            <a href="{{ route('my-reports') }}" 
               class="inline-flex items-center gap-3 px-6 py-3 font-medium transition bg-purple-500 hover:bg-purple-600 rounded-xl">
                <i class="fas fa-history"></i>
                View My Reports History
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="mb-8 report-card">
        <form id="track-form" method="GET" action="{{ route('track.status') }}" class="space-y-4">
            @csrf
            <div>
                <label for="search_report_id" class="block mb-2 font-medium">Enter Report ID</label>
                <div class="flex gap-4">
                    <input type="text" id="search_report_id" name="report_id" 
                        value="{{ request('report_id') }}"
                        class="flex-1 px-4 py-3 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                        placeholder="Enter your report ID (e.g., SP-ABC12345)"
                        required>
                    <button type="submit" class="px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl">
                        <i class="mr-2 fas fa-search"></i> Track Report
                    </button>
                </div>
                @if(session('error'))
                    <p class="mt-2 text-red-400">{{ session('error') }}</p>
                @endif
            </div>
        </form>
    </div>

    <!-- If report is found, show tracking status -->
    @if(isset($report) && $report)
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Tracking Status for Report #{{ $report->report_id }}</h2>
            <span class="status-badge status-{{ str_replace(' ', '-', strtolower($report->status)) }}">
                {{ ucfirst($report->status) }}
            </span>
        </div>

        <!-- Timeline Tracking -->
        <div class="report-card">
            <div class="timeline-container">
                @php
                    // Define status flow in order
                    $statusFlow = ['pending', 'under-investigation', 'rescue', 'treatment', 'adoption', 'resolved'];
                    $currentStatusIndex = array_search(str_replace(' ', '-', strtolower($report->status)), $statusFlow);
                    if ($currentStatusIndex === false) $currentStatusIndex = 0;
                @endphp

                @foreach($statusFlow as $index => $status)
                    @php
                        $statusName = ucwords(str_replace('-', ' ', $status));
                        $isActive = $index <= $currentStatusIndex;
                        $isCurrent = $index === $currentStatusIndex;
                    @endphp
                    
                    <div class="timeline-item">
                        <div class="timeline-dot status-dot-{{ $status }} {{ $isActive ? 'ring-4 ring-opacity-30 ring-cyan-500' : 'opacity-50' }}">
                            @if($isActive)
                                <i class="text-xs text-white fas {{ $isCurrent ? 'fa-spinner fa-pulse' : 'fa-check' }}"></i>
                            @endif
                        </div>
                        
                        <div class="ml-4 timeline-content">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold {{ $isActive ? 'text-white' : 'text-gray-400' }}">{{ $statusName }}</h3>
                                    @if($isCurrent)
                                        <p class="mt-1 text-sm text-cyan-300">Currently at this stage</p>
                                    @endif
                                    @if($index === 0)
                                        <p class="mt-1 text-sm text-gray-400">Report submitted and awaiting review</p>
                                    @elseif($status === 'under-investigation')
                                        <p class="mt-1 text-sm text-gray-400">Our team is investigating the report</p>
                                    @elseif($status === 'rescue')
                                        <p class="mt-1 text-sm text-gray-400">Rescue team dispatched to location</p>
                                    @elseif($status === 'treatment')
                                        <p class="mt-1 text-sm text-gray-400">Animal receiving medical care</p>
                                    @elseif($status === 'adoption')
                                        <p class="mt-1 text-sm text-gray-400">Animal ready for adoption</p>
                                    @elseif($status === 'resolved')
                                        <p class="mt-1 text-sm text-gray-400">Case successfully resolved</p>
                                    @endif
                                </div>
                                @if($isActive && $index > 0)
                                    <span class="text-sm text-gray-400">
                                        {{ $report->updated_at->format('M d, Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        @if($index < count($statusFlow) - 1)
                            <div class="timeline-line {{ $isActive ? 'status-line-active' : 'status-line-inactive' }}"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Report Details Card -->
    <div class="grid grid-cols-1 gap-8 mb-8 lg:grid-cols-3">
        <div class="lg:col-span-2 report-card">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h2 class="mb-2 text-2xl font-bold">Report Details</h2>
                    <div class="flex items-center gap-4">
                        <span class="font-mono text-cyan-400">{{ $report->report_id }}</span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-400">Submitted</p>
                    <p class="font-medium">{{ $report->created_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                <div><p class="mb-1 text-gray-400">Animal Type</p><p class="text-lg font-medium">{{ $report->animal_type }}</p></div>
                <div><p class="mb-1 text-gray-400">Location</p><p class="font-medium">{{ $report->location }}</p></div>
                <div><p class="mb-1 text-gray-400">Last Seen</p><p class="font-medium">{{ $report->last_seen->format('M d, Y h:i A') }}</p></div>
                <div><p class="mb-1 text-gray-400">Contact</p><p class="font-medium">{{ $report->contact_name ?: 'Not provided' }}</p></div>
            </div>

            <div class="mb-6">
                <p class="mb-2 text-gray-400">Description</p>
                <div class="p-4 bg-white/5 rounded-xl">
                    <p>{{ $report->description }}</p>
                </div>
            </div>

            @if($report->animal_photo)
            <div>
                <p class="mb-2 text-gray-400">Uploaded Photo</p>
                <div class="overflow-hidden rounded-xl">
                    @php
                        // Try multiple possible paths for the image
                        $imagePath = null;
                        $storagePath = 'storage/' . $report->animal_photo;
                        $publicPath = $report->animal_photo;
                        
                        // Check if file exists in storage
                        if (file_exists(public_path($storagePath))) {
                            $imagePath = asset($storagePath);
                        } 
                        // Check if file exists in public path
                        elseif (file_exists(public_path($publicPath))) {
                            $imagePath = asset($publicPath);
                        }
                        // Check if it's a full URL
                        elseif (filter_var($report->animal_photo, FILTER_VALIDATE_URL)) {
                            $imagePath = $report->animal_photo;
                        }
                    @endphp
                    
                    @if($imagePath)
                        <img src="{{ $imagePath }}" 
                             alt="Animal photo" 
                             class="object-cover w-full h-auto rounded-lg max-h-96"
                             onerror="this.src='https://placehold.co/600x400/1e3a8a/ffffff?text=Image+Not+Found'">
                    @else
                        <div class="flex items-center justify-center h-64 rounded-lg bg-gray-800/50">
                            <div class="text-center">
                                <i class="mb-2 text-4xl text-gray-400 fas fa-image"></i>
                                <p class="text-gray-400">Photo not available</p>
                                <p class="mt-1 text-sm text-gray-500">Path: {{ $report->animal_photo }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <!-- Actions Sidebar -->
        <div class="report-card">
            <h3 class="mb-4 text-xl font-bold">Report Actions</h3>
            <div class="space-y-4">
                <!-- Edit Report -->
                <button onclick="openEditModal('{{ $report->report_id }}')" 
                    class="flex items-center w-full gap-3 p-4 transition border bg-green-500/10 hover:bg-green-500/20 rounded-xl border-green-500/30">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-500/20">
                        <i class="text-green-400 fas fa-edit"></i>
                    </div>
                    <div>
                        <p class="font-medium">Edit Report</p>
                        <p class="text-sm text-gray-400">Update report information</p>
                    </div>
                </button>
                
                <!-- Download Report -->
                <button onclick="downloadReport('{{ $report->report_id }}')"
                    class="flex items-center w-full gap-3 p-4 transition border bg-blue-500/10 hover:bg-blue-500/20 rounded-xl border-blue-500/30">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-500/20">
                        <i class="text-blue-400 fas fa-download"></i>
                    </div>
                    <div>
                        <p class="font-medium">Download Report</p>
                        <p class="text-sm text-gray-400">Save as PDF</p>
                    </div>
                </button>
                
                <!-- Share Report -->
                <button onclick="shareReport('{{ $report->report_id }}')"
                    class="flex items-center w-full gap-3 p-4 transition border bg-purple-500/10 hover:bg-purple-500/20 rounded-xl border-purple-500/30">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-500/20">
                        <i class="text-purple-400 fas fa-share-alt"></i>
                    </div>
                    <div>
                        <p class="font-medium">Share Status</p>
                        <p class="text-sm text-gray-400">Share with others</p>
                    </div>
                </button>
            </div>
        </div>
    </div>
    @elseif(request('report_id'))
        <div class="p-8 text-center report-card">
            <i class="mb-4 text-5xl text-gray-400 fas fa-search"></i>
            <h3 class="mb-2 text-xl font-bold">Report Not Found</h3>
            <p class="text-gray-400">No report found with ID: <span class="font-mono text-cyan-400">{{ request('report_id') }}</span></p>
            <p class="mt-4 text-sm text-gray-500">Please check the report ID and try again.</p>
        </div>
    @endif
</div>

<!-- Email Verification Modal -->
<div id="emailVerifyModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50">
    <div class="w-full max-w-md p-6 bg-white rounded-xl">
        <h2 class="mb-4 text-xl font-bold text-gray-800">Verify Email to Edit</h2>
        <p class="mb-4 text-gray-600">Please enter the email associated with this report.</p>
        <input type="email" id="verify_email_input" placeholder="Email" class="w-full px-4 py-2 mb-4 border rounded-lg">
        <div id="verify_email_error" class="hidden mb-2 text-red-500"></div>
        <div class="flex justify-end gap-4">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
            <button id="verifyEmailBtn" class="px-4 py-2 text-white rounded-lg bg-cyan-500 hover:bg-cyan-600">Verify</button>
        </div>
    </div>
</div>

<script>
let currentReportId = null;

// Open modal
function openEditModal(reportId) {
    currentReportId = reportId;
    document.getElementById('verify_email_input').value = '';
    document.getElementById('verify_email_error').classList.add('hidden');
    document.getElementById('emailVerifyModal').classList.remove('hidden');
}

// Close modal
function closeModal() {
    document.getElementById('emailVerifyModal').classList.add('hidden');
}

// AJAX verify email
document.getElementById('verifyEmailBtn').addEventListener('click', function() {
    const email = document.getElementById('verify_email_input').value.trim();
    const errorDiv = document.getElementById('verify_email_error');

    if (!email) {
        errorDiv.textContent = "Email is required";
        errorDiv.classList.remove('hidden');
        return;
    }

    fetch('/verify-edit-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            email: email,
            reportId: currentReportId
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = `/edit-report/${currentReportId}`;
        } else {
            errorDiv.textContent = data.message || "Email verification failed";
            errorDiv.classList.remove('hidden');
        }
    })
    .catch(err => {
        errorDiv.textContent = "Server error. Try again.";
        errorDiv.classList.remove('hidden');
    });
});

// Download report function
function downloadReport(reportId) {
    // Implement PDF download functionality
    alert('Download functionality would generate a PDF for report: ' + reportId);
    // window.location.href = `/download-report/${reportId}`;
}

// Share report function
function shareReport(reportId) {
    if (navigator.share) {
        navigator.share({
            title: 'SafePaws Report Status',
            text: `Check the status of my animal rescue report #${reportId}`,
            url: window.location.href,
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(window.location.href);
        alert('Link copied to clipboard!');
    }
}

// Form submission for tracking
document.getElementById('track-form').addEventListener('submit', function(e) {
    const reportId = document.getElementById('search_report_id').value.trim();
    if (!reportId) {
        e.preventDefault();
        alert('Please enter a report ID');
    }
});
</script>

</body>
</html>