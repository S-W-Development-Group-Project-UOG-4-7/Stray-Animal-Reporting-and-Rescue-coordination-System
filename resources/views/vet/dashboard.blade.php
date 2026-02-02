<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Portal - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-700 text-white py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-xl font-bold"><i class="fas fa-stethoscope mr-2"></i>SafePaws Vet Portal</span>
            <div class="space-x-4">
                <a href="{{ route('vet.dashboard') }}" class="hover:underline font-semibold">Dashboard</a>
                <a href="{{ route('vet.appointments.index') }}" class="hover:underline">Appointments</a>
                <a href="{{ route('vet.animal-records.index') }}" class="hover:underline">Health Records</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Veterinarian Dashboard</h1>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-teal-600">{{ $stats['total_appointments'] }}</p>
                <p class="text-sm text-gray-500">Total Appointments</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-blue-600">{{ $stats['upcoming'] }}</p>
                <p class="text-sm text-gray-500">Upcoming</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-green-600">{{ $stats['completed'] }}</p>
                <p class="text-sm text-gray-500">Completed</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-purple-600">{{ $stats['total_records'] }}</p>
                <p class="text-sm text-gray-500">Health Records</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <p class="text-3xl font-bold text-orange-600">{{ $stats['animals_in_care'] }}</p>
                <p class="text-sm text-gray-500">In Care</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Upcoming Appointments -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4"><i class="fas fa-calendar-check mr-2 text-teal-600"></i>Upcoming Appointments</h2>
                @forelse($upcomingAppointments as $apt)
                <div class="border-b py-3 last:border-0">
                    <div class="flex justify-between">
                        <div>
                            <p class="font-medium">{{ $apt->animal->name ?? 'Unknown' }}</p>
                            <p class="text-sm text-gray-500">{{ ucfirst($apt->type) }} - Dr. {{ $apt->veterinarian->name ?? 'N/A' }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-teal-600">{{ $apt->appointment_date->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-400">{{ $apt->appointment_date->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-400 text-center py-4">No upcoming appointments</p>
                @endforelse
            </div>

            <!-- Recent Health Records -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4"><i class="fas fa-notes-medical mr-2 text-teal-600"></i>Recent Health Records</h2>
                @forelse($recentRecords as $record)
                <div class="border-b py-3 last:border-0">
                    <p class="font-medium">{{ $record->animal->name ?? 'Unknown' }}</p>
                    <p class="text-sm text-gray-500">{{ $record->diagnosis }}</p>
                    <p class="text-xs text-gray-400">{{ $record->created_at->diffForHumans() }}</p>
                </div>
                @empty
                <p class="text-gray-400 text-center py-4">No health records yet</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
