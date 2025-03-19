<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Add Category</h2>

        <form action="{{ route('category.add') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="name">Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter category name" required onkeyup="generateSlug()">
            </div>

            <!-- Slug -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Slug will be generated automatically" readonly>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="description">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter category description"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                Add Category
            </button>
        </form>
    </div>

    <script>
        function generateSlug() {
            let name = document.getElementById('name').value;
            let slug = name.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, '');
            document.getElementById('slug').value = slug;
        }
    </script>

</body>
</html>
