<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - SafePaws</title>
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
                <a href="{{ url('/products') }}" class="nav-link">
                    <i class="fas fa-box"></i> Products
                </a>
                <a href="{{ url('/donations') }}" class="nav-link">
                    <i class="fas fa-donate"></i> Donations
                </a>
                <a href="{{ url('/ecommerce') }}" class="nav-link active">
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
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-2">SafePaws Shop</h2>
                <p class="text-gray-400">Browse our collection of pet products and supplies</p>
            </div>

            <!-- Filters -->
            <div class="bg-[#0b2447] rounded-xl p-6 mb-8">
                <form method="GET" action="{{ route('ecommerce.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <label class="text-gray-300 text-sm mb-2 block">Search Products</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search for products..." class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                    </div>
                    <div>
                        <label class="text-gray-300 text-sm mb-2 block">Category</label>
                        <select name="category" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <button type="submit" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @forelse($products as $product)
                <div class="bg-[#0b2447] rounded-xl overflow-hidden hover:shadow-xl hover:shadow-[#0ea5e9]/20 transition-all duration-300">
                    <!-- Product Image -->
                    <div class="relative h-48 bg-gray-700">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas fa-box text-gray-500 text-5xl"></i>
                            </div>
                        @endif
                        @if($product->stock_quantity == 0)
                            <div class="absolute top-0 right-0 bg-red-500 text-white px-3 py-1 text-xs font-semibold">
                                OUT OF STOCK
                            </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="p-4">
                        <div class="mb-2">
                            <span class="text-xs text-gray-400 bg-gray-700 px-2 py-1 rounded">{{ $product->category }}</span>
                        </div>
                        <h3 class="text-white font-semibold text-lg mb-2 truncate">{{ $product->name }}</h3>
                        <p class="text-gray-400 text-sm mb-3 line-clamp-2">{{ $product->description ?? 'No description available' }}</p>

                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-[#0ea5e9] font-bold text-xl">Rs. {{ number_format($product->price, 2) }}</div>
                                <div class="text-gray-400 text-xs">Stock: {{ $product->stock_quantity }}</div>
                            </div>
                            <button class="bg-[#0ea5e9] text-white px-4 py-2 rounded-lg hover:bg-[#0284c7] transition {{ $product->stock_quantity == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full">
                    <div class="bg-[#0b2447] rounded-xl p-12 text-center">
                        <i class="fas fa-box-open text-6xl text-gray-600 mb-4"></i>
                        <h3 class="text-white text-xl font-semibold mb-2">No Products Found</h3>
                        <p class="text-gray-400">Try adjusting your search or filters</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </main>
    </div>
</body>
</html>
