<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Health Records - Vet Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-700 text-white py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="text-xl font-bold"><i class="fas fa-stethoscope mr-2"></i>SafePaws Vet Portal</span>
            <div class="space-x-4">
                <a href="{{ route('vet.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('vet.appointments.index') }}" class="hover:underline">Appointments</a>
                <a href="{{ route('vet.animal-records.index') }}" class="hover:underline font-semibold">Health Records</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Animal Health Records</h1>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">Animal</th>
                        <th class="px-4 py-3">Diagnosis</th>
                        <th class="px-4 py-3">Treatment</th>
                        <th class="px-4 py-3">Veterinarian</th>
                        <th class="px-4 py-3">Follow-up</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($records as $record)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $record->animal->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ Str::limit($record->diagnosis, 40) }}</td>
                        <td class="px-4 py-3">{{ Str::limit($record->treatment, 40) }}</td>
                        <td class="px-4 py-3">Dr. {{ $record->veterinarian->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $record->follow_up_date ? $record->follow_up_date->format('M d, Y') : '-' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('vet.animal-records.show', $record->id) }}" class="text-teal-600 hover:underline text-sm">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">No records found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $records->links() }}</div>
    </div>
</body>
</html>
