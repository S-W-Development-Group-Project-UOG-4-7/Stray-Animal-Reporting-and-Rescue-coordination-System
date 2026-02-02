<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600"><i class="fas fa-paw"></i> SafePaws</a>
            <div class="space-x-4">
                <a href="/" class="text-gray-600 hover:text-green-600">Home</a>
                <a href="/adoption" class="text-green-600 font-semibold">Adopt</a>
                <a href="/report-animal" class="text-gray-600 hover:text-green-600">Report</a>
                <a href="/donate" class="text-gray-600 hover:text-green-600">Donate</a>
                <a href="/my-requests" class="text-gray-600 hover:text-green-600">My Requests</a>
                <a href="/login" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Login</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Find Your New Best Friend</h1>
        <p class="text-gray-500 mb-6">Browse adoptable pets and give them a loving home</p>

        <!-- Search & Filters -->
        <form method="GET" action="{{ route('adoption.index') }}" class="bg-white rounded-xl shadow p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or breed..." class="border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <select name="type" class="border rounded-lg px-4 py-2">
                    <option value="">All Types</option>
                    <option value="Dog" {{ request('type') == 'Dog' ? 'selected' : '' }}>Dog</option>
                    <option value="Cat" {{ request('type') == 'Cat' ? 'selected' : '' }}>Cat</option>
                </select>
                <select name="gender" class="border rounded-lg px-4 py-2">
                    <option value="">All Genders</option>
                    <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                <select name="sort" class="border rounded-lg px-4 py-2">
                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest First</option>
                    <option value="age_asc" {{ request('sort') == 'age_asc' ? 'selected' : '' }}>Youngest First</option>
                    <option value="age_desc" {{ request('sort') == 'age_desc' ? 'selected' : '' }}>Oldest First</option>
                </select>
                <button type="submit" class="bg-green-600 text-white rounded-lg px-6 py-2 hover:bg-green-700">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>
        </form>

        <!-- Animals Grid -->
        @if($animals->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($animals as $animal)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ $animal->image_url ?? asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="w-full h-48 object-cover">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $animal->name }}</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $animal->status }}</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-3">
                        {{ $animal->breed ?? $animal->type }} &bull; {{ $animal->gender ?? 'Unknown' }} &bull; {{ $animal->age }} {{ $animal->age == 1 ? 'year' : 'years' }} old
                    </p>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($animal->description, 80) }}</p>
                    <a href="{{ route('adoption.show', $animal) }}" class="block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                        View Details & Apply
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">{{ $animals->links() }}</div>
        @else
        <div class="text-center py-16 bg-white rounded-xl shadow">
            <i class="fas fa-paw text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl text-gray-500">No adoptable pets found</h3>
            <p class="text-gray-400 mt-2">Try adjusting your search filters</p>
        </div>
        @endif
    </div>
</body>
</html>
