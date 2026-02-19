<!-- resources/views/resellers/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Reseller</h2>
    <a href="{{ route('resellers.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
   + Tambah Reseller
</a>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Kontak</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resellers as $reseller)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $reseller->nama }}</td>
                <td class="border px-4 py-2">{{ $reseller->kontak }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
