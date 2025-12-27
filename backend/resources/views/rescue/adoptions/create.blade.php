<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Adoption Application - SafePaws</title>
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
    <div class="max-w-3xl mx-auto px-5 py-8">
        <div class="mb-6">
            <a href="{{ route('rescue.adoptions') }}" class="text-[#0ea5e9] hover:underline">← Back to Adoptions</a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <h1 class="text-3xl font-bold mb-2">Create Adoption Application</h1>
            <p class="text-gray-400 mb-6">Record a new adoption application for an animal</p>

            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rescue.adoptions.store') }}" method="POST">
                @csrf

                <h2 class="text-xl font-bold mb-4 mt-6">Animal Information</h2>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Select Animal *</label>
                    <select name="animal_id" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                        <option value="">-- Select an animal --</option>
                        @foreach($availableAnimals as $animal)
                            <option value="{{ $animal->id }}" {{ old('animal_id') == $animal->id ? 'selected' : '' }}>
                                #SP{{ str_pad($animal->id, 3, '0', STR_PAD_LEFT) }} - {{ $animal->name }} ({{ $animal->species }}, {{ $animal->breed }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <h2 class="text-xl font-bold mb-4 mt-6">Applicant Information</h2>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Full Name *</label>
                    <input type="text" name="applicant_name" value="{{ old('applicant_name') }}"
                           class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                           placeholder="John Doe" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 mb-2">Email *</label>
                        <input type="email" name="applicant_email" value="{{ old('applicant_email') }}"
                               class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                               placeholder="john@example.com" required>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Phone Number *</label>
                        <input type="tel" name="applicant_phone" value="{{ old('applicant_phone') }}"
                               class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                               placeholder="0771234567" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Address *</label>
                    <textarea name="applicant_address" rows="2"
                              class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                              placeholder="123 Main Street, Colombo" required>{{ old('applicant_address') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Applicant Type *</label>
                    <select name="applicant_type" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                        <option value="">-- Select type --</option>
                        <option value="Individual" {{ old('applicant_type') == 'Individual' ? 'selected' : '' }}>Individual</option>
                        <option value="Family" {{ old('applicant_type') == 'Family' ? 'selected' : '' }}>Family</option>
                        <option value="Couple" {{ old('applicant_type') == 'Couple' ? 'selected' : '' }}>Couple</option>
                        <option value="Student" {{ old('applicant_type') == 'Student' ? 'selected' : '' }}>Student</option>
                        <option value="Retired" {{ old('applicant_type') == 'Retired' ? 'selected' : '' }}>Retired</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Living Situation Details</label>
                    <textarea name="applicant_details" rows="2"
                              class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                              placeholder="e.g., Family of 4, House with large yard">{{ old('applicant_details') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Provide details about living arrangement, home type, family size, etc.</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-300 mb-2">Additional Notes</label>
                    <textarea name="notes" rows="3"
                              class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                              placeholder="Any additional information...">{{ old('notes') }}</textarea>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="primary-btn">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Application
                    </button>
                    <a href="{{ route('rescue.adoptions') }}" class="outline-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
