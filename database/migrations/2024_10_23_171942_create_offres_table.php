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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('title');  
            $table->text('description');  // details about the offer
            $table->string('type')->nullable();  // e.g., "Food", "Clothes", "Shelter"
           
            $table->date('available_from'); 
            $table->date('available_until')->nullable();  
            $table->unsignedBigInteger('donator_id'); 
            $table->foreign('donator_id')->references('id')->on('donators')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
