<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- Pastikan path ini sesuai dengan proyekmu -->
</head>
<body class="font-sans antialiased bg-gray-100">
    <div>
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white h-screen fixed top-0 left-0">
            <div class="p-6">
                <h2 class="text-2xl font-semibold">Kasir Admin</h2>
            </div>
            <ul class="mt-8 space-y-4">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center text-white px-4 py-2 hover:bg-gray-700 rounded">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="flex items-center text-white px-4 py-2 hover:bg-gray-700 rounded">
                        <i class="fas fa-box mr-3"></i> List Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('petugas.dashboard') }}" class="flex items-center text-white px-4 py-2 hover:bg-gray-700 rounded">
                        <i class="fas fa-users mr-3"></i> List Petugas
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center text-white px-4 py-2 hover:bg-gray-700 rounded">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-64">
            <!-- Navbar -->
            <nav class="flex justify-between items-center bg-white p-4 shadow-md">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div>
                    <span class="text-gray-600">Welcome,</span>
                </div>
            </nav>

            <!-- Main Content Goes Here -->
            <div class="mt-8">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Add FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 2000); // 2000ms = 2 detik
    </script>
</body>
</html>
