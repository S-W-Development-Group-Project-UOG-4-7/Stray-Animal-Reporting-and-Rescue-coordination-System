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
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            
            // Link to the Animal table
            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();

            // Contact Information
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address'); // NEW: Applicant's address

            // Household Details (NEW)
            $table->string('housing_type'); // e.g., House, Apartment
            $table->boolean('has_fenced_yard')->default(false);
            $table->boolean('has_other_pets')->default(false);
            $table->boolean('has_children')->default(false);

            // Application Details
            $table->text('reason');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_requests');
    }
};