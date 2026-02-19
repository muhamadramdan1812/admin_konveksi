@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah Reseller</h2>

    <form action="{{ route('resellers.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Kontak</label>
            <input type="text" name="kontak"
                class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
