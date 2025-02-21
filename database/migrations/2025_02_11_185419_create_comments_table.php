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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->foreignId('user_id');
            $table->foreignId('formation_id')->nullable();
            $table->foreignId('event_id')->nullable();
            $table->enum('status', ['approved', 'notApproved'])->default('notApproved');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
