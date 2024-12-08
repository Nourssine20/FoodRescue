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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id(); // id de la livraison
            $table->foreignId('collecte_id')->constrained()->onDelete('cascade'); // relation avec collecte
            $table->date('date_livraison'); // date de livraison
            $table->enum('statut', ['en cours', 'livré']); // statut de la livraison
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
