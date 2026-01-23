<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // If the table exists, we drop it to rebuild it cleanly with relationships
        Schema::dropIfExists('reviews');

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // Link to the Adoption Request (So we know this review is verified)
            $table->foreignId('adoption_request_id')
                  ->constrained()
                  ->onDelete('cascade');

            // We can also link the animal for easier querying
            $table->foreignId('animal_id')->constrained()->onDelete('cascade');

            $table->string('reviewer_name');
            $table->integer('rating'); // 1 to 5
            $table->text('comment');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};