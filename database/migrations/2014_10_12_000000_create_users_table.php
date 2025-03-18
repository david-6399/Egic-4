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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('age')->nullable();
            $table->string('number')->nullable();
            $table->enum('created_by',['ecole','user'])->default('user');
            $table->date('formation_start')->nullable();
            $table->date('formation_end')->nullable();
            $table->boolean('admin')->default(0);
            $table->boolean('user')->default(1);
            $table->boolean('student')->default(0);
            $table->boolean('wtbs')->default(0);
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreignId('formation_subs_id')->nullable();
            $table->foreignId('nivelEtud_id')->nullable();

            $table->foreign('nivelEtud_id')->references('id')->on('niv_etuds');
            $table->foreign('formation_subs_id')->references('id')->on('formations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
