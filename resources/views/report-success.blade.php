<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Submitted - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9, #22d3ee, #67e8f9);
        }
        
        .success-checkmark {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            background: linear-gradient(135deg, #0ea5e9, #22d3ee);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-2xl p-8 border bg-white/5 backdrop-blur-lg rounded-3xl md:p-12 border-white/10">
        <div class="mb-8 success-checkmark">
            <i class="text-3xl text-white fas fa-check"></i>
        </div>
        
        <h1 class="mb-6 text-3xl font-bold text-center md:text-4xl">
            Report Submitted Successfully!
        </h1>
        
        <p class="mb-8 text-center text-gray-300">
            Thank you for helping an animal in need. Our rescue team has been notified and will respond as soon as possible.
        </p>
        
        <div class="p-6 mb-8 bg-white/5 rounded-2xl">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <p class="text-sm text-gray-400">Report ID</p>
                    <p class="text-2xl font-bold text-cyan-400">{{ $report->report_id }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-400">Status</p>
                    <p class="text-2xl font-bold text-yellow-400">Pending</p>
                </div>
                <div>
                    <p class="text-sm text-gray-400">Animal Type</p>
                    <p class="text-xl font-medium">{{ $report->animal_type }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-400">Location</p>
                    <p class="text-xl font-medium">{{ $report->location }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-400">Description</p>
                    <p class="text-lg">{{ $report->description }}</p>
                </div>
            </div>
        </div>
        
        <div class="space-y-4 text-center">
            <a href="{{ route('track.report', $report->report_id) }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 font-medium text-white transition duration-300 rounded-full bg-cyan-500 hover:bg-cyan-600">
                <i class="fas fa-search"></i>
                Track Report Status
            </a>
            
            <p class="mt-4 text-sm text-gray-400">
                Your report ID has been saved. You can use it to track the status of your report.
            </p>
            
            <div class="pt-6 border-t border-white/10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300">
                    <i class="fas fa-home"></i>
                    Return to Homepage
                </a>
                <span class="mx-4 text-gray-600">|</span>
                <a href="{{ route('animal.report.form') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300">
                    <i class="fas fa-plus"></i>
                    Submit Another Report
                </a>
            </div>
            <!-- Delete Option -->
<div class="pt-6 mt-8 border-t border-white/10">
    <p class="mb-4 text-gray-400">Need to delete this report?</p>
    <a href="{{ route('report.delete', $report->report_id) }}" 
       class="inline-flex items-center gap-2 px-6 py-3 text-red-300 transition border bg-red-500/20 hover:bg-red-500/30 border-red-500/30 hover:text-white rounded-xl">
        <i class="fas fa-trash-alt"></i>
        Delete This Report
    </a>
</div>
        </div>
    </div>
</body>
</html>