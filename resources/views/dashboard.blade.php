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
         @include('layouts.sidebar')

        

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="text-2xl font-bold">Dashboard</div>
                <button class="md:hidden text-gray-800" id="menu-btn">☰</button>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6 space-y-6">

                <!-- Welcome Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-2">Welcome, Admin!</h2>
                    <p class="text-gray-600">Manage your categories and products efficiently.</p>
                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Send Review Emails Widget -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-lg font-bold mb-2">Send Review Emails</h2>
                        <p class="text-gray-600 mb-4">Dispatch emails to users who have recently reviewed products.</p>
                        <form action="{{ route('send.mail') }}" method="POST">
                            @csrf
                            @if(session()->has('success'))
                            <div class="bg-green-100 text-green-700 px-6 py-3 rounded-lg shadow-md mb-4">
                                {{ session('success') }}
                            </div>
                             @endif
                            <button type="submit" class="bg-blue-600 text-white font-medium px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition w-full">
                                Send Review Emails
                            </button>
                        </form>
                    </div>

                    {{-- <!-- Additional Quick Actions (if needed) -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-lg font-bold mb-2">Another Quick Action</h2>
                        <p class="text-gray-600 mb-4">You can add more actions here.</p>
                        <button class="bg-gray-600 text-white font-medium px-6 py-3 rounded-lg shadow-md hover:bg-gray-700 transition w-full">
                            Another Action
                        </button> --}}
                    </div>

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
