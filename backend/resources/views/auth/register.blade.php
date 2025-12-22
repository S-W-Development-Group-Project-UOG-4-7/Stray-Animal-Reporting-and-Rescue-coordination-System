<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="w-full p-2 border rounded">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full p-2 border rounded">
        <input type="text" name="nic" placeholder="NIC (123456789V or 200551500970)" value="{{ old('nic') }}" class="w-full p-2 border rounded">
        <input type="text" name="phone" placeholder="Phone (0771234567)" value="{{ old('phone') }}" class="w-full p-2 border rounded">
        <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" class="w-full p-2 border rounded">
        <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border rounded">

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
    </form>
</div>
</body>
</html>
