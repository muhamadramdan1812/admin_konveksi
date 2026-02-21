<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Reseller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\OrderDraftController;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::with('reseller')
        //       ->whereNotNull('reseller_id')
        //       ->latest()
        //       ->get();
        // return view('orders.index', compact('orders'));
        $order = Order::with('reseller')->first();
// dd([
//     'manual_find' => \App\Models\Reseller::find(2),
//     'all_resellers' => \App\Models\Reseller::all(),
// ]);
    dd([
    'order_reseller_id' => $order->reseller_id,
    'reseller_exists_manual' => \App\Models\Reseller::where('id', $order->reseller_id)->exists(),
    'reseller_all_ids' => \App\Models\Reseller::pluck('id'),
]);
    return view('orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:order,print,design,shipping,done'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status order diperbarui');
    }
}
