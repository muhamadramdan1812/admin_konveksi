@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<!-- SUMMARY CARDS -->
<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total Orders</p>
        <h2 class="text-3xl font-bold text-blue-600">{{ $totalOrders }}</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total Drafts</p>
        <h2 class="text-3xl font-bold text-yellow-500">{{ $totalDrafts }}</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total Products</p>
        <h2 class="text-3xl font-bold text-green-600">{{ $totalProducts }}</h2>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total Resellers</p>
        <h2 class="text-3xl font-bold text-purple-600">{{ $totalResellers }}</h2>
    </div>

</div>

<!-- STATUS BREAKDOWN -->
<div class="bg-white p-6 rounded shadow mb-8">
    <h2 class="text-lg font-semibold mb-4">Order Status</h2>

    <div class="grid grid-cols-5 gap-4">
        @foreach(['order','print','design','shipping','done'] as $status)
            <div class="bg-gray-50 p-4 rounded text-center">
                <p class="text-sm text-gray-500 uppercase">{{ $status }}</p>
                <p class="text-xl font-bold">
                    {{ $statusCounts[$status] ?? 0 }}
                </p>
            </div>
        @endforeach
    </div>
</div>

<!-- RECENT ORDERS -->
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Recent Orders</h2>

    <table class="w-full">
        <thead>
            <tr class="border-b text-left text-gray-500 text-sm">
                <th class="pb-2">Customer</th>
                <th class="pb-2">Reseller</th>
                <th class="pb-2">Tanggal</th>
                <th class="pb-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentOrders as $order)
                <tr class="border-b">
                    <td class="py-2">{{ $order->customer_name }}</td>
                    <td class="py-2">{{ $order->reseller }}</td>
                    <td class="py-2">{{ $order->order_date }}</td>
                    <td class="py-2">
                        <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-600">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-4 text-center text-gray-400">
                        Belum ada order
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
