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
        Schema::create('FTC_orders', function (Blueprint $table) {
            $table->id('id_Commande');
            $table->date('date_Commande');
            $table->date('date_Paiement')->nullable();
            $table->date('date_Livraison')->nullable();
            $table->string('id_Connexion', 100);
            $table->string('password_Connexion', 255);
            $table->string('id_demande', 50);
            $table->string('id_Paiement', 50)->nullable();
            $table->unsignedInteger('id_utilisateur');
            $table->string('id_Prise', 50)->nullable();

            // Clés étrangères
            $table->foreign('id_demande')->references('id_demande')->on('FTC_status');
            $table->foreign('id_Paiement')->references('id_Paiement')->on('FTC_payment_methods');
            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('FTC_users');
            $table->foreign('id_Prise')->references('id_Prise')->on('FTC_Prises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FTC_orders');
    }
};
