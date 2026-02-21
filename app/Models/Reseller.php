<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reseller extends Model
{
    protected $table = 'resellers';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama', 'kontak'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'reseller_id', 'id');
    }
}