@extends('admin.layouts.app')

@section('title', 'Products Management')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-bold text-white">Products Management</h2>
        <p class="text-gray-400">Manage your product catalog</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="bg-[#0ea5e9] text-white px-6 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center gap-2">
        <i class="fas fa-plus"></i>
        Add Product
    </a>
</div>

<!-- Filters -->
<div class="bg-[#0b2447] rounded-xl p-6 mb-6">
    <form method="GET" action="{{ route('admin.products.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
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
        <thead class="bg-[#071331]">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Image</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Name</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Category</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Price</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Stock</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($products as $product)
            <tr class="hover:bg-white/5 transition">
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
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->status == 'active' ? 'bg-green-500/20 text-green-300' : 'bg-red-500/20 text-red-300' }}">
                        {{ ucfirst($product->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-[#0ea5e9] hover:text-[#0284c7]">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                    <i class="fas fa-box-open text-4xl mb-3 block"></i>
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
@endsection
