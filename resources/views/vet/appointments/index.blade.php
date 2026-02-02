<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Vet Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-700 text-white py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-xl font-bold"><i class="fas fa-stethoscope mr-2"></i>SafePaws Vet Portal</span>
            <div class="space-x-4">
                <a href="{{ route('vet.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('vet.appointments.index') }}" class="hover:underline font-semibold">Appointments</a>
                <a href="{{ route('vet.animal-records.index') }}" class="hover:underline">Health Records</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
        @endif

        <h1 class="text-2xl font-bold text-gray-800 mb-6">All Appointments</h1>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">Animal</th>
                        <th class="px-4 py-3">Veterinarian</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($appointments as $apt)
                    <tr>
                        <td class="px-4 py-3">{{ $apt->animal->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">Dr. {{ $apt->veterinarian->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ ucfirst($apt->type) }}</td>
                        <td class="px-4 py-3">{{ $apt->appointment_date->format('M d, Y h:i A') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs {{ $apt->status == 'completed' ? 'bg-green-100 text-green-800' : ($apt->status == 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">{{ ucfirst($apt->status) }}</span>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('vet.appointments.show', $apt->id) }}" class="text-teal-600 hover:underline text-sm">View</a>
                            @if($apt->status === 'scheduled')
                            <form method="POST" action="{{ route('vet.appointments.updateStatus', $apt->id) }}" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="completed">
                                <button class="text-green-600 hover:underline text-sm">Complete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">No appointments found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $appointments->links() }}</div>
    </div>
</body>
</html>
