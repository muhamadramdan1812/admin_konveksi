@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama Produk</label>
            <input type="text" name="nama_produk"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Kategori</label>
            <input type="text" name="kategori"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Ukuran Tersedia</label>

            <div class="flex gap-4">
                @foreach(['S','M','L','XL','2XL','3XL','4XL'] as $size)
                    <label>
                        <input type="checkbox" name="ukuran_tersedia[]" value="{{ $size }}">
                        {{ $size }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Foto Produk</label>
            <input type="file" name="foto"
                class="w-full border rounded px-3 py-2">
        </div>


        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
