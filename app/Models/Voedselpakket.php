<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voedselpakket extends Model
{
    use HasFactory;

    protected $table = 'voedselpakketten';

    protected $fillable = [
        'gezin_id',
        'pakket_nummer',
        'datum_samenstelling',
        'datum_uitgifte',
        'status',
    ];

    public function gezin()
    {
        return $this->belongsTo(\App\Models\Gezin::class, 'gezin_id');
    }
}
