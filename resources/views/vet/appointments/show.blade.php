<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details - Vet Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-700 text-white py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-xl font-bold">SafePaws Vet Portal</span>
            <a href="{{ route('vet.appointments.index') }}" class="hover:underline">Back to Appointments</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto py-8 px-4">
        <div class="bg-white rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Appointment Details</h1>
            <div class="space-y-4">
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Animal:</span>
                    <span class="font-medium">{{ $appointment->animal->name ?? 'N/A' }} ({{ $appointment->animal->species ?? $appointment->animal->type ?? '' }})</span>
                </div>
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Veterinarian:</span>
                    <span class="font-medium">Dr. {{ $appointment->veterinarian->name ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Clinic:</span>
                    <span class="font-medium">{{ $appointment->veterinarian->clinic ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Type:</span>
                    <span class="font-medium">{{ ucfirst($appointment->type) }}</span>
                </div>
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Date:</span>
                    <span class="font-medium">{{ $appointment->appointment_date->format('M d, Y h:i A') }}</span>
                </div>
                <div class="flex justify-between border-b pb-3">
                    <span class="text-gray-500">Status:</span>
                    <span class="px-2 py-1 rounded-full text-xs {{ $appointment->status == 'completed' ? 'bg-green-100 text-green-800' : ($appointment->status == 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">{{ ucfirst($appointment->status) }}</span>
                </div>
                @if($appointment->notes)
                <div>
                    <span class="text-gray-500 block mb-1">Notes:</span>
                    <p class="text-gray-700">{{ $appointment->notes }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
