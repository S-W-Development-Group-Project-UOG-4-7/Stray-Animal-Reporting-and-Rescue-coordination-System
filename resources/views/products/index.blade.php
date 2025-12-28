<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - SafePaws</title>
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
        <div class="flex-1 overflow-auto">
            <header class="sticky top-0 bg-[#0b2447]/95 backdrop-blur-sm border-b border-white/10 px-6 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Products Management</h2>
                        <p class="text-gray-400 text-sm">Manage your product catalog</p>
                    </div>
                    <a href="{{ route('products.create') }}" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        Add Product
                    </a>
                </div>
            </header>

            <main class="p-6">
                @if(session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-6">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
                @endif

                <!-- Filters -->
                <div class="bg-[#0b2447] rounded-xl p-6 mb-6">
                    <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                        </div>
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Category</label>
                            <select name="category" class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="text-gray-300 text-sm mb-2 block">Status</label>
                            <select name="status" class="w-full bg-[#071331] text-white px-4 py-2 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                                <option value="">All Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-[#0ea5e9] text-white px-4 py-2 rounded-lg hover:bg-[#0284c7] transition">
                                <i class="fas fa-search mr-2"></i>Filter
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Products Table -->
                <div class="bg-[#0b2447] rounded-xl overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-[#1e3a5f]">
                            <tr>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Image</th>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Name</th>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Category</th>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Price</th>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Stock</th>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Status</th>
                                <th class="px-6 py-4 text-left text-gray-300 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse($products as $product)
                            <tr class="hover:bg-[#1e3a5f] transition">
                                <td class="px-6 py-4">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-16 h-16 bg-gray-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-white font-medium">{{ $product->name }}</td>
                                <td class="px-6 py-4 text-gray-300">{{ $product->category }}</td>
                                <td class="px-6 py-4 text-[#0ea5e9] font-semibold">Rs. {{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4 text-gray-300">{{ $product->stock_quantity }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs {{ $product->status == 'active' ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('products.edit', $product) }}" class="text-[#0ea5e9] hover:text-[#0284c7]">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-400">
                                    <i class="fas fa-box-open text-4xl mb-3"></i>
                                    <p>No products found</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>
