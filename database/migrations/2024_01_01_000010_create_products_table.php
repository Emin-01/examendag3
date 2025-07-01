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
            $table->string('naam');
            $table->string('soort_allergie')->nullable();
            $table->string('barcode')->nullable();
            $table->date('houdbaarheidsdatum');
            $table->unsignedBigInteger('leverancier_id');
            $table->timestamps();

            $table->foreign('leverancier_id')->references('id')->on('leveranciers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
