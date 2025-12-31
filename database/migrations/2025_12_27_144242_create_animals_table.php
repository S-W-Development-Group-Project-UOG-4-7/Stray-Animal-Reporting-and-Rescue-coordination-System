<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('animals', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('breed')->nullable();
    $table->unsignedTinyInteger('age')->nullable(); // in years
    $table->string('condition')->nullable();        // treated/healthy/etc
    $table->string('rescue_team')->nullable();
    $table->string('image_url')->nullable();        // use online image links
    $table->enum('status', ['Adoptable','Adopted'])->default('Adoptable');
    $table->timestamps();
  });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
