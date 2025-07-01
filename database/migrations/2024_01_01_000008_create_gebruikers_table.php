<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gebruikers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persoon_id')->constrained('personen')->onDelete('cascade');
            $table->string('inlog_naam');
            $table->string('gebruikersnaam');
            $table->string('wachtwoord');
            $table->boolean('is_ingelogd')->default(false);
            $table->timestamp('ingelogd')->nullable();
            $table->timestamp('uitgelogd')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gebruikers');
    }
};
