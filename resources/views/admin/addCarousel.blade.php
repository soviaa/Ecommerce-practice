<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Image to Carousel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
   
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-xl font-semibold mb-4">Add Image to Carousel</h2>
        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded-lg p-2 mb-2" required>

            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2" accept="image/*" required>

            <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Add Image
            </button>
        </form>

    </div>
</body>
</html>
