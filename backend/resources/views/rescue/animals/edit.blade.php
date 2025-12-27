<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Animal - SafePaws</title>
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
        <div class="mb-6">
            <a href="{{ route('rescue.animals') }}" class="text-[#0ea5e9] hover:underline">← Back to Animals</a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <h1 class="text-3xl font-bold mb-6">Edit Animal</h1>

            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rescue.animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $animal->name) }}"
                           class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Species</label>
                    <input type="text" name="species" value="{{ old('species', $animal->species) }}"
                           class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Breed</label>
                    <input type="text" name="breed" value="{{ old('breed', $animal->breed) }}"
                           class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 mb-2">Age (years)</label>
                        <input type="number" name="age" value="{{ old('age', $animal->age) }}" min="0" step="0.5"
                               class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Gender</label>
                        <select name="gender" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white">
                            <option value="">-- Select gender --</option>
                            <option value="Male" {{ old('gender', $animal->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $animal->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Unknown" {{ old('gender', $animal->gender) == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Status</label>
                    <select name="status" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                        <option value="Available" {{ $animal->status == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Rescued" {{ $animal->status == 'Rescued' ? 'selected' : '' }}>Rescued</option>
                        <option value="Adopted" {{ $animal->status == 'Adopted' ? 'selected' : '' }}>Adopted</option>
                        <option value="In Treatment" {{ $animal->status == 'In Treatment' ? 'selected' : '' }}>In Treatment</option>
                        <option value="Quarantine" {{ $animal->status == 'Quarantine' ? 'selected' : '' }}>Quarantine</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Animal Photo</label>
                    @if($animal->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-xs text-gray-400 mt-1">Current photo</p>
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                           class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white">
                    <p class="text-xs text-gray-400 mt-1">Max size: 2MB. Formats: JPG, PNG, GIF</p>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="primary-btn">Update Animal</button>
                    <a href="{{ route('rescue.animals') }}" class="outline-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
