<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bands', function (Blueprint $table) {
            $table->string('genre')->default('Onbekend')->change();
            $table->year('founded')->default(2000)->change();
        });
    }

    public function down(): void
    {
        Schema::table('bands', function (Blueprint $table) {
            $table->string('genre')->default(null)->change();
            $table->year('founded')->default(null)->change();
        });
    }
};
