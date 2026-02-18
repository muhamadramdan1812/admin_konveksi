<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Order Draft</title>

    <!-- Jika belum pakai Vite -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function addItem(product='', size='', series='', qty=1, note='') {
            const container = document.getElementById('items');
            container.insertAdjacentHTML('beforeend', `
                <div class="border rounded-lg p-4 mb-4 bg-gray-50 space-y-2">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                        <input name="product_name[]" value="${product}" required
                            placeholder="Nama Produk"
                            class="border rounded px-3 py-2 w-full">

                        <input name="size[]" value="${size}"
                            placeholder="Size"
                            class="border rounded px-3 py-2 w-full">

                        <input name="series[]" value="${series}"
                            placeholder="Series"
                            class="border rounded px-3 py-2 w-full">

                        <input name="qty[]" type="number" value="${qty}"
                            class="border rounded px-3 py-2 w-full">

                        <input name="item_note[]" value="${note}"
                            placeholder="Catatan Item"
                            class="border rounded px-3 py-2 w-full">
                    </div>
                </div>
            `);
        }
    </script>
</head>
<body class="bg-gray-100 py-10">

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-6">

    <h2 class="text-2xl font-semibold mb-6">✏️ Edit Order Draft</h2>

    <form method="POST" action="{{ route('drafts.update', $draft) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Reseller -->
        <div>
            <label class="block text-sm font-medium mb-1">Reseller</label>
            <input name="reseller" value="{{ $draft->reseller }}"
                class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Customer -->
        <div>
            <label class="block text-sm font-medium mb-1">Nama Customer</label>
            <input name="customer_name" value="{{ $draft->customer_name }}" required
                class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Source -->
        <div>
            <label class="block text-sm font-medium mb-1">Sumber Order</label>
            <select name="source" class="border rounded px-3 py-2 w-full">
                <option {{ $draft->source=='Chat'?'selected':'' }}>Chat</option>
                <option {{ $draft->source=='WhatsApp'?'selected':'' }}>WhatsApp</option>
                <option {{ $draft->source=='Manual'?'selected':'' }}>Manual</option>
            </select>
        </div>

        <!-- Note -->
        <div>
            <label class="block text-sm font-medium mb-1">Catatan Order</label>
            <textarea name="note" rows="3"
                class="border rounded px-3 py-2 w-full">{{ $draft->note }}</textarea>
        </div>

        <hr class="my-6">

        <!-- Items -->
        <div>
            <h4 class="text-lg font-semibold mb-3">📦 Item Order</h4>
            <div id="items"></div>

            <button type="button"
                onclick="addItem()"
                class="mt-2 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah Item
            </button>
        </div>

        <!-- Submit -->
        <div class="pt-6">
            <button type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 font-semibold">
                💾 Update Draft
            </button>
        </div>
    </form>
</div>

<script>
@foreach($draft->items as $item)
    addItem(
        "{{ $item->product_name }}",
        "{{ $item->size }}",
        "{{ $item->series }}",
        "{{ $item->qty }}",
        "{{ $item->note }}"
    );
@endforeach
</script>

</body>
</html>
