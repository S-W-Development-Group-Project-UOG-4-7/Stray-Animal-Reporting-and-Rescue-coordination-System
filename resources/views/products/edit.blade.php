<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style type="text/tailwindcss">
        .nav-link {
            @apply flex items-center gap-3 px-4 py-3 text-gray-300 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-300;
        }
        .nav-link.active {
            @apply bg-[#0ea5e9]/20 text-[#0ea5e9] border-l-4 border-[#0ea5e9];
        }
    </style>
</head>
<body class="bg-[#071331] min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#0b2447]/80 backdrop-blur-sm border-r border-white/10">
            <div class="p-6 border-b border-white/10">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#0ea5e9] rounded-xl flex items-center justify-center">
                        <i class="fas fa-paw text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">SafePaws</h1>
                        <p class="text-xs text-gray-400">Admin Dashboard</p>
                    </div>
                </a>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ url('/reports') }}" class="nav-link">
                    <i class="fas fa-flag"></i> Animal Reports
                </a>
                <a href="{{ url('/rescues') }}" class="nav-link">
                    <i class="fas fa-ambulance"></i> Rescue Operations
                </a>
                <a href="{{ url('/adoptions') }}" class="nav-link">
                    <i class="fas fa-home"></i> Adoptions
                </a>
                <a href="{{ url('/users_management') }}" class="nav-link">
                    <i class="fas fa-users-cog"></i> Users Management
                </a>
                <a href="{{ url('/veterinarians') }}" class="nav-link">
                    <i class="fas fa-stethoscope"></i> Vet Collaborators
                </a>
                <a href="{{ url('/products') }}" class="nav-link active">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="{{ url('/donations') }}" class="nav-link">
                    <i class="fas fa-donate"></i> Donations
                </a>
                <a href="{{ url('/ecommerce') }}" class="nav-link">
                    <i class="fas fa-shopping-cart"></i> E-commerce
                </a>
                <a href="{{ url('/analytics') }}" class="nav-link">
                    <i class="fas fa-chart-bar"></i> Analytics
                </a>
                <a href="{{ url('/settings') }}" class="nav-link">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Edit Product</h2>
                <a href="{{ route('products.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Products
                </a>
            </div>

            <div class="bg-[#0b2447] rounded-xl p-8">
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Name -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Product Name <span class="text-red-400">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Category <span class="text-red-400">*</span></label>
                            <input type="text" name="category" value="{{ old('category', $product->category) }}" placeholder="e.g., Food, Toys, Accessories" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('category') border-red-500 @enderror" required>
                            @error('category')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Price (Rs.) <span class="text-red-400">*</span></label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('price') border-red-500 @enderror" required>
                            @error('price')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock Quantity -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Stock Quantity <span class="text-red-400">*</span></label>
                            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('stock_quantity') border-red-500 @enderror" required>
                            @error('stock_quantity')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Status <span class="text-red-400">*</span></label>
                            <select name="status" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('status') border-red-500 @enderror" required>
                                <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Image -->
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Product Image</label>
                            @if($product->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                                    <p class="text-gray-400 text-xs mt-1">Current image (upload new to replace)</p>
                                </div>
                            @endif
                            <input type="file" name="image" accept="image/*" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('image') border-red-500 @enderror">
                            <p class="text-gray-400 text-xs mt-1">Max size: 2MB (JPG, PNG, GIF)</p>
                            @error('image')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label class="text-gray-300 text-sm mb-2 block">Description</label>
                        <textarea name="description" rows="4" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex space-x-4">
                        <button type="submit" class="bg-[#0ea5e9] text-white px-8 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Update Product
                        </button>
                        <a href="{{ route('products.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
