<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
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
