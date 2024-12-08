<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type'); // entreprise, organisation
            $table->string('contact');
            $table->string('secteur_activite');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partenaires');
    }
}
