<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('benificaire_id')->constrained('benificaires')->onDelete('cascade');
            $table->string('type_produit');
            $table->integer('quantite');
            $table->enum('frequence_besoin', ['quotidien', 'hebdomadaire', 'mensuel']);
            $table->enum('statut', ['en attente', 'satisfait']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes');
    }
};
