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
        Schema::create('reports', function (Blueprint $table) {
    $table->id();
    $table->string('title');       // e.g., "Stray Dogs Group"
    $table->string('location');
    $table->text('description')->nullable();
    $table->integer('dogs_count')->default(1);
    $table->string('status')->default('pending'); // pending, accepted, resolved
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
