<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDraft;
use App\Models\Product;
use App\Models\Reseller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $recentOrders = \App\Models\Order::latest()->take(5)->get();

    $statusCounts = \App\Models\Order::selectRaw('status, COUNT(*) as total')
        ->groupBy('status')
        ->pluck('total', 'status');

    return view('dashboard', [
        'totalOrders' => \App\Models\Order::count(),
        'totalDrafts' => \App\Models\OrderDraft::count(),
        'totalProducts' => \App\Models\Product::count(),
        'totalResellers' => \App\Models\Reseller::count(),
        'recentOrders' => $recentOrders,
        'statusCounts' => $statusCounts
    ]);
}

}
