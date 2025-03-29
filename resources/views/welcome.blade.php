<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css') <!-- Pastikan path ini sesuai dengan proyekmu -->
</head>
<body>
  <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
      <div class="container max-w-md mx-auto">
          <div class="bg-white rounded shadow-lg p-6">
              <h2 class="font-semibold text-xl text-gray-600 text-center">Login</h2>
              <p class="text-gray-500 mb-6 text-center">Enter your credentials to access your account.</p>
              
              <div class="grid gap-4 text-sm">
                  <div>
                      <label for="username">Email</label>
                      <input type="email" name="username" id="username" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="email@domain.com" required />
                  </div>
                  
                  <div>
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Enter your password" required />
                  </div>
                  
                  <div class="flex justify-between items-center">
                      <div class="inline-flex items-center">
                          <input type="checkbox" name="remember_me" id="remember_me" class="form-checkbox" />
                          <label for="remember_me" class="ml-2">Remember me</label>
                      </div>
                      <a href="#" class="text-blue-600 text-sm hover:underline">Forgot password?</a>
                  </div>
                  
                  <div class="text-center">
                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Login</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>