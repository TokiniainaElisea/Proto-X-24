<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Devis_details;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = [
        'client_id',
        'status',
        'total_price',
        'note',
        'payment_method',
        'quote_reference'
    ];

    public function devis_details(){
        return $this->hasMany(Devis_details::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
