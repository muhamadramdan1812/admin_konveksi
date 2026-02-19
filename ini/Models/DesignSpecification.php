<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignSpecification extends Model
{
    protected $fillable = [
        'print_order_id','design_name','file_corel','size','color'
    ];

    public function printOrder()
    {
        return $this->belongsTo(PrintOrder::class);
    }
}

