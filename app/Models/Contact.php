<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    use HasFactory;

    protected $table = 'contacten';

    protected $table = 'contacten'; // Pas aan indien je tabel anders heet
    protected $fillable = [
        'straat',
        'huisnummer',
        'toevoeging',
        'postcode',
        'woonplaats',
        'email',
        'mobiel',
    ];

}
