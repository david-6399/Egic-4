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
        Schema::create('debouches', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->foreignId('formation_id');
            $table->timestamps();

            $table->foreign('formation_id')->references('id')->on('formations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debouches');
    }
};
