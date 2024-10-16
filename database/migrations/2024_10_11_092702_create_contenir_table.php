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
        Schema::create('FTC_Contenir', function (Blueprint $table) {
            $table->string('id_Produit', 100);
            $table->unsignedInteger('id_Commande');
            $table->float('prix_Produit');
            $table->string('nom_Produit', 255);

            // Clé primaire composée
            $table->primary(['id_Produit', 'id_Commande']);

            // Clés étrangères
            $table->foreign('id_Produit')->references('id_Produit')->on('FTC_Products');
            $table->foreign('id_Commande')->references('id_Commande')->on('FTC_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FTC_Contenir');
    }
};
