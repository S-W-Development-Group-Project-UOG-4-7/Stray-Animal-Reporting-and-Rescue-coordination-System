<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Requests - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600"><i class="fas fa-paw"></i> SafePaws</a>
            <div class="space-x-4">
                <a href="/adoption" class="text-gray-600 hover:text-green-600">Adopt</a>
                <a href="/my-requests" class="text-green-600 font-semibold">My Requests</a>
                <a href="/reviews" class="text-gray-600 hover:text-green-600">Reviews</a>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-6">{{ session('error') }}</div>
        @endif

        <!-- Adoption Requests -->
        <h1 class="text-2xl font-bold text-gray-800 mb-4">My Adoption Requests</h1>
        @if($adoptionRequests->count() > 0)
        <div class="bg-white rounded-xl shadow mb-8 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">Pet</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Submitted</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($adoptionRequests as $req)
                    <tr>
                        <td class="px-4 py-3">{{ $req->animal->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $req->full_name }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs {{ $req->status == 'Approved' ? 'bg-green-100 text-green-800' : ($req->status == 'Rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">{{ $req->status }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $req->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 space-x-2">
                            @if($req->status === 'Pending')
                                <a href="{{ route('adoption-request.edit', $req->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                                <form method="POST" action="{{ route('adoption-request.destroy', $req->id) }}" class="inline" onsubmit="return confirm('Delete this request?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline text-sm">Delete</button>
                                </form>
                            @elseif($req->status === 'Approved' && !$req->review)
                                <a href="{{ route('reviews.create', $req->id) }}" class="text-green-600 hover:underline text-sm">Write Review</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-gray-500 mb-8">No adoption requests yet. <a href="/adoption" class="text-green-600 hover:underline">Browse pets</a></p>
        @endif

        <!-- Role Requests -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">My Role Applications</h2>
        @if($roleRequests->count() > 0)
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($roleRequests as $rr)
                    <tr>
                        <td class="px-4 py-3">{{ $rr->full_name }}</td>
                        <td class="px-4 py-3">{{ $rr->role_type }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs {{ $rr->status == 'Approved' ? 'bg-green-100 text-green-800' : ($rr->status == 'Rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">{{ $rr->status }}</span>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            @if($rr->status === 'Pending')
                                <a href="{{ route('role-request.edit', $rr->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                                <form method="POST" action="{{ route('role-request.destroy', $rr->id) }}" class="inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline text-sm">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-gray-500">No role applications. <a href="{{ route('role-request.create') }}" class="text-green-600 hover:underline">Apply for a role</a></p>
        @endif
    </div>
</body>
</html>
