@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-white">Edit Product</h2>
    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Products
    </a>
</div>

<div class="bg-[#0b2447] rounded-xl p-8">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Product Name <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('name') border-red-500 @enderror" required>
                @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Category <span class="text-red-400">*</span></label>
                <input type="text" name="category" value="{{ old('category', $product->category) }}" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('category') border-red-500 @enderror" required>
                @error('category') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Price (Rs.) <span class="text-red-400">*</span></label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('price') border-red-500 @enderror" required>
                @error('price') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Stock Quantity <span class="text-red-400">*</span></label>
                <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none @error('stock_quantity') border-red-500 @enderror" required>
                @error('stock_quantity') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Status <span class="text-red-400">*</span></label>
                <select name="status" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none" required>
                    <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div>
                <label class="text-gray-300 text-sm mb-2 block">Product Image</label>
                @if($product->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                        <p class="text-gray-400 text-xs mt-1">Current image (upload new to replace)</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">
                <p class="text-gray-400 text-xs mt-1">Max size: 2MB (JPG, PNG, GIF)</p>
                @error('image') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="mt-6">
            <label class="text-gray-300 text-sm mb-2 block">Description</label>
            <textarea name="description" rows="4" class="w-full bg-[#071331] text-white px-4 py-3 rounded-lg border border-gray-600 focus:border-[#0ea5e9] focus:outline-none">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-[#0ea5e9] text-white px-8 py-3 rounded-lg hover:bg-[#0284c7] transition flex items-center">
                <i class="fas fa-save mr-2"></i> Update Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
