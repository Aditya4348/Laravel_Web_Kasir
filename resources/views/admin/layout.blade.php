<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white min-h-screen fixed top-0 left-0 shadow-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-center">Kasir Admin</h2>
            </div>
            <ul class="mt-6 space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition duration-300 rounded-lg">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition duration-300 rounded-lg">
                        <i class="fas fa-box mr-3"></i> List Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('petugas.index') }}" class="flex items-center px-4 py-3 hover:bg-gray-700 transition duration-300 rounded-lg">
                        <i class="fas fa-users mr-3"></i> List Petugas
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 hover:bg-red-600 transition duration-300 rounded-lg">
                            <i class="fas fa-sign-out-alt mr-3"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-64">
            <!-- Navbar -->
            <nav class="flex justify-between items-center bg-white p-4 shadow-md rounded-lg">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div>
                    <span class="text-gray-600">Welcome, Admin</span>
                </div>
            </nav>

            <!-- Main Content Goes Here -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Add FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        setTimeout(function() {
            let alertBox = document.getElementById('alert-success');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 2000);
    </script>
</body>
</html>