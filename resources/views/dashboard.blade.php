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
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Categories</a>
                <a href="{{ route('products') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Products</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-600">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="text-2xl font-bold">Dashboard</div>
                <button class="md:hidden text-gray-800" id="menu-btn">☰</button>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-2">Welcome, Admin!</h2>
                    <p class="text-gray-600">Manage your categories and products efficiently.</p>
                </div>
            </main>
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
