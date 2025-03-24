<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image to Carousel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-2xl">
        <h2 class="text-xl font-semibold mb-4">Carousel Images</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Title</th>
                    <th class="border border-gray-300 p-2">Image</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carousels as $carousel)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $carousel->title }}</td>
                    <td class="border border-gray-300 p-2">
                        <img src="{{ $carousel->image_path }}" alt="{{ $carousel->title }}" class="w-20 h-12 object-cover rounded">
                    </td>
                    <td class="border border-gray-300 p-2 text-center">
                        <form action="{{ route('carousel.destroy', $carousel->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
