@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Order</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded">
<table class="w-full border-collapse">
    <thead class="bg-gray-50">
        <tr>
            <th class="p-3 text-left">Reseller</th>
            <th class="p-3 text-left">Customer</th>
            <th class="p-3 text-left">Tanggal</th>
            <th class="p-3 text-left">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr class="border-t">
            <td class="p-3">
                @if($order->reseller)
                    {{ $order->reseller->nama }}
                @else
                    TIDAK ADA RESELLER
                @endif
            </td>
            <td class="p-3">{{ $order->customer_name }}</td>
            <td class="p-3">{{ $order->order_date }}</td>
            <td class="p-3">
                <form action="{{ route('orders.updateStatus', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" onchange="this.form.submit()"
                        class="border rounded px-2 py-1">
                        @foreach(['order','print','design','shipping','done'] as $st)
                            <option value="{{ $st }}" @selected($order->status == $st)>
                                {{ strtoupper($st) }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
