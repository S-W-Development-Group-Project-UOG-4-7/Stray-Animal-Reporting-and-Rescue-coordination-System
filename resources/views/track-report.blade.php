<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track & Manage Reports - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        
        .status-badge {
            @apply px-3 py-1 rounded-full text-sm font-medium;
        }
        
        .status-pending {
            @apply bg-yellow-500/20 text-yellow-300 border border-yellow-500/30;
        }
        
        .status-in_progress {
            @apply bg-blue-500/20 text-blue-300 border border-blue-500/30;
        }
        
        .status-resolved {
            @apply bg-green-500/20 text-green-300 border border-green-500/30;
        }
        
        .report-card {
            @apply bg-white/5 border border-white/10 rounded-2xl p-6 transition-all duration-300 hover:border-white/20;
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-6 text-cyan-400 hover:text-cyan-300">
                <i class="fas fa-arrow-left"></i>
                Back to Home
            </a>
            <h1 class="mb-4 text-3xl font-bold md:text-4xl">Track & Manage Reports</h1>
            <p class="text-gray-300">Enter your report ID to track status or manage your reports</p>
        </div>
        
        <!-- Search Form -->
        <div class="mb-8 report-card">
            <form id="track-form" method="GET" action="{{ route('track.report') }}" class="space-y-4">
                <div>
                    <label for="search_report_id" class="block mb-2 font-medium">Enter Report ID</label>
                    <div class="flex gap-4">
                        <input type="text" id="search_report_id" name="report_id" 
                               value="{{ request('report_id') }}"
                               class="flex-1 px-4 py-3 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-cyan-500"
                               placeholder="Enter your report ID (e.g., SP-ABC12345)">
                        <button type="submit" class="px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl">
                            <i class="mr-2 fas fa-search"></i>
                            Track Report
                        </button>
                    </div>
                    <p class="mt-2 text-sm text-gray-400">
                        <i class="mr-1 fas fa-info-circle"></i>
                        Find your report ID in the confirmation email or success page
                    </p>
                </div>
            </form>
        </div>
        
        <!-- Report Details (if searched) -->
        @if(isset($report) && $report)
        <div class="grid grid-cols-1 gap-8 mb-8 lg:grid-cols-3">
            <!-- Report Info -->
            <div class="lg:col-span-2">
                <div class="report-card">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold">Report Details</h2>
                            <div class="flex items-center gap-4">
                                <span class="status-badge status-{{ $report->status }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                                <span class="font-mono text-cyan-400">{{ $report->report_id }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Submitted</p>
                            <p class="font-medium">{{ $report->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <p class="mb-1 text-gray-400">Animal Type</p>
                            <p class="text-lg font-medium">{{ $report->animal_type }}</p>
                        </div>
                        <div>
                            <p class="mb-1 text-gray-400">Location</p>
                            <p class="font-medium">{{ $report->location }}</p>
                        </div>
                        <div>
                            <p class="mb-1 text-gray-400">Last Seen</p>
                            <p class="font-medium">{{ $report->last_seen->format('M d, Y h:i A') }}</p>
                        </div>
                        <div>
                            <p class="mb-1 text-gray-400">Contact</p>
                            <p class="font-medium">{{ $report->contact_name ?: 'Not provided' }}</p>
                        </div>
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
                        <img src="{{ asset($report->animal_photo) }}" 
                             alt="Animal photo" 
                             class="object-cover h-auto max-w-full rounded-xl max-h-64">
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Actions Sidebar -->
            <div>
                <div class="mb-6 report-card">
                    <h3 class="mb-4 text-xl font-bold">Report Actions</h3>
                    
                    <div class="space-y-4">
                        <!-- Update Status -->
                        <a href="#" 
                           class="flex items-center gap-3 p-4 transition border bg-white/5 hover:bg-white/10 rounded-xl border-white/10">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-500/20">
                                <i class="text-blue-400 fas fa-sync-alt"></i>
                            </div>
                            <div>
                                <p class="font-medium">Update Status</p>
                                <p class="text-sm text-gray-400">Contact us to update report</p>
                            </div>
                        </a>
                        
                        <!-- Print Report -->
                        <button onclick="printReport()"
                           class="flex items-center w-full gap-3 p-4 transition border bg-white/5 hover:bg-white/10 rounded-xl border-white/10">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-cyan-500/20">
                                <i class="fas fa-print text-cyan-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Print Report</p>
                                <p class="text-sm text-gray-400">Save a copy for your records</p>
                            </div>
                        </button>
                        
                        <!-- Delete Report -->
                        <a href="{{ route('report.delete', $report->report_id) }}" 
                           class="flex items-center gap-3 p-4 transition border bg-red-500/10 hover:bg-red-500/20 rounded-xl border-red-500/30">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-500/20">
                                <i class="text-red-400 fas fa-trash-alt"></i>
                            </div>
                            <div>
                                <p class="font-medium">Delete Report</p>
                                <p class="text-sm text-gray-400">Permanently remove this report</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Help Section -->
                <div class="report-card">
                    <h3 class="mb-4 text-xl font-bold">Need Help?</h3>
                    <div class="space-y-3">
                        <a href="tel:555911264625" class="flex items-center gap-3 text-red-400 hover:text-red-300">
                            <i class="fas fa-phone-alt"></i>
                            <span>Emergency: (555) 911-ANIMAL</span>
                        </a>
                        <a href="mailto:emergency@safepaws.org" class="flex items-center gap-3 text-cyan-400 hover:text-cyan-300">
                            <i class="fas fa-envelope"></i>
                            <span>emergency@safepaws.org</span>
                        </a>
                        <p class="mt-4 text-sm text-gray-400">
                            <i class="mr-1 fas fa-info-circle"></i>
                            Report IDs are case-sensitive and cannot be recovered if deleted.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Timeline -->
        <div class="mb-8 report-card">
            <h3 class="mb-6 text-xl font-bold">Report Timeline</h3>
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-3 h-3 mt-2 rounded-full bg-cyan-500"></div>
                    <div class="flex-1">
                        <p class="font-medium">Report Submitted</p>
                        <p class="text-sm text-gray-400">{{ $report->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4">
                    <div class="w-3 h-3 mt-2 rounded-full {{ $report->status != 'pending' ? 'bg-blue-500' : 'bg-gray-500' }}"></div>
                    <div class="flex-1">
                        <p class="font-medium">Under Review</p>
                        <p class="text-sm text-gray-400">
                            {{ $report->status != 'pending' ? 'Report assigned to rescue team' : 'Awaiting team assignment' }}
                        </p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4">
                    <div class="w-3 h-3 mt-2 rounded-full {{ $report->status == 'resolved' ? 'bg-green-500' : 'bg-gray-500' }}"></div>
                    <div class="flex-1">
                        <p class="font-medium">Resolved</p>
                        <p class="text-sm text-gray-400">
                            {{ $report->status == 'resolved' ? 'Animal rescued and cared for' : 'Rescue in progress' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('animal.report.form') }}" class="px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl">
                <i class="mr-2 fas fa-plus"></i>
                Submit New Report
            </a>
            <a href="{{ route('report.delete', $report->report_id) }}" class="px-6 py-3 font-medium text-red-300 transition border bg-red-500/20 hover:bg-red-500/30 border-red-500/30 hover:text-white rounded-xl">
                <i class="mr-2 fas fa-trash-alt"></i>
                Delete This Report
            </a>
        </div>
        
        @elseif(request('report_id'))
        <!-- No report found -->
        <div class="py-12 text-center report-card">
            <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-yellow-500/20">
                <i class="text-3xl text-yellow-400 fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold">Report Not Found</h3>
            <p class="max-w-md mx-auto mb-6 text-gray-300">
                No report found with ID: <span class="px-2 py-1 font-mono rounded bg-white/10">{{ request('report_id') }}</span>
            </p>
            <div class="space-y-3">
                <p class="text-gray-400">Possible reasons:</p>
                <ul class="max-w-sm mx-auto space-y-2 text-left text-gray-300">
                    <li class="flex items-start gap-2">
                        <i class="mt-2 text-xs fas fa-circle"></i>
                        <span>Report ID entered incorrectly</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="mt-2 text-xs fas fa-circle"></i>
                        <span>Report may have been deleted</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="mt-2 text-xs fas fa-circle"></i>
                        <span>System processing delay</span>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        
        <!-- Instructions -->
        <div class="pt-8 mt-12 border-t border-white/10">
            <h3 class="mb-6 text-xl font-bold">How to Manage Your Reports</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="report-card">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-xl bg-cyan-500/20">
                        <i class="text-xl fas fa-search text-cyan-400"></i>
                    </div>
                    <h4 class="mb-2 font-bold">Track Status</h4>
                    <p class="text-sm text-gray-300">Enter your report ID to see current status and updates from our rescue team.</p>
                </div>
                
                <div class="report-card">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-xl bg-blue-500/20">
                        <i class="text-xl text-blue-400 fas fa-phone-alt"></i>
                    </div>
                    <h4 class="mb-2 font-bold">Get Updates</h4>
                    <p class="text-sm text-gray-300">Contact our team for the latest information about your reported animal.</p>
                </div>
                
                <div class="report-card">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-xl bg-red-500/20">
                        <i class="text-xl text-red-400 fas fa-trash-alt"></i>
                    </div>
                    <h4 class="mb-2 font-bold">Delete Reports</h4>
                    <p class="text-sm text-gray-300">Remove reports that are no longer needed. This action is permanent.</p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function printReport() {
            const printContent = `
                <html>
                <head>
                    <title>SafePaws Report - {{ $report->report_id ?? '' }}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .header { text-align: center; margin-bottom: 30px; }
                        .section { margin-bottom: 20px; }
                        .label { font-weight: bold; color: #666; }
                        .value { margin-bottom: 10px; }
                        .footer { margin-top: 50px; text-align: center; color: #666; font-size: 12px; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>SafePaws Animal Report</h1>
                        <p>Report ID: {{ $report->report_id ?? 'N/A' }}</p>
                        <p>Generated: ${new Date().toLocaleString()}</p>
                    </div>
                    
                    <div class="section">
                        <div class="label">Status:</div>
                        <div class="value">{{ ucfirst($report->status ?? 'N/A') }}</div>
                        
                        <div class="label">Animal Type:</div>
                        <div class="value">{{ $report->animal_type ?? 'N/A' }}</div>
                        
                        <div class="label">Location:</div>
                        <div class="value">{{ $report->location ?? 'N/A' }}</div>
                        
                        <div class="label">Last Seen:</div>
                        <div class="value">{{ $report->last_seen ? $report->last_seen->format('M d, Y h:i A') : 'N/A' }}</div>
                        
                        <div class="label">Description:</div>
                        <div class="value">{{ $report->description ?? 'N/A' }}</div>
                        
                        <div class="label">Contact Information:</div>
                        <div class="value">
                            Name: {{ $report->contact_name ?? 'Not provided' }}<br>
                            Phone: {{ $report->contact_phone ?? 'Not provided' }}<br>
                            Email: {{ $report->contact_email ?? 'Not provided' }}
                        </div>
                        
                        <div class="label">Submitted:</div>
                        <div class="value">{{ $report->created_at ? $report->created_at->format('M d, Y h:i A') : 'N/A' }}</div>
                    </div>
                    
                    <div class="footer">
                        <p>--- SafePaws Animal Rescue ---</p>
                        <p>Emergency: (555) 911-ANIMAL | Email: emergency@safepaws.org</p>
                        <p>This document is generated for reference purposes only.</p>
                    </div>
                </body>
                </html>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>