<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productperleverancier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ProductId');
            $table->unsignedBigInteger('LeverancierId');
            $table->date('DatumAangeleverd')->nullable();
            $table->date('DatumEerstVolgendeLevering')->nullable();
            $table->timestamps();

            $table->foreign('ProductId')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('LeverancierId')->references('id')->on('leveranciers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productperleverancier');
    }
};
