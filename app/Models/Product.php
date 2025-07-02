<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'leverancier_id',
        'categorie_id',
        'naam',
        'soortallergie',
        'barcode',
        'houdbaarheidsdatum',
        'omschrijving',
        'status',
    ];

    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class);
    }
}

