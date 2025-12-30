<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Report - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        
        .danger-btn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }
        
        .danger-btn:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md p-8 border bg-white/5 backdrop-blur-lg rounded-3xl border-white/10">
        <div class="mb-8 text-center">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-red-500 to-red-600">
                <i class="text-2xl text-white fas fa-exclamation-triangle"></i>
            </div>
            <h1 class="text-2xl font-bold">Delete Animal Report</h1>
            <p class="mt-2 text-gray-300">Enter your report ID and email to delete a report</p>
        </div>
        
        @if(isset($report) && $report)
        <!-- If report is found -->
        <div class="p-4 mb-6 border bg-red-500/10 border-red-500/30 rounded-xl">
            <h3 class="mb-2 font-bold text-red-300">Report Found:</h3>
            <p><span class="text-gray-400">ID:</span> <span class="font-mono">{{ $report->report_id }}</span></p>
            <p><span class="text-gray-400">Animal Type:</span> {{ $report->animal_type }}</p>
            <p><span class="text-gray-400">Location:</span> {{ $report->location }}</p>
            <p><span class="text-gray-400">Status:</span> <span class="font-bold">{{ ucfirst($report->status) }}</span></p>
            <p class="mt-3 text-sm text-gray-400">
                <i class="mr-1 fas fa-calendar"></i>
                Reported: {{ $report->created_at->format('M d, Y h:i A') }}
            </p>
        </div>
        @endif
        
        <form id="delete-report-form" method="POST" class="space-y-6">
            @csrf
            @method('DELETE')
            
            <div>
                <label for="report_id" class="block mb-2 font-medium">Report ID *</label>
                <input type="text" id="report_id" name="report_id" 
                       value="{{ $report->report_id ?? old('report_id') }}"
                       class="w-full px-4 py-3 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-red-500"
                       placeholder="Enter your report ID (e.g., SP-ABC12345)"
                       required>
            </div>
            
            <div>
                <label for="email" class="block mb-2 font-medium">Your Email *</label>
                <input type="email" id="email" name="email" 
                       value="{{ old('email') }}"
                       class="w-full px-4 py-3 border bg-white/10 border-white/20 rounded-xl focus:outline-none focus:border-red-500"
                       placeholder="Enter the email you used when submitting"
                       required>
                <p class="mt-2 text-sm text-gray-400">
                    <i class="mr-1 fas fa-info-circle"></i>
                    For verification purposes only
                </p>
            </div>
            
            <div class="p-4 border bg-red-500/10 border-red-500/30 rounded-xl">
                <div class="flex items-start">
                    <i class="mt-1 mr-3 text-red-400 fas fa-exclamation-circle"></i>
                    <div>
                        <h4 class="mb-2 font-bold text-red-300">Warning: This action cannot be undone</h4>
                        <p class="text-sm text-gray-300">
                            • The report will be permanently deleted<br>
                            • Any uploaded photos will be removed<br>
                            • You will not be able to track this report again<br>
                            • Rescue team will no longer have access to this information
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex gap-4">
                <a href="{{ route('track.report') }}" class="flex-1 px-6 py-3 text-center transition border border-white/20 hover:bg-white/10 rounded-xl">
                    Cancel
                </a>
                <button type="submit" class="flex-1 px-6 py-3 font-medium text-white transition danger-btn rounded-xl hover:shadow-lg hover:shadow-red-500/30">
                    <i class="mr-2 fas fa-trash-alt"></i>
                    Delete Report
                </button>
            </div>
        </form>
        
        <div class="pt-6 mt-8 text-center border-t border-white/10">
            <a href="{{ route('track.report') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300">
                <i class="mr-2 fas fa-search"></i>
                Track Report Instead
            </a>
            <span class="mx-4 text-gray-600">|</span>
            <a href="{{ route('home') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300">
                <i class="mr-2 fas fa-home"></i>
                Back to Home
            </a>
        </div>
    </div>
    
    <!-- Success/Error Modal -->
    <div id="result-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/70">
        <div class="max-w-md w-full bg-[#071331] rounded-2xl p-8 border border-white/20">
            <div id="result-icon" class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full"></div>
            <h2 id="result-title" class="mb-4 text-2xl font-bold text-center"></h2>
            <p id="result-message" class="mb-6 text-center text-gray-300"></p>
            <div class="flex justify-center">
                <button onclick="closeResultModal()" class="px-8 py-3 transition bg-white/10 hover:bg-white/20 rounded-xl">
                    Close
                </button>
            </div>
        </div>
    </div>
    
    <script>
        const deleteForm = document.getElementById('delete-report-form');
        const resultModal = document.getElementById('result-modal');
        const resultIcon = document.getElementById('result-icon');
        const resultTitle = document.getElementById('result-title');
        const resultMessage = document.getElementById('result-message');
        
       if (deleteForm) {
    deleteForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const reportId = document.getElementById('report_id').value;
        const userEmail = document.getElementById('email').value;
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Show loading
        submitBtn.innerHTML = '<i class="mr-2 fas fa-spinner fa-spin"></i> Deleting...';
        submitBtn.disabled = true;
        
        try {
            console.log('Deleting report:', reportId);
            console.log('User email:', userEmail);
            
            // FIXED: Use the correct URL with CSRF token
            const response = await fetch(`/report/${reportId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: userEmail,
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                })
            });
            
            console.log('Response status:', response.status);
            
            const result = await response.json();
            console.log('Response data:', result);
            
            if (response.ok && result.success) {
                showResult('success', 'Report Deleted', 'Your report has been successfully deleted.');
                deleteForm.reset();
            } else {
                showResult('error', 'Error', result.message || 'Failed to delete report.');
            }
        } catch (error) {
            console.error('Fetch error:', error);
            showResult('error', 'Network Error', 'Please check your connection and try again.');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
}
        
        function showResult(type, title, message) {
            // Set icon and colors
            if (type === 'success') {
                resultIcon.innerHTML = '<i class="text-2xl text-white fas fa-check"></i>';
                resultIcon.className = 'w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600';
                resultTitle.className = 'text-2xl font-bold text-center mb-4 text-green-400';
            } else {
                resultIcon.innerHTML = '<i class="text-2xl text-white fas fa-times"></i>';
                resultIcon.className = 'w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600';
                resultTitle.className = 'text-2xl font-bold text-center mb-4 text-red-400';
            }
            
            // Set content
            resultTitle.textContent = title;
            resultMessage.textContent = message;
            
            // Show modal
            resultModal.classList.remove('hidden');
        }
        
        function closeResultModal() {
            resultModal.classList.add('hidden');
        }
        
        // Close modal on outside click
        resultModal.addEventListener('click', function(e) {
            if (e.target === resultModal) {
                closeResultModal();
            }
        });
        
        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !resultModal.classList.contains('hidden')) {
                closeResultModal();
            }
        });
    </script>
</body>
</html>