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
        Schema::create('formation_niv_etuds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id');
            $table->foreignId('nivEtud_id');
            $table->timestamps();

            $table->foreign('formation_id')->references('id')->on('formations');
            $table->foreign('nivEtud_id')->references('id')->on('niv_etuds');
            $table->unique(['formation_id', 'nivEtud_id'], 'formation_nivEtud_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_niv_etuds');
    }
};
