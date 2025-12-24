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
        // database/migrations/xxxx_xx_xx_create_veterinarians_table.php

Schema::create('veterinarians', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('clinic');
    $table->string('phone');
    $table->enum('status', ['Active', 'Inactive'])->default('Active');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarians');
    }
};
