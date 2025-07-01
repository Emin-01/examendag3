<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained('categorieen')->onDelete('cascade');
            $table->string('naam');
            $table->string('soort_allergie')->nullable();
            $table->string('barcode');
            $table->date('houdbaarheidsdatum');
            $table->text('omschrijving');
            $table->enum('status', ['OpVoorraad', 'NietOpVoorraad', 'NietLeverbaar', 'OverHoudbaarheidsDatum']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producten');
    }
};
