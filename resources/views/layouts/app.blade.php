<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-white shadow mb-6">
    <div class="max-w-7xl mx-auto px-6 py-4 flex gap-4">
        <a href="/drafts" class="text-blue-600 font-semibold">Draft</a>
        <a href="/orders" class="text-blue-600 font-semibold">Orders</a>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-6">
    @yield('content')
</div>

</body>
</html>
