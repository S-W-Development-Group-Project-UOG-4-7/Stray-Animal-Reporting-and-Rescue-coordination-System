<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Vet Visit - SafePaws</title>
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
    </style>
</head>
<body class="text-white">
    <div class="max-w-2xl mx-auto px-5 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('rescue.animals.show', $animal->id) }}" class="text-[#0ea5e9] hover:underline">← Back to Animal Profile</a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <h1 class="text-3xl font-bold mb-2">Schedule Vet Appointment</h1>
            <p class="text-gray-400 mb-6">Book a vet visit for {{ $animal->name }} (#SP-{{ str_pad($animal->id, 4, '0', STR_PAD_LEFT) }})</p>

            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rescue.vet.store') }}" method="POST">
                @csrf
                <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Select Veterinarian *</label>
                    <select name="veterinarian_id" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                        <option value="">-- Choose a Vet --</option>
                        @foreach($vets as $vet)
                            <option value="{{ $vet->id }}">{{ $vet->name }} ({{ $vet->clinic }}) - {{ $vet->specialization }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 mb-2">Date & Time *</label>
                        <input type="datetime-local" name="appointment_date" value="{{ old('appointment_date') }}"
                               class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Appointment Type *</label>
                        <select name="type" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                            <option value="Checkup">General Checkup</option>
                            <option value="Vaccination">Vaccination</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Emergency">Emergency</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-300 mb-2">Notes</label>
                    <textarea name="notes" rows="4" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" placeholder="Describe symptoms or reason for visit...">{{ old('notes') }}</textarea>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="primary-btn">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Schedule Appointment
                    </button>
                    <a href="{{ route('rescue.animals.show', $animal->id) }}" class="outline-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
