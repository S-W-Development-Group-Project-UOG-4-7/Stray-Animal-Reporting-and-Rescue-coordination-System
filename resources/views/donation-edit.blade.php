<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donation - SafePaws</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .form-card {
            @apply bg-white/5 border border-white/10 rounded-2xl p-6 transition-all duration-300;
        }

        input, select, textarea {
            color: black !important;
        }

        .back-btn {
            @apply px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-gray-300 transition;
        }

        .update-btn {
            @apply px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl;
        }

        .cancel-btn {
            @apply px-6 py-3 font-medium transition bg-gray-500 hover:bg-gray-600 rounded-xl;
        }
    </style>
</head>

<body class="min-h-screen p-4 md:p-8">
<div class="max-w-4xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-start justify-between">
            <div>
                <a href="{{ route('donation.history') }}" class="inline-flex items-center gap-2 mb-6 text-cyan-400 hover:text-cyan-300">
                    <i class="fas fa-arrow-left"></i>
                    Back to Donation History
                </a>
                <h1 class="mb-2 text-3xl font-bold md:text-4xl">Edit Donation</h1>
                <p class="text-gray-300">Update your donation information</p>
            </div>
            <div class="px-4 py-3 border bg-blue-500/10 border-blue-500/20 rounded-xl">
                <p class="text-sm text-gray-300">Donation ID</p>
                <p class="text-xl font-bold text-blue-400">{{ $donation->donation_id ?? 'DN-' . str_pad($donation->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="form-card">
        <form method="POST" action="{{ route('donation.update', $donation->id) }}">
            @csrf
            @method('PUT')

            <!-- Donation Information -->
            <div class="mb-8">
                <h3 class="pb-2 mb-4 text-xl font-bold border-b border-white/10">Donation Information</h3>
                
                <!-- Current Status -->
                <div class="p-4 mb-6 border rounded-xl bg-yellow-500/10 border-yellow-500/20">
                    <div class="flex items-center gap-3">
                        <i class="text-yellow-400 fas fa-info-circle"></i>
                        <div>
                            <p class="font-medium text-yellow-300">This donation is currently <span class="font-bold">{{ ucfirst($donation->status) }}</span></p>
                            <p class="mt-1 text-sm text-gray-300">Only certain information can be edited for pending donations.</p>
                        </div>
                    </div>
                </div>

                <!-- Amount -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">Donation Amount</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <span class="text-gray-500">$</span>
                        </div>
                        <input type="number" 
                               name="amount" 
                               value="{{ old('amount', $donation->amount) }}"
                               min="1" 
                               step="0.01"
                               class="w-full py-3 pl-8 pr-4 rounded-xl"
                               required>
                    </div>
                    @error('amount')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium">Message (Optional)</label>
                    <textarea 
                        name="message" 
                        rows="3" 
                        class="w-full px-4 py-3 rounded-xl"
                        placeholder="Add a message with your donation...">{{ old('message', $donation->message) }}</textarea>
                    @error('message')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Preferences -->
                <div class="mb-6">
                    <label class="block mb-3 font-medium">Donation Preferences</label>
                    
                    <div class="space-y-3">
                        <label class="flex items-center gap-3">
                            <input type="checkbox" 
                                   name="anonymous" 
                                   value="1" 
                                   {{ old('anonymous', $donation->anonymous) ? 'checked' : '' }}
                                   class="w-5 h-5 rounded">
                            <span>Make this donation anonymous</span>
                        </label>

                        <label class="flex items-center gap-3">
                            <input type="checkbox" 
                                   name="show_on_wall" 
                                   value="1" 
                                   {{ old('show_on_wall', $donation->show_on_wall) ? 'checked' : '' }}
                                   class="w-5 h-5 rounded">
                            <span>Show my name on the donor wall (unless anonymous)</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Current Details (Readonly) -->
            <div class="mb-8">
                <h3 class="pb-2 mb-4 text-xl font-bold border-b border-white/10">Current Details</h3>
                
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="p-4 rounded-xl bg-white/5">
                        <p class="text-sm text-gray-400">Donor Name</p>
                        <p class="font-medium">{{ $donation->donor_name }}</p>
                    </div>
                    
                    <div class="p-4 rounded-xl bg-white/5">
                        <p class="text-sm text-gray-400">Email</p>
                        <p class="font-medium">{{ $donation->donor_email }}</p>
                    </div>
                    
                    <div class="p-4 rounded-xl bg-white/5">
                        <p class="text-sm text-gray-400">Payment Method</p>
                        <p class="font-medium">
                            @if($donation->payment_method == 'bank_transfer')
                                <i class="mr-2 fas fa-university"></i> Bank Transfer
                            @elseif($donation->payment_method == 'card')
                                <i class="mr-2 fas fa-credit-card"></i> Credit Card
                            @elseif($donation->payment_method == 'paypal')
                                <i class="mr-2 fab fa-paypal"></i> PayPal
                            @else
                                {{ ucfirst(str_replace('_', ' ', $donation->payment_method)) }}
                            @endif
                        </p>
                    </div>
                    
                    <div class="p-4 rounded-xl bg-white/5">
                        <p class="text-sm text-gray-400">Date Submitted</p>
                        <p class="font-medium">{{ $donation->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>
                
                @if($donation->payment_slip)
                <div class="p-4 mt-4 rounded-xl bg-white/5">
                    <p class="mb-2 text-sm text-gray-400">Payment Slip</p>
                    <a href="{{ Storage::url($donation->payment_slip) }}" 
                       target="_blank"
                       class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300">
                        <i class="fas fa-file-invoice"></i>
                        View Uploaded Slip
                    </a>
                </div>
                @endif
            </div>

            <!-- Form Actions -->
            <div class="flex flex-wrap items-center justify-between gap-4 pt-6 border-t border-white/10">
                <div>
                    <a href="{{ route('donation.history') }}" 
                       class="cancel-btn">
                        <i class="mr-2 fas fa-times"></i>
                        Cancel
                    </a>
                </div>
                
                <div class="flex gap-3">
                    @if(in_array($donation->status, ['pending', 'upcoming']))
                    <button type="submit" class="update-btn">
                        <i class="mr-2 fas fa-save"></i>
                        Update Donation
                    </button>
                    @else
                    <div class="p-4 border rounded-xl bg-red-500/10 border-red-500/20">
                        <p class="text-red-300">
                            <i class="mr-2 fas fa-exclamation-triangle"></i>
                            This donation cannot be edited because its status is {{ ucfirst($donation->status) }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Important Notes -->
    <div class="p-6 mt-8 border border-yellow-500/20 rounded-2xl bg-yellow-500/5">
        <h3 class="mb-3 text-lg font-bold text-yellow-300">
            <i class="mr-2 fas fa-exclamation-circle"></i>
            Important Information
        </h3>
        <ul class="space-y-2 text-sm text-gray-300">
            <li><i class="mr-2 text-green-400 fas fa-check"></i>You can only edit donations that are in "Pending" status</li>
            <li><i class="mr-2 text-green-400 fas fa-check"></i>Completed donations cannot be modified for accounting purposes</li>
            <li><i class="mr-2 text-green-400 fas fa-check"></i>If you need to change donor information, please contact support</li>
            <li><i class="mr-2 text-green-400 fas fa-check"></i>Your donation receipt will be updated with the new information</li>
        </ul>
    </div>

</div>

<script>
    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const amount = document.querySelector('input[name="amount"]').value;
        
        if (amount < 1) {
            e.preventDefault();
            alert('Please enter a valid donation amount (minimum $1).');
            return false;
        }
        
        if (!confirm('Are you sure you want to update this donation?')) {
            e.preventDefault();
            return false;
        }
    });
</script>

</body>
</html>