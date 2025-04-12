<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    <!-- Pastikan path ini sesuai dengan proyekmu -->
</head>

<body>
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="font-semibold text-2xl text-gray-700 text-center mb-4">Login</h2>
                <p class="text-gray-500 mb-6 text-center">Enter your credentials to access your account.</p>

                <!-- Menampilkan pesan error dari session -->
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Error:</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Menampilkan error validasi -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Error:</strong>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form dimulai di sini -->
                <form action="{{ route('login', ) }}" method="POST">
                    @csrf

                    <div class="grid gap-4 text-sm">
                        <div>
                            <label for="username" class="block text-gray-700">Username</label>
                            <input type="text" name="username" id="username"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required value="{{ old('username') }}" />
                            @error('username')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" name="password" id="password"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter your password" required />
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Form berakhir di sini -->

                <p class="mt-4 text-center text-gray-600">Don't have an account? <a href="#"
                        class="text-blue-600 hover:underline">Sign up</a></p>
            </div>
        </div>
    </div>
</body>

</html>
