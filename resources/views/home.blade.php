<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    {{-- Include Navbar --}}
    @include('layouts.navbar')

    {{-- Hero Section with Carousel --}}
    <div class="relative w-full max-w-5xl mx-auto mt-6" x-data="{ currentSlide: 1, totalSlides: {{ $carousels->count() }} }">
        <div class="relative h-64 overflow-hidden rounded-lg">
            @foreach($carousels as $index => $carousel)
                <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
                    x-show="currentSlide === {{ $index + 1 }}"
                    x-transition:enter="transition-opacity duration-700 ease-in-out"
                    x-transition:leave="transition-opacity duration-700 ease-in-out">
                    <img src="{{ asset('storage/carousels/' . $carousel->image) }}" class="w-full h-full object-cover" alt="{{ $carousel->title }}">
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <div class="absolute inset-0 flex items-center justify-between px-4">
            <button @click="currentSlide = currentSlide === 1 ? totalSlides : currentSlide - 1"
                class="bg-gray-800 text-white px-2 py-1 rounded-full">❮</button>
            <button @click="currentSlide = currentSlide === totalSlides ? 1 : currentSlide + 1"
                class="bg-gray-800 text-white px-2 py-1 rounded-full">❯</button>
        </div>
    </div>




    {{-- Product Section --}}
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Our Products</h2>

        @foreach($categories as $category)
            <h3 class="text-xl font-semibold text-gray-700 mb-4">{{ $category->name }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                @forelse($category->products as $product)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <a href="{{ route('product.show', $product->id) }}">
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded">
                        </a>
                        <a href="{{ route('product.show', $product->id) }}" class="text-lg font-bold text-gray-800 hover:underline">
                            {{ $product->name }}
                        </a>

                        <p class="text-gray-600 text-sm">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-lg font-semibold text-blue-600 mt-2">Rs.{{ $product->price }}</p>
                        <button class="mt-3 w-full bg-blue-500 text-white py-1 rounded hover:bg-blue-600">
                            Add to Cart
                        </button>
                    </div>
                @empty
                    <p class="text-gray-500">No products available in this category.</p>
                @endforelse
            </div>
        @endforeach
    </div>

</body>
</html>
