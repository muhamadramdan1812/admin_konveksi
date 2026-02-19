<?php

// app/Models/Reseller.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model {
    protected $fillable = ['nama', 'kontak'];

    public function reseller()
{
    return $this->belongsTo(Reseller::class);
}
}
