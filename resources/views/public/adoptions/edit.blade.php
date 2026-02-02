<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Adoption Request - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600">SafePaws</a>
            <a href="/my-requests" class="text-green-600 hover:underline">Back to My Requests</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Adoption Request</h1>

        <form method="POST" action="{{ route('adoption-request.update', $request->id) }}" class="bg-white rounded-xl shadow p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $request->full_name) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $request->phone) }}" class="w-full border rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Housing Type</label>
                    <select name="housing_type" required class="w-full border rounded-lg px-4 py-2">
                        <option value="House" {{ $request->housing_type == 'House' ? 'selected' : '' }}>House</option>
                        <option value="Apartment" {{ $request->housing_type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="Condo" {{ $request->housing_type == 'Condo' ? 'selected' : '' }}>Condo</option>
                        <option value="Other" {{ $request->housing_type == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address', $request->address) }}" required class="w-full border rounded-lg px-4 py-2">
                </div>
            </div>
            <div class="space-y-2 mb-4">
                <label class="flex items-center gap-2"><input type="checkbox" name="has_fenced_yard" {{ $request->has_fenced_yard ? 'checked' : '' }} class="rounded"> Fenced yard</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="has_other_pets" {{ $request->has_other_pets ? 'checked' : '' }} class="rounded"> Other pets</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="has_children" {{ $request->has_children ? 'checked' : '' }} class="rounded"> Children</label>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Reason</label>
                <textarea name="reason" required rows="3" class="w-full border rounded-lg px-4 py-2" minlength="10">{{ old('reason', $request->reason) }}</textarea>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">Update Request</button>
        </form>
    </div>
</body>
</html>
