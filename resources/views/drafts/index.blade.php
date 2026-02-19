@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Order Draft</h1>
    <a href="{{ route('drafts.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Draft Baru
    </a>
</div>

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
            <th class="p-3 text-left">Status</th>
            <th class="p-3 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($drafts as $draft)
    <tr class="border-t">
    <td class="p-3">
        {{ optional($draft->reseller)->nama ?? '-' }}
    </td>

    <td class="p-3">
        {{ $draft->customer_name }}
    </td>

    <td class="p-3">
        <span class="px-2 py-1 text-sm rounded
            {{ $draft->status == 'final' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
            {{ strtoupper($draft->status ?? 'draft') }}
        </span>
    </td>

    <td class="p-3 flex gap-2">
        <a href="{{ route('drafts.edit', $draft) }}"
           class="text-blue-600 hover:underline">Edit</a>

        @if($draft->status !== 'final')
        <form action="{{ route('drafts.finalize', $draft) }}" method="POST">
            @csrf
            <button class="text-green-600 hover:underline">
                Finalize
            </button>
        </form>
        @endif

        <form action="{{ route('drafts.destroy', $draft) }}" method="POST"
              onsubmit="return confirm('Hapus draft ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 hover:underline">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach

    </tbody>
</table>
</div>
@endsection
