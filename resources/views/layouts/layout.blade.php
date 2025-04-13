<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md p-6 space-y-4">
    <h2 class="text-lg font-bold mb-4">Petugas Kasir</h2>
    <nav class="space-y-2">
      <a href="{{ route('petugas.pembelian') }}" class="block px-3 py-2 rounded hover:bg-blue-100">Pembelian</a>
      <a href="{{ route('petugas.produk') }}" class="block px-3 py-2 rounded hover:bg-blue-100">Daftar Produk</a>
      <a href="{{ route('petugas.laporan') }}" class="block px-3 py-2 rounded hover:bg-blue-100">Laporan</a>
    </nav>
  </aside>

  <!-- Main content -->
  <div class="flex-1">
    <!-- Header -->
    <header class="bg-white shadow p-4">
      <h1 class="text-xl font-semibold">@yield('header')</h1>
    </header>

    <!-- Page content -->
    <main class="p-6">
      @yield('content')
    </main>
  </div>

</body>
</html>
