<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerLeverancier extends Model
{
    protected $table = 'contactperleverancier';
    public $timestamps = false;
    protected $fillable = [
        'LeverancierId',
        'ContactId',
    ];
}
