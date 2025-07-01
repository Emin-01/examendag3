<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacten';

    protected $fillable = [
        'straat',
        'huisnummer',
        'toevoeging',
        'postcode',
        'woonplaats',
        'email',
        'mobiel'
    ];

    public function gezinnen()
    {
        return $this->belongsToMany(Gezin::class, 'contact_per_gezin', 'contact_id', 'gezin_id');
    }

    public function leveranciers()
    {
        return $this->belongsToMany(Leverancier::class, 'contact_per_leverancier', 'contact_id', 'leverancier_id');
    }

    public function getVolledigAdresAttribute()
    {
        return $this->straat . ' ' . $this->huisnummer . ($this->toevoeging ? ' ' . $this->toevoeging : '') . ', ' . $this->postcode . ' ' . $this->woonplaats;
    }
}
