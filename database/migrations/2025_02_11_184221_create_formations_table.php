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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('formation_name');
            $table->integer('duree');
            $table->integer('tarif');
            $table->integer('favoris')->default(0);
            $table->string('image_path')->nullable();
            $table->foreignId('cod_typeformation');
            $table->timestamps();
            
            $table->foreign('cod_typeformation')->references('id')->on('type_formations');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
