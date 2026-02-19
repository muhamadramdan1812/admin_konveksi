<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required',
        'kategori' => 'required',
        'ukuran_tersedia' => 'required|array',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10240'
    ]);

    $path = null;

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('products', 'public');
    }

    Product::create([
        'nama_produk' => $request->nama_produk,
        'kategori' => $request->kategori,
        'ukuran_tersedia' => $request->ukuran_tersedia,
        'foto' => $path,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan!');
}


}
