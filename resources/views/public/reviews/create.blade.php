<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a Review - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600">SafePaws</a>
            <a href="/reviews" class="text-green-600 hover:underline">Back to Reviews</a>
        </div>
    </nav>

    <div class="max-w-lg mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Write a Review</h1>
        <p class="text-gray-500 mb-6">Share your experience adopting {{ $adoptionRequest->animal->name ?? 'this pet' }}</p>

        <form method="POST" action="{{ route('reviews.store', $adoptionRequest->id) }}" class="bg-white rounded-xl shadow p-6">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                <select name="rating" required class="w-full border rounded-lg px-4 py-2">
                    <option value="">Select rating...</option>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Very Good</option>
                    <option value="3">3 - Good</option>
                    <option value="2">2 - Fair</option>
                    <option value="1">1 - Poor</option>
                </select>
                @error('rating')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                <textarea name="comment" required rows="4" minlength="5" maxlength="500" class="w-full border rounded-lg px-4 py-2" placeholder="Tell us about your adoption experience...">{{ old('comment') }}</textarea>
                @error('comment')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">Submit Review</button>
        </form>
    </div>
</body>
</html>
