<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Health Record - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-3xl mx-auto py-8 px-4">
        <div class="mb-6">
            <a href="{{ route('vet.animal-records.index') }}" class="text-teal-600 hover:underline">← Back to Records</a>
        </div>

        <div class="bg-white rounded-xl shadow p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Health Record</h1>

            @if($errors->any())
                <div class="bg-red-50 text-red-700 p-4 rounded mb-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('vet.animal-records.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Patient (Animal)</label>
                    <select name="animal_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 p-2 border" required>
                        <option value="">Select Animal</option>
                        @foreach($animals as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->name }} ({{ $animal->species }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Diagnosis</label>
                    <input type="text" name="diagnosis" class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 p-2 border" placeholder="e.g. Parvovirus, Broken Leg" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Treatment / Medication</label>
                    <textarea name="treatment" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 p-2 border" placeholder="Prescribed medication and care instructions..." required></textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Clinical Notes</label>
                    <textarea name="notes" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 p-2 border" placeholder="Detailed observations..."></textarea>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('vet.animal-records.index') }}" class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Save Record</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
