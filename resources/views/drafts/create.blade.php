@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Buat Order Draft</h1>

<form action="{{ route('drafts.store') }}" method="POST" class="space-y-6">
    @csrf

    {{-- Info Utama --}}
    <div class="bg-white shadow rounded p-4 space-y-4">
        <div>
            <label class="block text-sm font-semibold mb-1">Reseller</label>
            <select name="reseller_id" required>
    <option value="">-- Pilih Reseller --</option>
    @foreach($resellers as $reseller)
        <option value="{{ $reseller->id }}">
            {{ $reseller->nama }}
        </option>
    @endforeach
</select>


        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Nama Customer</label>
            <input type="text" name="customer_name" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Catatan Umum</label>
            <textarea name="note"
                class="w-full border rounded px-3 py-2"
                placeholder="Catatan dari chat / WA"></textarea>
        </div>
    </div>

    {{-- Item Order --}}
    <div class="bg-white shadow rounded p-4">
        <h2 class="font-semibold mb-3">Item Order</h2>

        <div id="items" class="space-y-3">
            <div class="grid grid-cols-5 gap-2">
                <select name="product_id[]" 
                    class="product-select border rounded px-2 py-1" required>
                <option value="">Produk</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        data-sizes='@json($product->ukuran_tersedia)'>
                        {{ $product->nama_produk }}
                    </option>
                @endforeach
            </select>




                <select name="size[]" class="size-select border rounded px-2 py-1">
                    <option value="">Size</option>
                </select>


                <input name="series[]" placeholder="Series"
                    class="border rounded px-2 py-1">

                <input name="qty[]" type="number" min="1" value="1"
                    class="border rounded px-2 py-1">

                <input name="item_note[]" placeholder="Catatan"
                    class="border rounded px-2 py-1">
            </div>
        </div>

        <button type="button" onclick="addItem()"
            class="mt-3 text-blue-600 hover:underline">
            + Tambah Item
        </button>
    </div>

    <div class="flex gap-2">
        <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Simpan Draft
        </button>
        <a href="{{ route('drafts.index') }}"
           class="px-5 py-2 border rounded">
            Batal
        </a>
    </div>
</form>

<script>
    document.addEventListener('change', function(e) {
    if (e.target.classList.contains('product-select')) {

        const selectedOption = e.target.selectedOptions[0];
        const sizes = JSON.parse(selectedOption.getAttribute('data-sizes') || '[]');

        const sizeSelect = e.target.parentElement.querySelector('.size-select');
        sizeSelect.innerHTML = '<option value="">Size</option>';

        sizes.forEach(size => {
            sizeSelect.innerHTML += `<option value="${size}">${size}</option>`;
        });
    }
});
function addItem() {
    const div = document.createElement('div');
    div.className = 'grid grid-cols-5 gap-2';
    div.innerHTML = `
        <select name="product_id[]" class="border rounded px-2 py-1" required>
            <option value="">Produk</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->nama_produk }}
                </option>
            @endforeach
        </select>

        <input name="size[]" placeholder="Size" class="border rounded px-2 py-1">
        <input name="series[]" placeholder="Series" class="border rounded px-2 py-1">
        <input name="qty[]" type="number" min="1" value="1" class="border rounded px-2 py-1">
        <input name="item_note[]" placeholder="Catatan" class="border rounded px-2 py-1">
    `;
    document.getElementById('items').appendChild(div);
}

</script>


@endsection
