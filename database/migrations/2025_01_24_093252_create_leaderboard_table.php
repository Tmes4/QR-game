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
        Schema::create('leaderboard', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->unsignedBigInteger('user_id'); // Buitenlandse sleutel naar Gebruikers
            $table->unsignedBigInteger('spel_id'); // Buitenlandse sleutel naar Spellen
            $table->integer('totale_punten'); // Totaal behaalde punten
            $table->timestamp('laatst_bijgewerkt')->nullable(); // Laatst bijgewerkt
            $table->timestamps(); // Voor automatisch beheer van created_at en updated_at

            // Relaties
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('spel_id')->references('id')->on('spellen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaderboard');
    }
};
