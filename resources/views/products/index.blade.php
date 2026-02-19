<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Produk</h2>
    <a href="{{ route('products.create') }}"
   class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
   + Tambah Produk
</a>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Nama Produk</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Ukuran</th>
                <th class="border px-4 py-2">Foto</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $product->nama_produk }}</td>
                <td class="border px-4 py-2">{{ $product->kategori }}</td>
                <td class="border px-4 py-2">{{ implode(', ', $product->ukuran_tersedia) }}</td>
                <td class="border px-4 py-2">
                    @if($product->foto)
                        <img src="{{ asset('storage/' . $product->foto) }}"
                            class="w-20 h-20 object-cover rounded">
                    @else
                        -
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
