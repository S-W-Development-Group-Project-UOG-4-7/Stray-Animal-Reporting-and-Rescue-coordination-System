<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('animals', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable();
        $table->string('species'); // dog, cat
        $table->string('condition')->nullable(); // treated / rescued
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->boolean('is_adopted')->default(false);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('animals');
}

};
