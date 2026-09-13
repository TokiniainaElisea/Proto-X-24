<?php
namespace App\Models\Stock;

use App\Models\Stock\Product;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $fillable = [
        'name_provider',
        'mail',
        'phone',
        'adress',
        'town',
        'pays',
        'name_contact',
        'note',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
