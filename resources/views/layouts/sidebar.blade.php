<aside class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 hidden md:block">
    <div class="text-center text-2xl font-bold">Admin Panel</div>
    <nav>
        <a href="{{ route('dashboard')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Categories</a>
        <a href="{{ route('products') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Products</a>
        <a href="{{ route('users.list') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Users</a>

        <a href="{{ route('carousel.add') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Carousel</a>
        <a href="{{ route('admin.settings') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Settings</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700">Logout</button>
        </form>
    </nav>
</aside>