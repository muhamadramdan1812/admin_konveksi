<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen overflow-hidden">

@php
    $route = Route::currentRouteName();
@endphp

<div class="flex h-full">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r flex flex-col">

        <!-- LOGO / TITLE -->
        <div class="h-16 flex items-center px-6 border-b">
            <h1 class="text-lg font-bold text-blue-600">
                Admin Konveksi
            </h1>
        </div>

        <!-- MENU -->
        <div class="flex-1 overflow-y-auto p-4 space-y-6">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 rounded-lg transition
               {{ $route == 'dashboard' ? 'bg-blue-600 text-white shadow' : 'hover:bg-blue-50 text-gray-700' }}">
                Dashboard
            </a>

            <!-- TRANSAKSI -->
            <div>
                <h2 class="text-xs font-semibold text-gray-400 uppercase mb-2 tracking-wider">
                    Transaksi
                </h2>

                <a href="{{ route('drafts.index') }}"
                   class="block px-4 py-2 rounded-lg transition
                   {{ str_contains($route, 'drafts') ? 'bg-blue-600 text-white shadow' : 'hover:bg-blue-50 text-gray-700' }}">
                    Daftar Order
                </a>

                <a href="{{ route('orders.index') }}"
                   class="block px-4 py-2 rounded-lg transition
                   {{ str_contains($route, 'orders') ? 'bg-blue-600 text-white shadow' : 'hover:bg-blue-50 text-gray-700' }}">
                    Orders
                </a>
            </div>

            <!-- MASTER DATA -->
            <div>
                <h2 class="text-xs font-semibold text-gray-400 uppercase mb-2 tracking-wider">
                    Master Data
                </h2>

                <a href="{{ route('resellers.index') }}"
                   class="block px-4 py-2 rounded-lg transition
                   {{ str_contains($route, 'resellers') ? 'bg-blue-600 text-white shadow' : 'hover:bg-blue-50 text-gray-700' }}">
                    Resellers
                </a>

                <a href="{{ route('products.index') }}"
                   class="block px-4 py-2 rounded-lg transition
                   {{ str_contains($route, 'products') ? 'bg-blue-600 text-white shadow' : 'hover:bg-blue-50 text-gray-700' }}">
                    Products
                </a>
            </div>

        </div>

    </aside>


    <!-- MAIN AREA -->
    <div class="flex-1 flex flex-col">

        <!-- TOP HEADER -->
        <header class="h-16 bg-white border-b flex items-center justify-between px-6">

            <h2 class="text-lg font-semibold text-gray-700 capitalize">
                {{ str_replace('.', ' ', $route) }}
            </h2>

            <div class="text-sm text-gray-500">
                {{ now()->format('d M Y') }}
            </div>

        </header>

        <!-- CONTENT -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
