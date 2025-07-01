<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Allergie per persoon
        Schema::create('allergie_per_persoon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persoon_id')->constrained('personen')->onDelete('cascade');
            $table->foreignId('allergie_id')->constrained('allergies')->onDelete('cascade');
            $table->timestamps();
        });

        // Rol per gebruiker
        Schema::create('rol_per_gebruiker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gebruiker_id')->constrained('gebruikers')->onDelete('cascade');
            $table->foreignId('rol_id')->constrained('rollen')->onDelete('cascade');
            $table->timestamps();
        });

        // Eetwens per gezin
        Schema::create('eetwens_per_gezin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gezin_id')->constrained('gezinnen')->onDelete('cascade');
            $table->foreignId('eetwens_id')->constrained('eetwensen')->onDelete('cascade');
            $table->timestamps();
        });

        // Contact per leverancier
        Schema::create('contact_per_leverancier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leverancier_id')->constrained('leveranciers')->onDelete('cascade');
            $table->foreignId('contact_id')->constrained('contacten')->onDelete('cascade');
            $table->timestamps();
        });

        // Contact per gezin
        Schema::create('contact_per_gezin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gezin_id')->constrained('gezinnen')->onDelete('cascade');
            $table->foreignId('contact_id')->constrained('contacten')->onDelete('cascade');
            $table->timestamps();
        });

        // Product per voedselpakket
        Schema::create('product_per_voedselpakket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voedselpakket_id')->constrained('voedselpakketten')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('producten')->onDelete('cascade');
            $table->integer('aantal_product_eenheden');
            $table->timestamps();
        });

        // Product per leverancier
        Schema::create('product_per_leverancier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leverancier_id')->constrained('leveranciers')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('producten')->onDelete('cascade');
            $table->date('datum_aangeleverd');
            $table->date('datum_eerst_volgende_levering');
            $table->timestamps();
        });

        // Product per magazijn
        Schema::create('product_per_magazijn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('producten')->onDelete('cascade');
            $table->foreignId('magazijn_id')->constrained('magazijnen')->onDelete('cascade');
            $table->string('locatie');
            $table->timestamps();
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('product_per_magazijn');
        Schema::dropIfExists('product_per_leverancier');
        Schema::dropIfExists('product_per_voedselpakket');
        Schema::dropIfExists('contact_per_gezin');
        Schema::dropIfExists('contact_per_leverancier');
        Schema::dropIfExists('eetwens_per_gezin');
        Schema::dropIfExists('rol_per_gebruiker');
        Schema::dropIfExists('allergie_per_persoon');
    }
};
