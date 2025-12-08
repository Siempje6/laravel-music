<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bands', function (Blueprint $table) {
            // Default waarde toevoegen aan genre
            $table->string('genre')->default('Onbekend')->change();
        });
    }

    public function down(): void
    {
        Schema::table('bands', function (Blueprint $table) {
            // Default verwijderen (optioneel)
            $table->string('genre')->default(null)->change();
        });
    }
};
