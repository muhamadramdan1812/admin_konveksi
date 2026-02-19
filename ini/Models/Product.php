<?php
// app/Models/Product.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['nama_produk', 'kategori', 'ukuran_tersedia', 'foto'];
    
    protected $casts = [
        'ukuran_tersedia' => 'array', // biar otomatis jadi array di Laravel
    ];
}
