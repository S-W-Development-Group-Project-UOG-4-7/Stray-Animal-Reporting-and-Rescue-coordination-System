<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role Application - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600">SafePaws</a>
            <a href="/my-requests" class="text-green-600 hover:underline">Back</a>
        </div>
    </nav>

    <div class="max-w-lg mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Role Application</h1>
        <form method="POST" action="{{ route('role-request.update', $roleRequest->id) }}" class="bg-white rounded-xl shadow p-6">
            @csrf @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $roleRequest->full_name) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $roleRequest->email) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $roleRequest->phone) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">NIC</label>
                    <input type="text" name="nic" value="{{ old('nic', $roleRequest->nic) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address', $roleRequest->address) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <p class="text-sm text-gray-400">Role: {{ $roleRequest->role_type }} (cannot be changed)</p>
            </div>
            <button type="submit" class="w-full mt-6 bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">Update Application</button>
        </form>
    </div>
</body>
</html>
