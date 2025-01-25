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
        Schema::create('resultaten', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->foreignId('spel_id')->constrained('spellen')->onDelete('cascade'); // Buitenlandse sleutel naar Spellen
            $table->json('export_data'); // Data voor latere analyse, opgeslagen in JSON-formaat
            $table->timestamp('geëxporteerd_op')->nullable(); // Tijdstip van export
            $table->timestamps(); // Automatisch beheer van created_at en updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultaten');
    }
};
