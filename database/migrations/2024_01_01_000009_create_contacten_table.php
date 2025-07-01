<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacten', function (Blueprint $table) {
            $table->id();
            $table->string('straat')->nullable();
            $table->string('huisnummer')->nullable();
            $table->string('toevoeging')->nullable();
            $table->string('postcode')->nullable();
            $table->string('woonplaats')->nullable();
            $table->string('email')->nullable();
            $table->string('mobiel')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacten');
    }
};
