<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Animal - SafePaws</title>
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
            <a href="{{ route('rescue.animals') }}" class="text-[#0ea5e9] hover:underline">← Back to Animals</a>
        </div>

        <div class="bg-white/5 p-8 rounded-xl border border-white/10">
            <h1 class="text-3xl font-bold mb-2">Add New Animal</h1>
            <p class="text-gray-400 mb-6">Register a new animal in the shelter system</p>

            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rescue.animals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                           placeholder="e.g., Max, Luna" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 mb-2">Species *</label>
                        <select name="species" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                            <option value="">-- Select species --</option>
                            <option value="Dog" {{ old('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                            <option value="Cat" {{ old('species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                            <option value="Rabbit" {{ old('species') == 'Rabbit' ? 'selected' : '' }}>Rabbit</option>
                            <option value="Bird" {{ old('species') == 'Bird' ? 'selected' : '' }}>Bird</option>
                            <option value="Other" {{ old('species') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Breed</label>
                        <input type="text" name="breed" value="{{ old('breed') }}"
                               class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                               placeholder="e.g., Labrador, Persian">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 mb-2">Age (years) *</label>
                        <input type="number" name="age" value="{{ old('age') }}" min="0" step="0.5"
                               class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white"
                               placeholder="e.g., 2" required>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Gender</label>
                        <select name="gender" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white">
                            <option value="">-- Select gender --</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Unknown" {{ old('gender') == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Status *</label>
                    <select name="status" class="w-full bg-[#071331] border border-white/20 rounded-md px-4 py-2 text-white" required>
                        <option value="">-- Select status --</option>
                        <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Rescued" {{ old('status') == 'Rescued' ? 'selected' : '' }}>Rescued</option>
                        <option value="Adopted" {{ old('status') == 'Adopted' ? 'selected' : '' }}>Adopted</option>
                        <option value="In Treatment" {{ old('status') == 'In Treatment' ? 'selected' : '' }}>In Treatment</option>
                        <option value="Quarantine" {{ old('status') == 'Quarantine' ? 'selected' : '' }}>Quarantine</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-300 mb-2">Animal Photo</label>
                    <div class="border-2 border-dashed border-white/20 rounded-md p-6 text-center">
                        <input type="file" name="image" id="imageInput" accept="image/*"
                               class="hidden" onchange="previewImage(event)">
                        <label for="imageInput" class="cursor-pointer">
                            <div id="imagePreview" class="mb-4">
                                <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="text-gray-300">
                                <span class="text-[#0ea5e9] font-medium">Click to upload</span> or drag and drop
                            </div>
                            <div class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</div>
                        </label>
                    </div>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="primary-btn">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Add Animal
                    </button>
                    <a href="{{ route('rescue.animals') }}" class="outline-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <img src="${e.target.result}" class="max-w-full h-48 mx-auto rounded-lg object-cover" alt="Preview">
                    `;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
