<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('FTC_status', function (Blueprint $table) {
            $table->string('id_demande', 50)->primary();
            $table->boolean('demance_Valider');
            $table->boolean('demand_en_cours');
            $table->boolean('demande_Terminer');
            // Nous n'ajoutons pas timestamps() car ils ne sont pas dans votre schéma original
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FTC_status');
    }
};
