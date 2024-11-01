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
        Schema::create('Prises', function (Blueprint $table) {
            $table->string('id_Prise', 50)->primary();
            $table->string('id_Logement', 50);
            
            // Clé étrangère
            $table->foreign('id_Logement')
                  ->references('id_Logement')
                  ->on('logements')
                  ->onDelete('cascade');
            
            // Nous n'ajoutons pas timestamps() car ils ne sont pas dans votre schéma original
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Prises');
    }
};
