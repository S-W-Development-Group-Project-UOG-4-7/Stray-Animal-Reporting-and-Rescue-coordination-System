<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $animal->name }} - SafePaws Adoption</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600"><i class="fas fa-paw"></i> SafePaws</a>
            <a href="/adoption" class="text-green-600 hover:underline"><i class="fas fa-arrow-left mr-2"></i>Back to Listings</a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ $animal->image_url ?? asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="w-full h-72 object-cover">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $animal->name }}</h1>
                <div class="flex gap-3 mb-4">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $animal->type ?? $animal->species }}</span>
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">{{ $animal->gender ?? 'Unknown' }}</span>
                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm">{{ $animal->age }} years</span>
                    @if($animal->breed)<span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $animal->breed }}</span>@endif
                </div>
                <p class="text-gray-600 mb-6">{{ $animal->description ?? 'A wonderful pet looking for a forever home!' }}</p>

                <h2 class="text-xl font-semibold text-gray-800 mb-4 border-t pt-6">Adoption Application</h2>
                <form method="POST" action="{{ route('adoption.apply', $animal) }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                            <input type="text" name="full_name" required class="w-full border rounded-lg px-4 py-2" value="{{ old('full_name') }}">
                            @error('full_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full border rounded-lg px-4 py-2" value="{{ old('email') }}">
                            @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="text" name="phone" required placeholder="07XXXXXXXX" class="w-full border rounded-lg px-4 py-2" value="{{ old('phone') }}">
                            @error('phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NIC *</label>
                            <input type="text" name="nic" required class="w-full border rounded-lg px-4 py-2" value="{{ old('nic') }}">
                            @error('nic')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
                            <input type="text" name="address" required class="w-full border rounded-lg px-4 py-2" value="{{ old('address') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Housing Type *</label>
                            <select name="housing_type" required class="w-full border rounded-lg px-4 py-2">
                                <option value="">Select...</option>
                                <option value="House">House</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Condo">Condo</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-2 mb-4">
                        <label class="flex items-center gap-2"><input type="checkbox" name="has_fenced_yard" class="rounded"> I have a fenced yard</label>
                        <label class="flex items-center gap-2"><input type="checkbox" name="has_other_pets" class="rounded"> I have other pets</label>
                        <label class="flex items-center gap-2"><input type="checkbox" name="has_children" class="rounded"> I have children at home</label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Why do you want to adopt this pet? *</label>
                        <textarea name="reason" required rows="3" class="w-full border rounded-lg px-4 py-2" minlength="10">{{ old('reason') }}</textarea>
                        @error('reason')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="space-y-2 mb-6">
                        <label class="flex items-center gap-2"><input type="checkbox" name="age_confirmation" required class="rounded"> I confirm I am over 18 years old</label>
                        <label class="flex items-center gap-2"><input type="checkbox" name="terms_confirmation" required class="rounded"> I agree to the terms and conditions</label>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Adoption Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
