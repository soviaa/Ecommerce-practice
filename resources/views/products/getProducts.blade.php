<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Sidebar + Main Content Wrapper -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 hidden md:block">
            <div class="text-center text-2xl font-bold">Admin Panel</div>
            <nav>
                <a href="/dashboard" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Categories</a>
                <a href="{{ route('products') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Products</a>
                <a href="{{ route('carousel.add') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Carousel</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-600">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="text-2xl font-bold">Product List</div>
                <a href="{{ route('product') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">Add Product</a>
                <button class="md:hidden text-gray-800" id="menu-btn">☰</button>
            </header>

            <!-- Dashboard Content -->
            <div class="container mx-auto px-4 py-4">


                <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Product Name</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Image preview</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Price</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Stock</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Category</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($products as $product)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="px-4 py-2">{{ $product->id }}</td>
                                    <td class="px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">
                                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover">
                                    </td>
                                    <td class="px-4 py-2">{{ number_format($product->price, 2) }}</td>
                                    <td class="px-4 py-2">{{ $product->stock }}</td>
                                    <td class="px-4 py-2">{{ $product->category->name }}</td>
                                    <td class="px-4 py-2">
                                        @if ($product->status == 'active')
                                            <span class="bg-green-500 text-white px-2 py-1 rounded-full">Active</span>
                                        @else
                                            <span class="bg-red-500 text-white px-2 py-1 rounded-full">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('product.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                        <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Toggle Sidebar on Mobile
        document.getElementById('menu-btn').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('hidden');
        });
    </script>

</body>
</html>

