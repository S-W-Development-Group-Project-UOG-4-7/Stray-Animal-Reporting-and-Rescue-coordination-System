<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for a Role - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600">SafePaws</a>
            <a href="/my-requests" class="text-green-600 hover:underline">My Requests</a>
        </div>
    </nav>

    <div class="max-w-lg mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Apply for a Role</h1>
        <form method="POST" action="{{ route('role-request.store') }}" class="bg-white rounded-xl shadow p-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                    <input type="text" name="full_name" required class="w-full border rounded-lg px-4 py-2" value="{{ old('full_name') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" required class="w-full border rounded-lg px-4 py-2" value="{{ old('email') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                    <input type="text" name="phone" required class="w-full border rounded-lg px-4 py-2" value="{{ old('phone') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">NIC *</label>
                    <input type="text" name="nic" required class="w-full border rounded-lg px-4 py-2" value="{{ old('nic') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
                    <input type="text" name="address" required class="w-full border rounded-lg px-4 py-2" value="{{ old('address') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username *</label>
                    <input type="text" name="username" required class="w-full border rounded-lg px-4 py-2" value="{{ old('username') }}">
                    @error('username')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                    <input type="password" name="password" required minlength="6" class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role *</label>
                    <select name="role_type" required class="w-full border rounded-lg px-4 py-2" id="roleType">
                        <option value="">Select role...</option>
                        <option value="Volunteer">Volunteer</option>
                        <option value="Veterinarian">Veterinarian</option>
                        <option value="Rescue Team">Rescue Team</option>
                    </select>
                </div>
                <div id="vetIdField" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Veterinarian ID *</label>
                    <input type="text" name="vet_id" class="w-full border rounded-lg px-4 py-2" value="{{ old('vet_id') }}">
                </div>
            </div>
            <button type="submit" class="w-full mt-6 bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">Submit Application</button>
        </form>
    </div>
    <script>
        document.getElementById('roleType').addEventListener('change', function() {
            document.getElementById('vetIdField').classList.toggle('hidden', this.value !== 'Veterinarian');
        });
    </script>
</body>
</html>
