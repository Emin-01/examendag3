<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('magazijnen', function (Blueprint $table) {
            $table->id();
            $table->date('ontvangstdatum');
            $table->date('uitleveringsdatum')->nullable();
            $table->string('verpakkings_eenheid');
            $table->integer('aantal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('magazijnen');
    }
};
