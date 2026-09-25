<?php

namespace App\Models;

use App\Models\Devis;
use App\Models\Stock\Product;
use Illuminate\Database\Eloquent\Model;

class Devis_details extends Model
{
    protected $fillable = [
        'devis_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_line',
        'cost_price',
        'line_discount'
    ];

    public function sales(){
        return $this->belongsTo(Devis::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
