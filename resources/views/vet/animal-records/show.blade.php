<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Record - Vet Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-700 text-white py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-xl font-bold">SafePaws Vet Portal</span>
            <a href="{{ route('vet.animal-records.index') }}" class="hover:underline">Back to Records</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto py-8 px-4">
        <div class="bg-white rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Health Record Details</h1>
            <div class="space-y-4">
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Animal:</span>
                    <span class="font-medium">{{ $record->animal->name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Veterinarian:</span>
                    <span class="font-medium">Dr. {{ $record->veterinarian->name ?? 'N/A' }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block mb-1">Diagnosis:</span>
                    <p class="text-gray-700 bg-gray-50 p-3 rounded">{{ $record->diagnosis }}</p>
                </div>
                <div>
                    <span class="text-gray-500 block mb-1">Treatment:</span>
                    <p class="text-gray-700 bg-gray-50 p-3 rounded">{{ $record->treatment }}</p>
                </div>
                @if($record->medications)
                <div>
                    <span class="text-gray-500 block mb-1">Medications:</span>
                    <p class="text-gray-700 bg-gray-50 p-3 rounded">{{ $record->medications }}</p>
                </div>
                @endif
                @if($record->follow_up_date)
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Follow-up Date:</span>
                    <span class="font-medium text-teal-600">{{ $record->follow_up_date->format('M d, Y') }}</span>
                </div>
                @endif
                @if($record->notes)
                <div>
                    <span class="text-gray-500 block mb-1">Notes:</span>
                    <p class="text-gray-700">{{ $record->notes }}</p>
                </div>
                @endif
                <p class="text-xs text-gray-400">Created: {{ $record->created_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>
    </div>
</body>
</html>
