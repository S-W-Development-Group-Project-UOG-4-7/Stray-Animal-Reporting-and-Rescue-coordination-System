<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->string('donor_name')->nullable();
            $table->string('donor_email');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('message')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->boolean('show_on_wall')->default(false);
            $table->string('payment_method')->nullable();
            $table->string('payment_slip')->nullable();
            $table->string('status')->default('pending');
            $table->string('session_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
