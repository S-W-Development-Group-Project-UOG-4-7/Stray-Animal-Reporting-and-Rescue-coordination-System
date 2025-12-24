<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rescues', function (Blueprint $table) {
            $table->id();
            $table->string('animal_type');
            $table->string('condition');
            $table->string('location');
            $table->string('status');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rescues');
    }
};
