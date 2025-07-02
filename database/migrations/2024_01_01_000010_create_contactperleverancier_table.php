<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contactperleverancier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('LeverancierId');
            $table->unsignedBigInteger('ContactId');
            $table->foreign('LeverancierId')->references('id')->on('leveranciers')->onDelete('cascade');
            $table->foreign('ContactId')->references('id')->on('contacten')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contactperleverancier');
    }
};
