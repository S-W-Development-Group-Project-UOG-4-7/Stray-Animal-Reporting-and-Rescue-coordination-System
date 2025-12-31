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
    Schema::create('role_requests', function (Blueprint $table) {
        $table->id();
        
        // Personal Details
        $table->string('full_name');
        $table->string('email');
        $table->string('phone');
        $table->string('address');
        $table->string('nic');

        // Proposed Account Credentials
        $table->string('username');
        $table->string('password'); // Note: In a real app, we usually hash this immediately.

        // Role Details
        $table->enum('role_type', ['Volunteer', 'Veterinarian', 'Rescue Team']);
        $table->string('vet_id')->nullable(); 
        
        $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_requests');
    }
};