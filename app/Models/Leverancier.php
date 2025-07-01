<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    protected $table = 'leveranciers';
    protected $fillable = [
        'naam',
        'contactpersoon',
        'email',
        'mobiel',
        'leveranciernummer',
        'type',
    ];

    // Relatie naar Contact via ContactPerLeverancier
    public function contact()
    {
        return $this->hasOneThrough(
            Contact::class,
            ContactPerLeverancier::class,
            'LeverancierId', // Foreign key on ContactPerLeverancier
            'id',            // Foreign key on Contact
            'id',            // Local key on Leverancier
            'ContactId'      // Local key on ContactPerLeverancier
        );
    }
}
