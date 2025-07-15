<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">Login Customer</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('customer.store_login') }}">
            @csrf
            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border rounded px-4 py-2" required>
            </div>
            <div class="mb-6">
                <label>Password</label>
                <input type="password" name="password" class="w-full border rounded px-4 py-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
        </form>

        <p class="text-center mt-4 text-sm">
            Belum punya akun?
            <a href="{{ route('customer.register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>
</html>
