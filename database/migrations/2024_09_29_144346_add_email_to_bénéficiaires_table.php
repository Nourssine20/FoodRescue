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
        Schema::table('benificaires', function (Blueprint $table) {
            $table->string('email')->nullable(); // Ajouter la colonne email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('benificaires', function (Blueprint $table) {
            $table->dropColumn('email');  // Supprimer la colonne email en cas de rollback
        });
    }
};
