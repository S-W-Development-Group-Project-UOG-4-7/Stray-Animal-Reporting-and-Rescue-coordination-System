<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Reviews - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600"><i class="fas fa-paw"></i> SafePaws</a>
            <div class="space-x-4">
                <a href="/adoption" class="text-gray-600 hover:text-green-600">Adopt</a>
                <a href="/reviews" class="text-green-600 font-semibold">Reviews</a>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Adoption Reviews</h1>

        @if($reviews->count() > 0)
        <div class="space-y-4">
            @foreach($reviews as $review)
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $review->reviewer_name }}</h3>
                        <p class="text-sm text-gray-500">Adopted: {{ $review->animal->name ?? 'Unknown' }}</p>
                    </div>
                    <div class="text-yellow-400">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-gray-300' }}"></i>
                        @endfor
                    </div>
                </div>
                <p class="text-gray-600">{{ $review->comment }}</p>
                <p class="text-xs text-gray-400 mt-2">{{ $review->created_at->diffForHumans() }}</p>
            </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $reviews->links() }}</div>
        @else
        <p class="text-center text-gray-500 py-12">No reviews yet.</p>
        @endif
    </div>
</body>
</html>
