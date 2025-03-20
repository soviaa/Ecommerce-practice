<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    {{-- Include Navbar --}}
    @include('layouts.navbar')

    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow-md">
            {{-- Product Image --}}
            <div>
                <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg">
            </div>

            {{-- Product Info --}}
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p class="text-gray-600 text-lg mt-2">{{ $product->description }}</p>
                <p class="text-xl font-semibold text-blue-600 mt-4">Rs.{{ $product->price }}</p>
                <p class="text-gray-700 mt-2">Stock: {{ $product->stock }}</p>
                <p class="text-gray-700 mt-2">Rating: </p>

                <button class="mt-5 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Purchase
                </button>
                <div class="mt-10 bg-white p-6 rounded-lg shadow-md">


                    <!-- Review Form -->
                    @auth
                        <form action="{{ route('review.store', $product->id) }}" method="POST" class="mt-5">
                            @csrf
                            <label class="block text-gray-700 font-bold">Your Rating</label>
                            <select name="rating" class="w-full p-2 border rounded mb-3">
                                <option value="5">⭐⭐⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="1">⭐</option>
                            </select>

                            <textarea name="review" class="w-full h-24 p-2 border rounded" placeholder="Write your review"></textarea>
                            <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Submit Review
                            </button>
                        </form>
                    @else
                        <p class="mt-4 text-gray-600">
                            <a href="{{ route('login') }}" class="text-blue-500">Log in</a> to leave a review.
                        </p>
                    @endauth
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Customer Reviews</h2>

                    @foreach ($product->reviews as $review)
                        <div class="border-b border-gray-200 py-3">
                            <p class="text-gray-800 font-semibold">{{ $review->user->name }}</p>
                            <p class="text-yellow-500">⭐ {{ $review->rating }}/5</p>
                            <p class="text-gray-600">{{ $review->review }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>


        {{-- Related Products --}}
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($relatedProducts as $related)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <a href="{{ route('product.show', $related->id) }}">
                            <img src="{{ $related->image_path }}" alt="{{ $related->name }}" class="w-full h-40 object-cover rounded">
                        </a>
                        <h4 class="mt-2 text-lg font-bold text-gray-800">
                            <a href="{{ route('product.show', $related->id) }}" class="hover:underline">{{ $related->name }}</a>
                        </h4>
                        <p class="text-lg font-semibold text-blue-600">Rs.{{ $related->price }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">No related products found.</p>
                @endforelse
            </div>
        </div>

    </div>

</body>
</html>
