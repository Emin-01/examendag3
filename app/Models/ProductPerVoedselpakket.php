<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPerVoedselpakket extends Model
{
    use HasFactory;

    protected $table = 'product_per_voedselpakket';

    protected $fillable = [
        'voedselpakket_id',
        'product_id',
        'aantal_product_eenheden',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function voedselpakket()
    {
        return $this->belongsTo(Voedselpakket::class, 'voedselpakket_id');
    }
}
