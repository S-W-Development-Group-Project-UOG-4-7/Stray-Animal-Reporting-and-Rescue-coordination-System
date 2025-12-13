<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-bold">Admin Panel</h1>
    </header>

    <!-- Main content -->
    <main class="flex-1 p-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center p-4">
        &copy; {{ date('Y') }} My Admin Panel
    </footer>

</body>
</html>
