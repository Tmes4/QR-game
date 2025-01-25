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
        Schema::create('vragen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spel_id');
            $table->foreign('spel_id')->references('id')->on('spellen')->onDelete('cascade');
            $table->text('inhoud');
            $table->enum('type', ['open', 'meerkeuze']);
            $table->integer('punten'); // maximaal aantal punten dat je kan verdienen met deze vraag
            $table->string('qr_code_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vragen');
    }
};
