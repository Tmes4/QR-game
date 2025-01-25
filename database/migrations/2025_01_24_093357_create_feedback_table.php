<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->unsignedBigInteger('antwoord_id'); 
            $table->foreign('antwoord_id')->references('id')->on('antwoorden')->onDelete('cascade');
            $table->text('inhoud'); // De feedback tekst
            $table->timestamp('tijdstip')->nullable(); 
            $table->timestamps(); 

            // Relatie
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
