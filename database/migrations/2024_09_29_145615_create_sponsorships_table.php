<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipsTable extends Migration
{
    public function up()
    {
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partenaire_id');
            $table->string('type_soutien'); // financier, matériel, service
            $table->double('montant', 15, 2)->nullable(); // nullable si type_soutien != financier
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();

            // Clé étrangère
            $table->foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsorships');
    }
}
