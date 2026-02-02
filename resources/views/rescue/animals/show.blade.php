<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $animal->name }} - Animal Details</title>
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
        .status-available { @apply bg-green-500/20 text-green-300; }
        .status-adopted { @apply bg-blue-500/20 text-blue-300; }
        .status-rescued { @apply bg-purple-500/20 text-purple-300; }
        .status-in-treatment { @apply bg-yellow-500/20 text-yellow-300; }
    </style>
</head>
<body class="text-white">
    <div class="max-w-4xl mx-auto px-5 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('rescue.animals') }}" class="text-[#0ea5e9] hover:underline flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Animals
            </a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column - Image -->
                <div>
                    @if($animal->image)
                        <img src="{{ asset('storage/' . $animal->image) }}"
                             alt="{{ $animal->name }}"
                             class="w-full h-96 object-cover rounded-lg">
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-gray-700 to-gray-800 rounded-lg flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex gap-3 mt-6 flex-wrap">
                        <a href="{{ route('rescue.vet.create', $animal->id) }}" class="flex-1 primary-btn text-center bg-purple-600 hover:bg-purple-700">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                            Vet Visit
                        </a>
                        <a href="{{ route('rescue.animals.edit', $animal->id) }}" class="flex-1 primary-btn text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Details
                        </a>
                        <form action="{{ route('rescue.animals.destroy', $animal->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this animal?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full outline-btn bg-red-500/20 border-red-500 text-red-300 hover:bg-red-500">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Details -->
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold text-white">{{ $animal->name }}</h1>
                            <p class="text-gray-400 text-sm mt-1">#SP-{{ str_pad($animal->id, 4, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <span class="status-badge status-{{ strtolower($animal->status) }}">
                            {{ ucfirst($animal->status) }}
                        </span>
                    </div>

                    <!-- Info Grid -->
                    <div class="space-y-4 mt-6">
                        <div class="border-b border-white/10 pb-3">
                            <div class="text-sm text-gray-400">Species</div>
                            <div class="text-lg text-white font-medium">{{ ucfirst($animal->species) }}</div>
                        </div>

                        <div class="border-b border-white/10 pb-3">
                            <div class="text-sm text-gray-400">Breed</div>
                            <div class="text-lg text-white font-medium">{{ $animal->breed ?: 'Unknown' }}</div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="border-b border-white/10 pb-3">
                                <div class="text-sm text-gray-400">Age</div>
                                <div class="text-lg text-white font-medium">{{ $animal->age }} years</div>
                            </div>

                            <div class="border-b border-white/10 pb-3">
                                <div class="text-sm text-gray-400">Gender</div>
                                <div class="text-lg text-white font-medium">{{ ucfirst($animal->gender ?? 'Unknown') }}</div>
                            </div>
                        </div>

                        <div class="border-b border-white/10 pb-3">
                            <div class="text-sm text-gray-400">Status</div>
                            <div class="text-lg text-white font-medium">{{ ucfirst($animal->status) }}</div>
                        </div>

                        <div class="border-b border-white/10 pb-3">
                            <div class="text-sm text-gray-400">Intake Date</div>
                            <div class="text-lg text-white font-medium">{{ $animal->created_at->format('F d, Y') }}</div>
                        </div>

                        <div class="border-b border-white/10 pb-3">
                            <div class="text-sm text-gray-400">Days in Shelter</div>
                            <div class="text-lg text-white font-medium">{{ floor(abs($animal->created_at->diffInDays(now()))) }} days</div>
                        </div>
                    </div>

                    <!-- Additional Info Card -->
                    <div class="mt-8 bg-white/5 p-6 rounded-lg border border-white/10">
                        <h3 class="text-lg font-bold text-white mb-4">Quick Stats</h3>
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div class="bg-blue-500/10 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-blue-300">{{ $animal->age }}</div>
                                <div class="text-xs text-gray-400">Years Old</div>
                            </div>
                            <div class="bg-green-500/10 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-green-300">{{ floor(abs($animal->created_at->diffInDays(now()))) }}</div>
                                <div class="text-xs text-gray-400">Days Here</div>
                            </div>
                        </div>
                    </div>

                    <!-- Health Records Section -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-white mb-4">Medical History</h3>
                        @if($animal->healthRecords && $animal->healthRecords->count() > 0)
                            <div class="space-y-4">
                                @foreach($animal->healthRecords as $record)
                                    <div class="bg-white/5 p-4 rounded-lg border border-white/10">
                                        <div class="flex justify-between items-start mb-2">
                                            <div>
                                                <h4 class="font-bold text-white">{{ $record->diagnosis }}</h4>
                                                <p class="text-xs text-gray-400">
                                                    Dr. {{ $record->veterinarian->name ?? 'Unknown' }} • {{ $record->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-300 mb-2">
                                            <span class="text-gray-500 font-semibold">Treatment:</span> {{ $record->treatment }}
                                        </div>
                                        @if($record->notes)
                                            <div class="text-sm text-gray-400 italic border-l-2 border-white/20 pl-2">
                                                "{{ $record->notes }}"
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white/5 p-4 rounded-lg border border-white/10 text-center text-gray-400">
                                <p>No medical records found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
