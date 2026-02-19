<?php

namespace App\Http\Controllers;

use App\Models\OrderDraft;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Reseller;


class OrderDraftController extends Controller
{
    public function index()
    {
        $drafts = OrderDraft::with('reseller')->latest()->get();
    return view('drafts.index', compact('drafts'));
    }

    public function create()
    {
        $products = Product::all();
        $resellers = Reseller::all();

    return view('drafts.create', compact('products','resellers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'product_name.*' => 'required'
        ]);

        $draft = OrderDraft::create([
    'customer_name' => $request->customer_name,
    'reseller_id' => $request->reseller_id,
    'status' => 'draft',
]);

        foreach ($request->product_id as $i => $productId) {
            OrderItem::create([
                'order_draft_id' => $draft->id,
                'product_id' => $productId,
                'size' => $request->size[$i] ?? null,
                'series' => $request->series[$i] ?? null,
                'qty' => $request->qty[$i],
                'note' => $request->item_note[$i] ?? null,
            ]);
}


        return redirect()->route('drafts.index')
            ->with('success', 'Order draft berhasil disimpan');
    }
        public function edit(OrderDraft $draft)
    {
        $draft->load('items');
        return view('drafts.edit', compact('draft'));
    }
    public function update(Request $request, OrderDraft $draft)
{
    $request->validate([
        'customer_name' => 'required',
        'product_name.*' => 'required'
    ]);

        $draft->update([
            'reseller' => $request->reseller,
            'customer_name' => $request->customer_name,
            'source' => $request->source,
            'note' => $request->note
        ]);

        // hapus item lama
        $draft->items()->delete();

        // simpan item baru
        foreach ($request->product_name as $index => $product) {
            $draft->items()->create([
                'product_name' => $product,
                'size' => $request->size[$index] ?? null,
                'series' => $request->series[$index] ?? null,
                'qty' => $request->qty[$index] ?? 1,
                'note' => $request->item_note[$index] ?? null,
            ]);
        }

        
        return redirect()->route('drafts.index')
            ->with('success', 'Order draft berhasil diperbarui');
    }
        public function destroy(OrderDraft $draft)
    {
        $draft->delete();
        return redirect()->route('drafts.index')
            ->with('success', 'Order draft berhasil dihapus');
    }
    public function finalize(OrderDraft $draft)
    {
    // buat order utama
    $order = Order::create([
        'order_draft_id' => $draft->id,
        'reseller' => $draft->reseller,
        'customer_name' => $draft->customer_name,
        'order_date' => now(),
        'status' => 'order'
    ]);

    // pindahkan item
    foreach ($draft->items as $item) {
        $item->update([
            'order_id' => $order->id,
            //'order_draft_id' => null
        ]);
    }

    // update status draft
    $draft->update([
        'status' => 'final'
    ]);

    return redirect()->route('orders.index')
        ->with('success', 'Draft berhasil difinalkan menjadi Order');
}



}

