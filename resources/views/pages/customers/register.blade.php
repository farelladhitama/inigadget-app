<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">Daftar Customer</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('customer.store_register') }}">
            @csrf
            <div class="mb-4">
                <label>Nama</label>
                <input type="text" name="name" class="w-full border rounded px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border rounded px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="w-full border rounded px-4 py-2" required>
            </div>
            <div class="mb-6">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-4 py-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Daftar</button>
        </form>

        <p class="text-center mt-4 text-sm">
            Sudah punya akun?
            <a href="{{ route('customer.login') }}" class="text-blue-600 hover:underline">Login di sini</a>
        </p>
    </div>

</body>
</html>
