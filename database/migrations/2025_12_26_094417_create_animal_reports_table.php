<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('animal_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_id')->unique();
            $table->string('animal_type');
            $table->text('description');
            $table->string('location');
            $table->dateTime('last_seen');
            $table->string('animal_photo')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->enum('status', ['pending', 'under_review', 'rescue_dispatched', 'rescue_completed', 'closed'])->default('pending');
            $table->boolean('is_active')->default(true);
            $table->timestamp('expires_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            
            $table->index(['report_id', 'status', 'is_active']);
            $table->index('expires_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('animal_reports');
    }
};