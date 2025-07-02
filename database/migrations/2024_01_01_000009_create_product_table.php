<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leverancier_id')->nullable()->constrained('leveranciers')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id')->nullable(); // optioneel
            $table->string('naam');
            $table->string('soortallergie')->nullable();
            $table->string('barcode')->nullable();
            $table->date('houdbaarheidsdatum');
            $table->string('omschrijving')->nullable(); // optioneel
            $table->string('status')->nullable(); // optioneel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
