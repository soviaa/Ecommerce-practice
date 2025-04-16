<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - Roles & Permissions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-md transition-opacity duration-500"
            x-transition
        >
            {{ session('success') }}
        </div>
    @endif

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- Header -->
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Settings</h1>
                <button class="md:hidden text-gray-800" id="menu-btn">☰</button>
            </header>

            <!-- Top Navigation for Settings Pages -->
            <nav class="flex space-x-4 border-b border-gray-200 bg-white px-6 pt-4">
                <a href="/settings/general" class="px-4 py-2 text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 font-medium">
                    General
                </a>
                <a href="/settings/roles-permissions" class="px-4 py-2 text-blue-600 border-b-2 border-blue-500 font-medium">
                    Roles & Permissions
                </a>
                <a href="/settings/profile" class="px-4 py-2 text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500 font-medium">
                    Profile
                </a>
            </nav>

            <!-- Content Area -->
            <main class="p-6 space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4">Roles & Permissions</h2>

                    <!-- Permissions Form -->
                    @foreach($roles as $role)
                    <form action="{{ route('role.permission.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                    
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 mb-6">
                            <div class="bg-white shadow rounded-2xl overflow-hidden">
                                <div class="p-4 border-b">
                                    <h2 class="text-lg font-semibold text-gray-800">Assign Permissions to {{ ucfirst($role->name) }}</h2>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="px-6 py-3 font-medium text-gray-700">Permission</th>
                                                <th class="px-6 py-3 font-medium text-gray-700 text-center">Has Access</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td class="px-6 py-4 text-gray-800">{{ $permission->name }}</td>
                                                    <td class="px-10 text-center">
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                            Save Permissions
                        </button>
                    </form>
                    @endforeach
                    
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Toggle Script -->
    <script>
        document.getElementById('menu-btn')?.addEventListener('click', function () {
            document.querySelector('aside')?.classList.toggle('hidden');
        });
    </script>
</body>
</html>
