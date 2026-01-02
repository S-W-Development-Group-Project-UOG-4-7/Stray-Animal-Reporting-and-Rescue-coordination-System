<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Donations - SafePaws</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .status-badge { @apply px-3 py-1 rounded-full text-sm font-medium; }
        .status-pending { @apply bg-yellow-500/20 text-yellow-300 border border-yellow-500/30; }
        .status-completed { @apply bg-green-500/20 text-green-300 border border-green-500/30; }
        .status-failed { @apply bg-red-500/20 text-red-300 border border-red-500/30; }
        .status-refunded { @apply bg-gray-500/20 text-gray-300 border border-gray-500/30; }

        .method-badge { @apply px-2 py-1 rounded-md text-xs font-medium; }
        .method-card { @apply bg-blue-500/20 text-blue-300; }
        .method-paypal { @apply bg-yellow-500/20 text-yellow-300; }
        .method-bank { @apply bg-green-500/20 text-green-300; }

        .donation-card { @apply bg-white/5 border border-white/10 rounded-2xl p-6 transition-all duration-300 hover:border-white/20; }

        input, select { color: black !important; }

        .receipt-btn { @apply px-4 py-2 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-300 transition; }
    </style>
</head>

<body class="min-h-screen p-4 md:p-8">
<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-start justify-between">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-6 text-cyan-400 hover:text-cyan-300">
                    <i class="fas fa-arrow-left"></i>
                    Back to Home
                </a>
                <h1 class="mb-2 text-3xl font-bold md:text-4xl">My Donation History</h1>
                <p class="text-gray-300">Track all your donations and contributions to SafePaws</p>
                
                <!-- Stats Summary -->
                <div class="flex flex-wrap gap-4 mt-6">
                    <div class="px-4 py-3 border bg-green-500/10 border-green-500/20 rounded-xl">
                        <p class="text-sm text-gray-300">Total Donated</p>
                        <p class="text-2xl font-bold text-green-400">${{ number_format($donations->sum('amount'), 2) }}</p>
                    </div>
                    <div class="px-4 py-3 border bg-blue-500/10 border-blue-500/20 rounded-xl">
                        <p class="text-sm text-gray-300">Donations Count</p>
                        <p class="text-2xl font-bold text-blue-400">{{ $donations->count() }}</p>
                    </div>
                    @if($donations->count() > 0)
                    <div class="px-4 py-3 border bg-purple-500/10 border-purple-500/20 rounded-xl">
                        <p class="text-sm text-gray-300">Last Donation</p>
                        <p class="text-2xl font-bold text-purple-400">${{ number_format($donations->first()->amount, 2) }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <a href="{{ route('donation') }}"
               class="px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl">
                <i class="mr-2 fas fa-heart"></i>
                Make New Donation
            </a>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="mb-6">
        <form method="GET" action="{{ route('donation-history') }}" class="flex flex-wrap gap-3">
            <input type="text" name="donation_id" placeholder="Search by Donation ID"
                   value="{{ request('donation_id') }}"
                   class="w-full px-4 py-3 text-black rounded-xl md:w-1/4">
            
            <input type="text" name="date_range" placeholder="Date Range (YYYY-MM-DD to YYYY-MM-DD)"
                   value="{{ request('date_range') }}"
                   class="w-full px-4 py-3 text-black rounded-xl md:w-1/4">
            
            <select name="status" class="w-full px-4 py-3 text-black rounded-xl md:w-1/5">
                <option value="">All Status</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
            </select>
            
            <select name="payment_method" class="w-full px-4 py-3 text-black rounded-xl md:w-1/5">
                <option value="">All Methods</option>
                <option value="card" {{ request('payment_method') == 'card' ? 'selected' : '' }}>Credit Card</option>
                <option value="paypal" {{ request('payment_method') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                <option value="bank" {{ request('payment_method') == 'bank' ? 'selected' : '' }}>Bank Transfer</option>
            </select>
            
            <button type="submit" class="px-6 py-3 text-white bg-cyan-500 rounded-xl hover:bg-cyan-600">
                <i class="mr-2 fas fa-search"></i> Search
            </button>
        </form>
    </div>

    <!-- Donations Table -->
    <div class="donation-card">
        @if($donations->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="border-b border-white/10">
                    <th class="pb-4 text-left">Donation ID</th>
                    <th class="pb-4 text-left">Amount</th>
                    <th class="pb-4 text-left">Payment Method</th>
                    <th class="pb-4 text-left">Status</th>
                    <th class="pb-4 text-left">Date</th>
                    <th class="pb-4 text-left">Receipt</th>
                    <th class="pb-4 text-left">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($donations as $donation)
                <tr class="border-b border-white/5 hover:bg-white/5">
                    <td class="py-4 font-mono text-cyan-400">{{ $donation->donation_id }}</td>
                    <td class="py-4">
                        <div class="text-lg font-bold text-green-400">${{ number_format($donation->amount, 2) }}</div>
                        @if($donation->is_recurring)
                        <span class="text-xs text-cyan-300"><i class="mr-1 fas fa-sync-alt"></i> Recurring Monthly</span>
                        @endif
                    </td>
                    <td class="py-4">
                        <span class="method-badge method-{{ $donation->payment_method }}">
                            @if($donation->payment_method == 'card')
                                <i class="mr-1 fas fa-credit-card"></i> Card
                            @elseif($donation->payment_method == 'paypal')
                                <i class="mr-1 fab fa-paypal"></i> PayPal
                            @else
                                <i class="mr-1 fas fa-university"></i> Bank Transfer
                            @endif
                        </span>
                    </td>
                    <td class="py-4">
                        <span class="status-badge status-{{ $donation->status }}">
                            {{ ucfirst($donation->status) }}
                        </span>
                    </td>
                    <td class="py-4 text-sm text-gray-400">
                        {{ $donation->created_at->format('M d, Y') }}
                        <div class="text-xs">{{ $donation->created_at->format('h:i A') }}</div>
                    </td>
                    <td class="py-4">
                        <a href="#" class="receipt-btn" title="Download Receipt">
                            <i class="mr-1 fas fa-receipt"></i> Receipt
                        </a>
                    </td>
                    <td class="py-4">
                        <div class="flex gap-2">

                            <!-- EDIT -->
                            <a href="{{ route('donation-edit', $donation->id) }}"
                               class="px-3 py-2 text-sm text-blue-300 transition rounded-lg bg-blue-500/20 hover:bg-blue-500/30">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('donation.delete', $donation->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this donation?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-2 text-sm text-red-300 transition rounded-lg bg-red-500/20 hover:bg-red-500/30">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $donations->links() }}
        </div>
        @else
        <div class="py-12 text-center">
            <div class="mb-6 text-cyan-400">
                <i class="text-6xl fas fa-heart"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold">No Donations Found</h3>
            <p class="mb-6 text-gray-400">You haven't made any donations yet. Your support can make a difference!</p>
            <a href="{{ route('donation') }}" class="px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl">
                <i class="mr-2 fas fa-heart"></i>
                Make Your First Donation
            </a>
        </div>
        @endif
    </div>

</div>
</body>
</html>
