<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Edit Product</h2>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Price</label>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Description</label>
                <textarea name="description" class="w-full p-2 border rounded" rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Product Image</label>
                <input type="file" name="image" class="w-full p-2 border rounded">
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset( $product->image_path) }}" alt="Product Image" class="w-32 h-32 object-cover">
                    </div>
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Stock</label>
                <input type="text" name="stock" value="{{ $product->stock }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Category</label>
                <select name="category_id" class="w-full p-2 border rounded" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-1">Status</label>
                <div class="flex items-center">
                    <label class="mr-4">
                        <input type="radio" name="status" value="active" {{ $product->status == 'active' ? 'checked' : '' }}> Active
                    </label>
                    <label>
                        <input type="radio" name="status" value="inactive" {{ $product->status == 'inactive' ? 'checked' : '' }}> Inactive
                    </label>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Update Product</button>
        </form>
    </div>
</body>
</html>
