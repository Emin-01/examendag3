<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'naam',
        'soort_allergie',
        'barcode',
        'houdbaarheidsdatum',
        'leverancier_id',
    ];
}
