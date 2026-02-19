<?php
// app/Http/Controllers/ResellerController.php
namespace App\Http\Controllers;
use App\Models\Reseller;
use Illuminate\Http\Request;


class ResellerController extends Controller {
    public function index() {
        $resellers = Reseller::all();
        return view('resellers.index', compact('resellers'));
    }
    
    public function create()
{
    return view('resellers.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kontak' => 'nullable'
    ]);

    Reseller::create($request->all());

    return redirect()->route('resellers.index')
        ->with('success', 'Reseller berhasil ditambahkan!');
}

}

