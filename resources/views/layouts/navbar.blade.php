<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold">Buy gadget</a>

            <div class="hidden md:flex space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Home</a>
                <a href="" class="text-gray-700 hover:text-gray-900">Products</a>
                <a href="" class="text-gray-700 hover:text-gray-900">Categories</a>

                @auth

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-gray-900">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
