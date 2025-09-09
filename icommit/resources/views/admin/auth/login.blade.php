<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Login Admin</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-500">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">Login</button>
        </form>
    </div>
</body>
</html>
