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
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('toevoeging')->nullable();
            $table->string('postcode');
            $table->string('woonplaats');
            $table->string('email');
            $table->string('mobiel');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacten');
    }
};
