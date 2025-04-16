<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
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
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="text-2xl font-bold">Users List</div>
                <button class="md:hidden text-gray-800" id="menu-btn">☰</button>
            </header>

            <main class="p-6 space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4">All Registered Users</h2>

                    <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Role</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)

                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6">{{ $user->name }}</td>
                                    <td class="py-3 px-6">{{ $user->email }}</td>
                                    <td class="py-3 px-6">
                                        <form method="POST" action="{{ route('user.role', ['user' => $user->id, 'role' => 0]) }}" class="inline-form">
                                            @csrf
                                            <select name="role_id" class="border-gray-300 rounded p-2" onchange="this.form.action = `/user/{{ $user->id }}/role/${this.value}`; this.form.submit()">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                       
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('hidden');
        });
    </script>

</body>
</html>
