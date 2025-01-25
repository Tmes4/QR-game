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
        Schema::create('antwoorden', function (Blueprint $table) { // Gebruik 'antwoorden' als naam
            $table->id();
            $table->unsignedBigInteger('vraag_id');
            $table->foreign('vraag_id')->references('id')->on('vragen')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('inhoud'); // Door organisator toegekende punten, voor open vragen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antwoorden'); // Zorg dat de naam consistent is
    }
};
