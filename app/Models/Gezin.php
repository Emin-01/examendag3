<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gezin extends Model
{
    use HasFactory;

    protected $table = 'gezinnen';

    protected $fillable = [
        'naam',
        'code',
        'omschrijving',
        'aantal_volwassenen',
        'aantal_kinderen',
        'aantal_babys',
        'totaal_aantal_personen',
    ];

    public function vertegenwoordiger()
    {
        return $this->hasOne(Persoon::class)->where('is_vertegenwoordiger', true);
    }

    public function contact()
    {
        return $this->hasOneThrough(
            \App\Models\Contact::class,
            \App\Models\ContactPerGezin::class,
            'gezin_id', // Foreign key on contact_per_gezin
            'id',       // Foreign key on contacten
            'id',       // Local key on gezinnen
            'contact_id'// Local key on contact_per_gezin
        );
    }
}
