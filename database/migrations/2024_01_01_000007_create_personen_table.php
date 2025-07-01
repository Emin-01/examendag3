<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gezin_id')->nullable()->constrained('gezinnen')->onDelete('set null');
            $table->string('voornaam');
            $table->string('tussenvoegsel')->nullable();
            $table->string('achternaam');
            $table->date('geboortedatum');
            $table->enum('type_persoon', ['Manager', 'Medewerker', 'Vrijwilliger', 'Klant']);
            $table->boolean('is_vertegenwoordiger')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personen');
    }
};
